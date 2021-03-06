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
	
	         $cpath = current_path();  
	         $type = $rows[$i]['type'];
	         $objnode = node_load($rows[$i]['field_och_inireport_patient_info']);   
	        
			if($type == "och_discharge_report")
			{
				$tp = 1;
			}else{
				
				$tp = 2;
				
			}				
	
    

	
	?>

      <tr> 
	  <td>HSR1<?php echo $rows[$i]['field_och_inireport_patient_info']; ?></td>
	  <td><?php echo $rows[$i]['field_och_inireport_patient_info_1']; ?></td>
	 <td><a href="user/<?php echo $objnode->uid; ?>"><?php echo $objnode->uid; ?></a></td>
	  <td><?php echo $rows[$i]['created']; ?></td>
	  <td><?php echo $rows[$i]['field_och_inirep_clinician_name']; ?></td>
	  <td><?php echo $rows[$i]['view_node']; ?></td>
	  <td>

	  <select name="valauditor" id="valauditor_<?php echo $rows[$i]['nid']; ?>">
	  <option value="">Select</option>
	  <option value="66">Validated</option>
	  <option value="65">Unvalidated the Report</option>
	  </select>
      
	  <input type="hidden" name="hidtype" id="hidtype_<?php echo $rows[$i]['nid']; ?>" value="<?php echo $tp; ?>"/>
	  <input type="hidden" name="pathtype" id="path_<?php echo $rows[$i]['nid']; ?>" value="<?php echo $cpath; ?>"/>
	  
	  
	  <input type="button" name="assign" data-id="<?php echo $rows[$i]['nid']; ?>" class="btn btn-xs btn-success getaudireportid" value="Assign"/>

	

	  <?php echo $rows[$i]['edit_node']; ?>

	  </td>

      </tr>

    <?php } ?>

  </tbody>

</table>

