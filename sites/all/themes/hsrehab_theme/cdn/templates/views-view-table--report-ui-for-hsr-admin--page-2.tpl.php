<?php



/**

 * @file

 * Template to display a view as a table.

 *

 * - $title : The title of this group of rows.  May be empty.

 * - $header: An array of header labels keyed by field id.

 * - $caption: The caption for this table. May be empty.

 * - $header_classes: An array of header classes keyed by field id.

 * - $fields: An array of CSS IDs to use for each field id.

 * - $classes: A class or classes to apply to the table, based on settings.

 * - $row_classes: An array of classes to apply to each row, indexed by row

 *   number. This matches the index in $rows.

 * - $rows: An array of row items. Each row is an array of content.

 *   $rows are keyed by row number, fields within rows are keyed by field ID.

 * - $field_classes: An array of classes to apply to each field, indexed by

 *   field id, then row number. This matches the index in $rows.

 * @ingroup views_templates

 */
 
function getUsersByRole($rid = 1) { // rid = Role Id from users_roles table

    $query = db_select('users', 'u');

    $query->fields('u', array('uid', 'name'));

    $query->innerJoin('users_roles', 'r', 'r.uid = u.uid');

    $query->condition('r.rid', $rid);

    $query->orderBy('u.name');



    $result = $query->execute();



    $users = array();

    foreach ($result as $user) {

        $users[] = $user;

    }



    return $users;

}



$users = getUsersByRole(10);

 

?>

<table <?php if ($classes) { print 'class="'. $classes . '" '; } ?><?php print $attributes; ?>>

   <?php if (!empty($title) || !empty($caption)) : ?>

     <caption><?php print $caption . $title; ?></caption>

  <?php endif; ?>

  <?php if (!empty($header)) : ?>

    <thead>

      <tr>

        <?php foreach ($header as $field => $label): ?>

          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?> scope="col">

            <?php print $label; ?>

          </th>

        <?php endforeach; ?>

      </tr>

    </thead>

  <?php endif; ?>
<?php //echo "<pre>"; print_r($rows); exit; ?>


 <tbody>

    <?php for($i=0;$i<count($rows);$i++)  { 
	         $type = $rows[$i]['type'];
	         $objnode = node_load($rows[$i]['field_ml_disrep_patient_infos']);   
	         $referdate = $objnode->field_patient_sheet_referral_id['und'][0]['value'];
			 $sitename = variable_get('site_name');
			 $title = $rows[$i]['title_1'];
			
			 
	?>

      <tr> 
	  <td>HSR1<?php echo $rows[$i]['nid']; ?></td>
	  <td><?php echo $rows[$i]['title']; ?></td>
	  <td><?php echo $rows[$i]['field_patient_referral_date']; ?></td>
	  <td><?php echo $rows[$i]['created']; ?></td>
	  <td><?php echo $rows[$i]['name']; ?></td>
	  <td><?php echo $rows[$i]['field_assign_triage_staff_pat']; ?></td>
	  <td>
	  
	  <a href="create/triage/<?php echo $rows[$i]['nid_1']; ?>" class="btn btn-xs btn-success">View Html</a>

	  <a href="send/triage/<?php echo $nid = $rows[$i]['nid_1']; ?>/<?php echo $rows[$i]['uid_1']; ?>" class="btn  btn-xs btn-success">Send</a>

 <?php 
        $filepathname = "sites/default/files/pdf_using_mpdf/$sitename - $nid - $title.pdf";
		$dir = "sites/default/files/pdf_using_mpdf";
		$files = file_scan_directory($dir, '/.*\.pdf$/');
		$fcount = count($files[$filepathname]);
	    if($fcount == 1)
		{ ?>
	
	    <a href="sites/default/files/pdf_using_mpdf/<?php echo $sitename.' - '.$nid.' - '.$title.'.pdf'; ?>" target="_blank" class="btn btn-xs btn-success">View Pdf</a> 
	
	<?php } ?>	      
	  
	  </td>

      </tr>

    <?php } ?>

  </tbody>

</table>