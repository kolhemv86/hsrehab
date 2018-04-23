<?php
/**
 * @file
 * Field for British phone numbers.
 */

function phone_gb_metadata() {
  // These strings are translated using t() on output.
  return array(
    'label' => 'Phone Numbers - Great Britain - England (UK)',
    'error' => '"%value" is not a valid British (UK) phone number. British phone numbers should contain 9 or 10 digits after the 0 trunk code or +44 country code.',
  );
}

/**
 * Verifies that $phone_number is a United Kingdom phone number in a valid number range.
 *
 * Rejects numbers that are too long or too short or are in a non-valid range.
 * Accepts a wide range of input formats and a number of different prefixes.
 *
 * Accepts:
 *   020 7000 7000
 *   0207 000 7000
 *   02070 007 000 #4567
 *   0117 455 7777
 *   01174 557 777
 *   0175 061 8888
 *   01750 618 888
 *   01750 62555
 *   01697 355 555
 *   01697 73555
 *   02030007000
 *   02070008888
 *   01215557777
 *   01174007777
 *   01750615777
 *   0175062555
 *   0169773555
 *   01946755555
 *   07788555777
 *   07010001000
 *   08005557777
 *   0800555888
 *   (020) 7000 7000
 *   (0207) 000 7000
 *   (01174) 557 777 #333
 *   (01970) 234567 #0001
 *   (0169) 772444
 *   +44 207 000 7000
 *   +44 2070 007000
 *   +44 16973 55555
 *   +44 1697 355 555
 *   +441174 008 888 #333
 *   +44 203 000 8000 #555
 *   +441970234567
 *   +44(0)1970234567
 *   +44 1970 123 456
 *   +44 (0)1970 234 456
 *   +441174008888
 *   +441174008888#333
 *   +44 (0) 203 000 8000
 *   +44(1970)234567
 *   (+44) 1697 355 555
 *   (+44 16973) 55555 #888
 *   (+441970)234567
 *   (+44) 2070 007 000
 *   (+44 20) 3000 8000
 *   (+44) (0) 207 000 7000
 *   00 44 207 000 7000
 *   00 44 16977 3555
 *   00442030007777#555
 *   00 (44) 1697 73555
 *   (00 44) 203 000 8000
 *   011 44 207 000 7000
 *   011 (44) 20 7000 7000
 *   011 44 1697 73555
 *   011 44 (0)203 000 8000#222
 * Rejects:
 *   06750 618888
 *   06750 62555
 *   060 5000 7000
 *   00 33 20 00 70 00
 *   01 69 77 35 55
 *   05342030007777#555
 *   02230007777
 *   062300077
 *   06230007777
 *   0623000777788
 *   (0197) 0123456 #01
 *   +44 01970 123 456
 *
 * @param string $phone_number
 * @return boolean Returns boolean FALSE if the phone number is not valid
 */
function valid_gb_phone_number($phone_number) {
  // Check if number entered matches a valid format
  if (!valid_gb_phone_pattern($phone_number)) {
    return FALSE;
  }
  else {
    // Extract number parts: prefix, NSN, extension
    $phone_number_parts_array = (extract_gb_phone_parts($phone_number));
    if (empty($phone_number_parts_array)) {
      return FALSE;
    }
    else {
      $phone_number_nsn = $phone_number_parts_array['NSN'];
      // Check if NSN entered is in a valid range
      if (!valid_gb_phone_range($phone_number_nsn)) {
        return FALSE;
      }
      else {
        return TRUE;
      }
    }
  }
}

/**
 * Convert a valid United Kingdom phone number into standard international format.
 * Accepts a wide range of input formats and prefixes and re-formats the number
 * taking into account the required 2+8, 3+7, 4+6, 4+5, 5+5, 5+4 and 3+6 formats
 * by number range.
 *
 * @param string $phone_number must be a valid nine or ten-digit number (with optional extension)
 * @return string $phone_number
 */
function format_gb_phone_number($phone_number, $field = FALSE) {
  $phone_number_prefix = '';

  // Extract optional country prefix, NSN, and optional extension.
  $phone_number_parts_array = extract_gb_phone_parts($phone_number);
  if (!empty($phone_number_parts_array)) {
    $phone_number_nsn = $phone_number_parts_array['NSN'];
    if ($phone_number_nsn == NULL) {
      return $phone_number;
    }

    // Grab only the NSN part for formatting
    // NSN part might include spaces, hyphens or ')' and will need to be removed
    $phone_number_nsn = trim(str_replace(array(")", "-", " "), "", $phone_number_nsn));

    // Format NSN part of GB number
    $phone_number_nsn_formatted = format_gb_nsn($phone_number_nsn);

    // Set prefix as 44 or 0
    if (isset($phone_number_parts_array['prefix']) && $phone_number_parts_array['prefix'] != NULL) {
      $phone_number_prefix = $phone_number_parts_array['prefix'];
    }

    // Extract extension
    $phone_number_has_extension = FALSE;
    $phone_number_extension = NULL;
    if (isset($phone_number_parts_array['extension']) && $phone_number_parts_array['extension'] != NULL) {
      $phone_number_has_extension = TRUE;
      $phone_number_extension = " " . trim($phone_number_parts_array['extension']);
    }

    // Add prefix back on to NSN
    if ($field['phone_country_code']) {
      // Use formatting from form selector
      $phone_number = '+44 ' . $phone_number_nsn_formatted;
    }
    else {
      // Use formatting from type-in
      $phone_number = $phone_number_prefix . $phone_number_nsn_formatted;
    }

    // Add extension back on to number
    if ($phone_number_has_extension) {
      $phone_number .= $phone_number_extension;
    }
  }
  return $phone_number;
}

/**
 * Verifies that $phone_number uses a valid UK phone number input pattern.
 *
 * Pattern matches any number entered as 2+8, 3+7, 4+6, 4+5, 5+5, 5+4, 3+6
 * with or without spaces, with a variety of prefixes and optional extension.
 * RegEx patterns are based on
 * http://www.aa-asterisk.org.uk/index.php/Number_format and
 * http://www.aa-asterisk.org.uk/index.php/Regular_Expressions_for_Validating_and_Formatting_UK_Telephone_Numbers
 *
 * Regular expression is adapted from Amos Hurd's RegEx at RegExLib.com
 *
 * @param string $phone_number
 * @return boolean Returns FALSE if the phone number is not valid.
 */
function valid_gb_phone_pattern($phone_number) {
  // Regex to define valid formats for GB numbers
  $pattern_regex_gb = '/^';
  $pattern_regex_gb .= '(?:';
  $pattern_regex_gb .= '(?:\(?(?:0(?:0|11)\)?\s?\(?|\+)44\)?\s?(?:\(?0\)?\s?)?)'; # leading 00, 011 or + before 44 with optional (0); parentheses and spaces optional
  $pattern_regex_gb .= '|';
  $pattern_regex_gb .= '(?:\(?0)'; # leading (0, 0
  $pattern_regex_gb .= ')';
  $pattern_regex_gb .= '(?:';
  $pattern_regex_gb .= '(?:\d{5}\)?\s?\d{4,5})'; # [5+4]/[5+5]
  $pattern_regex_gb .= '|';
  $pattern_regex_gb .= '(?:\d{4}\)?\s?(?:\d{5}|\d{3}\s?\d{3}))'; # [4+5]/[4+6]
  $pattern_regex_gb .= '|';
  $pattern_regex_gb .= '(?:\d{3}\)?\s?\d{3}\s?\d{3,4})'; # [3+6]/[3+7]
  $pattern_regex_gb .= '|';
  $pattern_regex_gb .= '(?:\d{2}\)?\s?\d{4}\s?\d{4})'; # [2+8]
  $pattern_regex_gb .= ')';
  $pattern_regex_gb .= '(?:';
  $pattern_regex_gb .= '(\s?\#\d+)?'; # optional extension number shown with a hash divider
  $pattern_regex_gb .= ')';
  $pattern_regex_gb .= '$/x';

  // Test number entered for matching format
  if (!preg_match($pattern_regex_gb, $phone_number)) {
    return FALSE;
  }
  else {
    return TRUE;
  }
}

/**
 * Extract parts from GB phone number: prefix, NSN and optional extension.
 * Accepts a wide range of input formats and prefixes. This function also
 * cleans up the NSN part by removing spaces, hyphens and brackets. Returned
 * prefix is either +44 with space or a 0 without space.
 *
 * @param string $phone_number must be a valid UK phone number (with optional extension)
 * @return array $phone_number_parts Returns prefix, NSN and extension in array.
 */
function extract_gb_phone_parts($phone_number) {
  // RegEx to extract number parts: 44 prefix ($2), NSN ($3), extension ($4)
  $pattern_gb_number_parts = '/^';
  $pattern_gb_number_parts .= '(\(?(?:0(?:0|11)\)?\s?\(?|\+)(44)\)?\s?)?\(?0?(?:\)\s?)?'; # country or trunk prefix
  $pattern_gb_number_parts .= '(';
  $pattern_gb_number_parts .= '[1-9]\d{1,4}\)?[\d\s]+'; # NSN
  $pattern_gb_number_parts .= ')';
  $pattern_gb_number_parts .= '(\#\d+)?'; # optional extension
  $pattern_gb_number_parts .= '$/x';
  if (preg_match($pattern_gb_number_parts, $phone_number, $matches)) {

    // Extract NSN part of GB number
    if (ISSET($matches['3'])) {
      $phone_number_nsn_raw = $matches['3'];
      // Trim NSN and remove space, hyphen or ')' if present
      $phone_number_nsn = trim(str_replace(array(")", "-", " "), "", $phone_number_nsn_raw));

      // Extract 44 prefix if present and set prefix as 0 or as +44 and space
      if (isset($matches['2']) && $matches['2'] == '44') {
        $phone_number_prefix = '+44 ';
      }
      else {
        $phone_number_prefix = '0';
      }

      // Extract extension
      $phone_number_extension = NULL;
      if (isset($matches['4'])) {
        $phone_number_extension = ' ' . $matches['4'];
      }
    }
  }

  $phone_number_parts = array(
    'NSN' => $phone_number_nsn,
    'prefix' => $phone_number_prefix,
    'extension' => $phone_number_extension,
  );

  return $phone_number_parts;
}

/**
 * Verifies that $phone_number_nsn is a valid UK phone number range by initial
 * digits and length. Tests the NSN part for length and number range. Based on
 * http://www.aa-asterisk.org.uk/index.php/Number_format and
 * http://www.aa-asterisk.org.uk/index.php/Regular_Expressions_for_Validating_and_Formatting_UK_Telephone_Numbers
 *
 * @param string $phone_number_nsn
 * @return boolean Returns boolean FALSE if the phone number is not valid.
 */
function valid_gb_phone_range($phone_number_nsn) {
  // Regex to define valid ranges for NSN by initial digits and length
  $pattern_gb_valid_range = '/^';
  $pattern_gb_valid_range .= '(';
  $pattern_gb_valid_range .= '(1[1-9]|2[03489]|3[0347]|5[56]|7[0-9]|8[047]|9[018])\d{8}';
  $pattern_gb_valid_range .= '|';
  $pattern_gb_valid_range .= '(1[2-9]\d|[58]00)\d{6}';
  $pattern_gb_valid_range .= '|';
  $pattern_gb_valid_range .= '8(001111|45464\d)';
  $pattern_gb_valid_range .= ')';
  $pattern_gb_valid_range .= '$/x';
  // Test NSN to see if it matches a valid number range
  if (preg_match($pattern_gb_valid_range, $phone_number_nsn)) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}

/**
 * Format GB phone numbers in correct format per number range. Based on
 * http://www.aa-asterisk.org.uk/index.php/Number_format and
 * http://www.aa-asterisk.org.uk/index.php/Regular_Expressions_for_Validating_and_Formatting_UK_Telephone_Numbers
 *
 * @param string $phone_number_nsn Must be the 10 or 9 digit NSN part of the number.
 * @return string $phone_number_nsn Returns correctly formatted NSN by length and range.
 */
function format_gb_nsn($phone_number_nsn) {
  // Trim NSN
  $phone_number_nsn = trim($phone_number_nsn);

  // Find NSN string length
  $phone_number_nsn_length = strlen($phone_number_nsn);

  // RegEx patterns to define formatting by length and initial digits
  // [2+8] 2d, 55, 56, 70, 76 (not 7624)
  $pattern28 = '/^(?:2|5[56]|7(?:0|6(?:[013-9]|2[0-35-9])))/';
  $capture28 = '/^(\d{2})(\d{4})(\d{4})$/';

  // [3+7] 11d, 1d1, 3dd, 80d, 84d, 87d, 9dd
  $pattern37 = '/^(?:1(?:1|\d1)|3|8(?:0[08]|4[2-5]|7[0-3])|9[018])/';
  $capture37 = '/^(\d{3})(\d{3})(\d{4})$/';

  // [5+5] 1dddd (12 areas)
  $pattern55 = '/^(?:1(?:3873|5(?:242|39[456])|697[347]|768[347]|9467))/';
  $capture55 = '/^(\d{5})(\d{5})$/';

  // [5+4] 1ddd (1 area)
  $pattern54 = '/^(?:16977[23])/';
  $capture54 = '/^(\d{5})(\d{4})$/';

  // [4+6] 1ddd, 7ddd (inc 7624) (not 70, 76)
  $pattern46 = '/^(?:1|7(?:[1-5789]|624))/';
  $capture46 = '/^(\d{4})(\d{6})$/';

  // [4+5] 1ddd (40 areas)
  $pattern45 = '/^(?:1(?:2(?:0[48]|54|76|9[78])|3(?:6[34]|8[46])|4(?:04|20|6[01]|8[08])|5(?:27|6[26])|6(?:06|29|35|47|59|95)|7(?:26|44|50)|8(?:27|37|84)|9(?:0[05]|35|49|63|95)))/';
  $capture45 = '/^(\d{4})(\d{5})$/';

  // [3+6] 500, 800
  $pattern36 = '/^([58]00)/';
  $capture36 = '/^(\d{3})(\d{6})$/';

  // Format numbers by leading digits and length
  if ($phone_number_nsn_length == 10 && preg_match($pattern28, $phone_number_nsn)) {
    if (preg_match($capture28, $phone_number_nsn, $matches)) {
      $phone_number_nsn = $matches['1'] . " " . $matches['2'] . " " . $matches['3'];
    }
  }
  else {
    if ($phone_number_nsn_length == 10 && preg_match($pattern37, $phone_number_nsn)) {
      if (preg_match($capture37, $phone_number_nsn, $matches)) {
        $phone_number_nsn = $matches['1'] . " " . $matches['2'] . " " . $matches['3'];
      }
    }
    else {
      if ($phone_number_nsn_length == 10 && preg_match($pattern55, $phone_number_nsn)) {
        if (preg_match($capture55, $phone_number_nsn, $matches)) {
          $phone_number_nsn = $matches['1'] . " " . $matches['2'];
        }
      }
      else {
        if ($phone_number_nsn_length == 9 && preg_match($pattern54, $phone_number_nsn)) {
          if (preg_match($capture54, $phone_number_nsn, $matches)) {
            $phone_number_nsn = $matches['1'] . " " . $matches['2'];
          }
        }
        else {
          if ($phone_number_nsn_length == 10 && preg_match($pattern46, $phone_number_nsn)) {
            if (preg_match($capture46, $phone_number_nsn, $matches)) {
              $phone_number_nsn = $matches['1'] . " " . $matches['2'];
            }
          }
          else {
            if ($phone_number_nsn_length == 9 && preg_match($pattern45, $phone_number_nsn)) {
              if (preg_match($capture45, $phone_number_nsn, $matches)) {
                $phone_number_nsn = $matches['1'] . " " . $matches['2'];
              }
            }
            else {
              if ($phone_number_nsn_length == 9 && preg_match($pattern36, $phone_number_nsn)) {
                if (preg_match($capture36, $phone_number_nsn, $matches)) {
                  $phone_number_nsn = $matches['1'] . " " . $matches['2'];
                }
              }
              else {
                if ($phone_number_nsn_length > 5) {
                  // Default format for non-valid numbers (shouldn't ever get here)
                  if (preg_match("/^(\d)(\d{4})(\d*)$/", $phone_number_nsn, $matches)) {
                    $phone_number_nsn = $matches['1'] . " " . $matches['2'] . " " . $matches['3'];
                  }
                }
              }
            }
          }
        }
      }
    }
  }
  return $phone_number_nsn;
}
