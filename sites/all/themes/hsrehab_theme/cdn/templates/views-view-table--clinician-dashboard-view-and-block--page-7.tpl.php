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
 
function getochnid($nid) { // rid = Role Id from users_roles table
 
 $query = db_query("SELECT node.title AS node_title, node.nid AS nid, node.created AS node_created
FROM 
{node} node
LEFT JOIN {field_data_field_och_disrep_patient_info} field_data_field_och_disrep_patient_info ON node.nid = field_data_field_och_disrep_patient_info.entity_id AND (field_data_field_och_disrep_patient_info.entity_type = 'node' AND field_data_field_och_disrep_patient_info.deleted = '0')
WHERE (( (field_data_field_och_disrep_patient_info.field_och_disrep_patient_info_target_id = $nid ) )AND(( (node.status = '1') AND (node.type IN  ('och_discharge_report')) )))");

$record = $query->fetchAll();
return $record[0]->nid;

}


function getmlnid($nid)
{
	$query = db_query("SELECT node.title AS node_title, node.nid AS nid, node.created AS node_created
FROM 
{node} node
LEFT JOIN {field_data_field_ml_disrep_patient_infos} field_data_field_ml_disrep_patient_infos ON node.nid = field_data_field_ml_disrep_patient_infos.entity_id AND (field_data_field_ml_disrep_patient_infos.entity_type = 'node' AND field_data_field_ml_disrep_patient_infos.deleted = '0')
WHERE (( (field_data_field_ml_disrep_patient_infos.field_ml_disrep_patient_infos_target_id = $nid ) )AND(( (node.status = '1') AND (node.type IN  ('ml_discharge_report')) )))");

$record = $query->fetchAll();
return $record[0]->nid;	
	
	
}




 
 
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
  <tbody>
  
  <?php //echo "<pre>"; print_r($rows); exit;	 ?>
  
  
    <?php for($i=0;$i<count($rows);$i++)  {

    $uid = strip_tags($rows[$i]['uid']);   
	$user = user_load($uid);  

       
	
	if(in_array('company-och', $user->roles)) {
		
		$ochnid = getochnid($rows[$i]['nid_1']);	
		$dislink = '<a href="node/'.$ochnid.'">View Discharge Report</a>';
		
	}else{
		
		$mlnid = getmlnid($rows[$i]['nid_1']);	
		$dislink = '<a href="node/'.$mlnid.'">View Discharge Report</a>';
	
	}
 

	?>
      
	  <tr>
	  
	  <td><?php echo $rows[$i]['nid']; ?></td>
	  <td><?php echo $rows[$i]['title']; ?></td>
	  <td><?php echo $rows[$i]['uid']; ?></td>
	  <td><?php echo $rows[$i]['field_patient_status']; ?></td>
	  <td>
          <?php echo $rows[$i]['view_node']; ?> / <?php echo $dislink; ?>
	  </td>
	  
	  
	  
	  </tr>
	  
	  
	  
    <?php } ?>
  </tbody>
</table>


<script type="text/javascript">
  	
$(document).ready(function () {
	
	$(document).on("click", ".getmodel", function(){
				var modal_id = $(this).data("id");
				$("#myModal_"+modal_id).modal("show");
	});
  
});

  </script>

