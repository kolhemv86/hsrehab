

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

 



 

 

?>

<table <?php if ($classes) { print 'class="'. $classes . '" '; } ?><?php print $attributes; ?>>

   <?php if (!empty($title) || !empty($caption)) : ?>

     <caption><?php print $caption . $title; ?></caption>

  <?php endif; ?>

  <?php if (!empty($header)) : ?>

    <thead>

      <tr>

        <?php /*foreach ($header as $field => $label): ?>

          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?> scope="col">

            <?php print $label; ?>

          </th>

        <?php endforeach; */?>
		
		<td><b>Patient ID</b></td>
		<td><b>Referral Date</b></td>
		<td><b>Patient Name</b></td>
		<td><b>Service Required</b></td>
		<td><b>Service Packages</b></td>
		<td><b>Area of injury</b></td>
		<td><b>Treatment Status</b></td>
		
		
		
		
		

      </tr>

    </thead>

  <?php endif; ?>

  <tbody>

  

  <?php //echo "<pre>"; print_r($rows); ?>

  

  

    <?php for($i=0;$i<count($rows);$i++)  { 

	

	  

	//echo "<pre>";

	  //print_r($node);

	?>

      

	  <tr>

	  

	  <td><?php echo $rows[$i]['nid']; ?></td>

	  <td><?php echo $rows[$i]['field_patient_referral_date']; ?></td>

	  <td><?php echo $rows[$i]['title']; ?></td>

	  <td><?php echo $srequired = $rows[$i]['field_service_packages']; ?></td>

	  <td> 
      
	  
	  
	  <?php if($srequired == "Osteopathy")
			{
		       echo $rows[$i]['field_service_packages_osteopath'];
			   
			}elseif($srequired == "Physiotherapy")
			{
				 echo $rows[$i]['field_service_psckages_physoth'];
				
			}elseif($srequired == "Podiatry")
			{
				
				echo $rows[$i]['field_service_packages_podiatry'];
				
			}elseif($srequired == "Chiropractic")
			{
				
				echo $rows[$i]['field_service_packages_new'];
				
			}elseif($srequired == "Other")
			{
				
				echo  $rows[$i]['field_service_packages_others']; 
				
			}else{
				
				echo "---";
			}
			
			?>	


      </td>	  

	  <td><?php echo $rows[$i]['field_patient_area_of_injury']; ?></td>
	  <td><?php echo $rows[$i]['field_patient_status']; ?></td>

	  </tr>

	  

	  

	  

    <?php } ?>

  </tbody>

</table>






