
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
 
function getprodatemlinit($snid)
{
	$query = db_query("select field_data_field_ml_inirep_treatment_date.field_ml_inirep_treatment_date_value from field_data_field_ml_inirep_treatment_date JOIN field_data_field_ml_init_session_id ON field_data_field_ml_init_session_id.entity_id=field_data_field_ml_inirep_treatment_date.entity_id where field_data_field_ml_init_session_id.field_ml_init_session_id_target_id = $snid");
	
$record = $query->fetchAll();
return $record[0]->field_ml_inirep_treatment_date_value;	
	
}


function getprodateochinit($ochnid)
{
	$query = db_query("select field_data_field_och_inirep_discharge_date.field_och_inirep_discharge_date_value from field_data_field_och_inirep_discharge_date JOIN field_data_field_och_init_session_id ON field_data_field_och_init_session_id.entity_id=field_data_field_och_inirep_discharge_date.entity_id where field_data_field_och_init_session_id.field_och_init_session_id_target_id = $ochnid");
	
$record = $query->fetchAll();
return $record[0]->field_och_inirep_discharge_date_value;	
	
}

function getochinitid($nid)
{
	
	$query = db_query("SELECT entity_id FROM field_data_field_och_init_session_id where `field_och_init_session_id_target_id`=$nid");
	$record = $query->fetchAll();

	return $record[0]->entity_id;
}


function getmlinitid($nid)
{
	
	$query = db_query("SELECT entity_id FROM field_data_field_ml_init_session_id where `field_ml_init_session_id_target_id`=$nid");
	$record = $query->fetchAll();

	return $record[0]->entity_id;
}


function getochdisid($nid)
{
	
	$query = db_query("SELECT entity_id FROM field_data_field_och_session_id where `field_och_session_id_target_id`=$nid");
	$record = $query->fetchAll();

	return $record[0]->entity_id;
}


function getmldisid($nid)
{
	
	$query = db_query("SELECT entity_id FROM field_data_field_ml_session_id where `field_ml_session_id_target_id`=$nid");
	$record = $query->fetchAll();

	return $record[0]->entity_id;
}


function getpostdateinit($pid)
{
	
	$query = db_query("select entity_id from field_data_field_ml_inirep_patient_info where field_ml_inirep_patient_info_target_id = $pid");
	$record = $query->fetchAll();
	$objnode = node_load($record[0]->entity_id);
	return $postdate = $objnode->created;
	
}


function getpostdateochinit($pid)
{
	
	$query = db_query("select entity_id from field_data_field_och_inireport_patient_info where field_och_inireport_patient_info_target_id = $pid");
	$record = $query->fetchAll();
	$objnode = node_load($record[0]->entity_id);
	return $postdate = $objnode->created;
	
}



 
?>
<table <?php if ($classes) { print 'class="'. $classes . '" '; } ?><?php print $attributes; ?>>
   <?php if (!empty($title) || !empty($caption)) : ?>
     <caption><?php print $caption . $title; ?></caption>
  <?php endif; ?>
  <?php if (!empty($header)) : ?>
    <thead>
      <tr>
        <td><b>Patient Ref No</b></td>
		<td><b>Patient Name</b></td>
		<td><b>Date of Referral</b></td>
		<td><b>Projected Discharge Date </b></td>
		<td><b>Action Required</b></td>
      </tr>
    </thead>
  <?php endif; ?>
  <tbody>
  
  <?php //echo "<pre>"; print_r($rows); ?>
  
  
<?php for($i=0;$i<count($rows);$i++)  

    {
		     if(strip_tags($rows[$i]['field_session_app_status_1'] == "DNA"))
			 {
				 $finalsession = strip_tags($rows[$i]['field_session_app_date_1']);
			 }
			 if(strip_tags($rows[$i]['field_session_app_status_2'] == "DNA"))
			 {
				 $finalsession = strip_tags($rows[$i]['field_session_app_date_2']);
			 }
			 if(strip_tags($rows[$i]['field_session_app_status_3'] == "DNA"))
			 {
				 $finalsession = strip_tags($rows[$i]['field_session_app_date_3']);
			 }
			 if(strip_tags($rows[$i]['field_session_app_status_4'] == "DNA"))
			 {
				 $finalsession = strip_tags($rows[$i]['field_session_app_date_4']);
			 }
			 if(strip_tags($rows[$i]['field_session_app_status_5'] == "DNA"))
			 {
				 $finalsession = strip_tags($rows[$i]['field_session_app_date_5']);
			 }
			 if(strip_tags($rows[$i]['field_session_app_status_6'] == "DNA"))
			 {
				 $finalsession = strip_tags($rows[$i]['field_session_app_date_6']);
			 }
			 if(strip_tags($rows[$i]['field_session_app_status_7'] == "DNA"))
			 {
				 $finalsession = strip_tags($rows[$i]['field_session_app_date_7']);
			 }
			 if(strip_tags($rows[$i]['field_session_app_status_8'] == "DNA"))
			 {
				 $finalsession = strip_tags($rows[$i]['field_session_app_date_8']);
			 }
		
		    $Date1 = strip_tags($rows[$i]['field_session_app_date_1']);
		    $Date2 = strip_tags($rows[$i]['field_session_app_date_2']); 
		    $Date3 =strip_tags($rows[$i]['field_session_app_date_3']); 
			$Date4 =strip_tags($rows[$i]['field_session_app_date_4']); 
			$Date5 = strip_tags($rows[$i]['field_session_app_date_5']); 
			$Date6 = strip_tags($rows[$i]['field_session_app_date_6']); 
		    $Date7 = strip_tags($rows[$i]['field_session_app_date_7']); 
            $Date8 = strip_tags($rows[$i]['field_session_app_date_8']); 
		
		 $Date2 = strtotime($Date2);
		 $Date1 = strtotime($Date1);
		 
		 $Date4 = strtotime($Date4);
		 $Date3 = strtotime($Date3);
		 
		 $Date6 = strtotime($Date6);
		 $Date5 = strtotime($Date5);
		 
		 $Date8 = strtotime($Date8);
		 $Date7 = strtotime($Date7);
		 
		 $difference1 = $Date2 - $Date1;
		 $fdays1 = floor($difference1 / (60*60*24) );
		 
		 $difference2 = $Date3 - $Date2;
		 $fdays2 = floor($difference2 / (60*60*24) );
		 
		 $difference3 = $Date4 - $Date3;
		 $fdays3 = floor($difference3 / (60*60*24) );
		 
		 $difference4 = $Date5 - $Date4;
		 $fdays4 = floor($difference4 / (60*60*24) );
		 
		 $difference5 = $Date6 - $Date5;
		 $fdays5 = floor($difference5 / (60*60*24) );
		 
		 $difference6 = $Date7 - $Date6;
		 $fdays6 = floor($difference6 / (60*60*24) );
		 
		 
		 $difference7 = $Date8 - $Date7;
		 $fdays7 = floor($difference7 / (60*60*24) );
		
		 $totaldays = $fdays1+$fdays2+$fdays3+$fdays4+$fdays5+$fdays6+$fdays7;
		 $average = $totaldays/8;
		
		
		
		
		
		
		
		// ========== Display Links Codes ============================//
		  
			$uid = strip_tags($rows[$i]['uid']);   
			$cpath = current_path();
			$user = user_load($uid);    
			$assetdate = strip_tags($rows[$i]['field_session_app_date_1']);  
			$arrdate = explode('-',$assetdate);  
			$newtime = explode('to',$arrdate[1]);
			
			if(in_array('company-och', $user->roles)) {
				
			$discahrge = $rows[$i]['field_session_och_disrep']; 
			$init = $rows[$i]['field_session_och_inirep'];
			
			$prodate = getprodateochinit($rows[$i]['nid_1']);
			
			$ochinitid = getochinitid($rows[$i]['nid_1']);
			$ochdisid = getochdisid($rows[$i]['nid_1']);
			
			$mlinitpostdate_old = getpostdateochinit($rows[$i]['field_session_patient']);
		      if($mlinitpostdate_old!=""){
				$mlinitpostdate = date("Y-m-d",$mlinitpostdate_old); 
			  }
			$expirtymlpostdate = date('Y-m-d', strtotime($mlinitpostdate . ' +1 day')); 
            
			$IA_status = $rows[$i]['field_och_init_in_out'];			
			
			$initallink = '<a href="node/add/och-initial-assessment-report?field_och_init_session_id='.$rows[$i]['gid'].'&field_och_inireport_patient_info='.$rows[$i]['field_session_patient'].'&edit[field_och_inireport_app_date][und][0][value][date]='.$arrdate[0].'&edit[field_och_inireport_app_date][und][0][value][time]='.$newtime[0].'&edit[field_och_inirep_clinician_job][und][0][value]='.$rows[$i]['field_user_position'].'&field_och_inirep_clinician_name='.$rows[$i]['uid_1'].'&edit%5Btitle%5D=OCH-Initial Assessment Report for '.strip_tags($rows[$i]['title']).'&destination='.$cpath.'" class="btn btn-primary">Initial Assessment Report</a>';				
		
			$dischargelink = '<a href="node/add/och-discharge-report?field_och_session_id='.$rows[$i]['gid'].'&amp;field_och_disrep_patient_info='.$rows[$i]['field_session_patient'].'&amp;field_och_disrep_clinician_name='.$rows[$i]['uid_1'].'&amp;edit%5Btitle%5D=OCH-Discharge report for '.strip_tags($rows[$i]['title']).'&amp;destination='.$cpath.'" class="btn btn-primary">Discharge Report</a>';
			
					
			
			}else{	
			
			$discahrge = $rows[$i]['field_session_ml_disrep'];
			$init = $rows[$i]['field_session_ml_inirep'];
				
			$prodate = getprodatemlinit($rows[$i]['nid_1']);
			$ochinitid = getmlinitid($rows[$i]['nid_1']);
			$ochdisid = getmldisid($rows[$i]['nid_1']);
			
			// ============   GEt ml IA Post date =================//
			
			$mlinitpostdate_old = getpostdateinit($rows[$i]['field_session_patient']);
		      if($mlinitpostdate_old!=""){
				$mlinitpostdate = date("Y-m-d",$mlinitpostdate_old); 
			  }
			 $expirtymlpostdate = date('Y-m-d', strtotime($mlinitpostdate . ' +1 day'));  
			 
			  $IA_status = $rows[$i]['field_ml_in_out'];
			
			
			// ============   End GEt ml IA Post date =================//
			
			$initallink = '<a href="node/add/ml-initial-assessment-report?field_ml_init_session_id='.$rows[$i]['gid'].'&amp;field_ml_inirep_patient_info='.$rows[$i]['field_session_patient'].'&amp;edit[field_ml_inirep_clinician_job][und][0][value]='.$rows[$i]['field_user_position'].' &amp;field_ml_inirep_clinician_name='.$rows[$i]['uid_1'].'&amp;edit%5Btitle%5D=ML-Initial Assessment Report for '.strip_tags($rows[$i]['title']).'&amp;destination='.$cpath.'" class="btn btn-primary">Initial Assessment Report</a>';				
			
			
			
			
			
			$dischargelink = '<a href="node/add/ml-discharge-report?field_ml_session_id='.$rows[$i]['gid'].'&amp;field_ml_disrep_patient_infos='.$rows[$i]['field_session_patient'].'&amp;field_ml_disrep_clinician_name='.$rows[$i]['uid_1'].'&amp;edit%5Btitle%5D=ML-Discharge report for '.strip_tags($rows[$i]['title']).'&amp;destination='.$cpath.'" class="btn btn-primary">Discharge Report</a>'; 
			
			
			}    
		
// ========== End Display Links Codes ============================//		
// ================= SLA Condition ======================================= //

              
			 $session_in = $rows[$i]['field_session_in_out'];
			
			 $sessnid = $rows[$i]['field_session_patient'];
			 $stop_date = strip_tags($rows[$i]['field_session_app_date_1']);
			 $pservice = $rows[$i]['field_service_psckages_physoth'];
			 $currentdate = date("Y-m-d");
			 if($pservice == 96)
			 {
				$Expirydate = date('Y-m-d', strtotime($stop_date . ' +1 day'));  
			 
			 }else{
				 
				 $Expirydate = date('Y-m-d', strtotime($stop_date . ' +7 day'));
			 }
			 
			   
			 $finalsesiondate = date('Y-m-d',strtotime($finalsession . ' +1 day'));	
			
			
			if(($currentdate >=$Expirydate && $session_in == "IN") || ($average == 7) || ($currentdate >=$expirtymlpostdate && $IA_status == "IN") || ($currentdate >= $finalsesiondate && $session_in == "IN"))
			
			{
		  
		  ?> 
		  
				  <tr>
				  
				  <td><?php echo $rows[$i]['nid']; ?> <?php echo $finalsesiondate; ?></td>
				  <td><?php echo $rows[$i]['title']; ?></td>
				  <td><?php echo $rows[$i]['field_patient_referral_date']; ?></td>
				  <td><?php if($prodate!="") { $arr = explode(' ',$prodate); echo date('d/m/Y',strtotime($arr[0])); } ?></td>
				  <td>
				  
				 <?php if($init == "No") { echo $initallink; }else{ ?>
                      <a href="node/<?php echo $ochinitid; ?>/edit&destination=<?php echo $cpath; ?>" class="btn btn-primary" >Initial Assessment Report</a>
					  <?php } ?>
					  
					 
					 
					 <?php if($discahrge == "No") { echo $dischargelink; }else{ ?> 
					  <a href="node/<?php echo $ochdisid; ?>/edit&destination=<?php echo $cpath; ?>" class="btn btn-primary" >Discharge Report</a>
					  
					  <?php } ?>
				  
				  
				  
				  </td>
				  
				 
				  </tr>
		  
	  <?php }   // End SLA Condition ======================================= // ?>
	  
<?php } ?>
  </tbody>
</table>





