<?php

/**
 * @file
 * Default theme implementation to format an HTML mail.
 *
 * Copy this file in your default theme folder to create a custom themed mail.
 * Rename it to mimemail-message--[module]--[key].tpl.php to override it for a
 * specific mail.
 *
 * Available variables:
 * - $recipient: The recipient of the message
 * - $subject: The message subject
 * - $body: The message body
 * - $css: Internal style sheets
 * - $module: The sending module
 * - $key: The message identifier
 *
 * @see template_preprocess_mimemail_message()
 */
?>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php if ($css): ?>
  <style type="text/css">
    <!--
    <?php print $css ?>
    -->
  </style>
  <?php endif; ?>
</head>
  <body id="mimemail-body" style="font-family:"Source Sans Pro", Calibri, Candara, Arial, sans-serif; font-size:15px; color:#333; line-height:1.42857143;"<?php if ($module && $key): print 'class="'. $module .'-'. $key .'"'; endif; ?>
    <div id="center" style="text-align:center; margin-left: auto; margin-right: auto;">
      <div id="main" style="max-width:500px; margin:50px; padding:50px; margin-left:auto; margin-right:auto; background-color: #f5f5f5; border: 1px solid #e3e3e3;">
        <header class="mail-header">
          <div class=""><a href="https://www.hsrehab.co.uk"><img src="https://www.hsrehab.co.uk/sites/default/files/logo.png" class="logo" style="max-width: 50%; margin-left: auto; margin-right: auto; margin-bottom: 50px; display: block;"></a></div>
          <div class=""><h1 style="font-size: 30px; color: #fcb54d; font-weight: bold; text-transform: uppercase; text-align: center; margin-top: 0;"><?php print $subject ?></h1></div>
        </header>
        <?php print $body ?>
        <footer id="mimemail-footer" style="margin-top: 50px; padding-top: 15px; border-top: 1px solid #f4a535;">
          <h6 style="font-size: 11px; text-align: center;">This e-mail is from HS Rehab Services. The information in this e-mail and any files transmitted with it is confidential and is intended solely for the individual or entity to whom it is addressed. It may be subject to legal privilege. Any unauthorized dissemination or copying of this e-mail and any use or disclosure of any attachments contained in it, is strictly prohibited and may be illegal. Unauthorized recipients are requested to preserve the confidentiality of this e-mail and to advise the sender immediately of any error in transmission. Any views expressed by an individual within this e-mail which do not constitute or record legal advice do not necessarily reflect the views of the firm. This e-mail (whether you are the sender or the recipient) may be monitored, recorded and retained by HS rehab Services for the purpose of ascertaining whether the communication complies with the law and internal policies. E-mail monitoring/blocking software may be used and e-mail content may be read at any time.</h6>
          <h6 style="font-size: 10px; text-align: center;">©2017 Hsrehab, 5, Resolution Close, Endeavour Park, Boston, Lincolnshire, PE21 7TT</h6>
        </footer>
      </div>
    </div>
  </body>
</html>
