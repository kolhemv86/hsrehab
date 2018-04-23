<?php 


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
<?php endif; ?>  <?php if (!empty($header)) : ?>    

<thead>      
<tr>        
<?php /*foreach ($header as $field => $label): ?>          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?> scope="col">            <?php print $label; ?>          </th>        <?php endforeach; */?>				
<td><b>Patient Ref No</b></td>		
<td><b>Patient</b></td>		
<td><b>Client ID</b></td>		
<td><b>Date of Initial Assessment</b></td>	
<td><b>Projected Discharge Date</b></td>	
<td><b>Log the Treatment Details</b></td>		
<td><b>Reports</b></td>		
<td><b>Invoice</b></td> 
<?php /*<td><b>Out Standing</b></td> */ ?>      
</tr>    
</thead> 
 <?php endif; ?>  
 
 <tbody>    <?php //echo "<pre>"; print_r($rows); ?>        
 
 <?php for($i=0;$i<count($rows);$i++)  { 	
 
 
           $dateinit12_old = explode('-',strip_tags($rows[$i]['field_session_app_date_1'])); 

            $datearr = explode("/", $dateinit12_old[0]);   
		    $newdate = implode("-",$datearr);
			$Date1 = date("Y-m-d",strtotime($newdate));
		    
			if(strip_tags($rows[$i]['field_session_app_status_1'] == "DNA"))
			 {
				 $finalsession = $Date1;
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
		 
		 
		 
		 
    $uid = strip_tags($rows[$i]['uid']);   
	$user = user_load($uid);    
	$cpath = current_path();
	
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
			
	
	$initallink = '<a href="node/add/och-initial-assessment-report?fastadd=fadd&field_och_init_session_id='.$rows[$i]['gid'].'&field_och_inireport_patient_info='.$rows[$i]['field_session_patient'].'&edit[field_och_inireport_app_date][und][0][value][date]='.$arrdate[0].'&edit[field_och_inireport_app_date][und][0][value][time]='.$newtime[0].'&edit[field_och_inirep_clinician_job][und][0][value]='.$rows[$i]['field_user_position'].'&field_och_inirep_clinician_name='.$rows[$i]['uid_1'].'&edit%5Btitle%5D='.strip_tags($rows[$i]['title']).' OCH IA Report&destination='.$cpath.'" class="btn btn-primary">Initial Assessment Report</a>';				
	
	$dischargelink = '<a href="node/add/och-discharge-report?fastadd=fadd&field_och_session_id='.$rows[$i]['gid'].'&amp;field_och_disrep_patient_info='.$rows[$i]['field_session_patient'].'&amp;field_och_disrep_clinician_name='.$rows[$i]['uid_1'].'&amp;edit%5Btitle%5D='.strip_tags($rows[$i]['title']).' OCH Discharge Report&amp;destination='.$cpath.'" class="btn btn-primary">Discharge Report</a>'; 
	
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
	
	$initallink = '<a href="node/add/ml-initial-assessment-report?fastadd=fadd&field_ml_init_session_id='.$rows[$i]['gid'].'&amp;field_ml_inirep_patient_info='.$rows[$i]['field_session_patient'].'&amp;edit[field_ml_inirep_clinician_job][und][0][value]='.$rows[$i]['field_user_position'].' &amp;field_ml_inirep_clinician_name='.$rows[$i]['uid_1'].'&amp;edit%5Btitle%5D='.strip_tags($rows[$i]['title']).' ML IA Report&amp;destination='.$cpath.'" class="btn btn-primary">Initial Assessment Report</a>';				
	
	$dischargelink = '<a href="node/add/ml-discharge-report?fastadd=fadd&field_ml_session_id='.$rows[$i]['gid'].'&amp;field_ml_disrep_patient_infos='.$rows[$i]['field_session_patient'].'&amp;field_ml_disrep_clinician_name='.$rows[$i]['uid_1'].'&amp;edit%5Btitle%5D='.strip_tags($rows[$i]['title']).' ML Discharge Report&amp;destination='.$cpath.'" class="btn btn-primary">Discharge Report</a>'; 
	}          

        
		
		// ================= SLA Condition ======================================= //

              
			 $session_in = $rows[$i]['field_session_in_out'];
			 $sessnid = $rows[$i]['field_session_patient'];
			 
			 $stop_date = explode("/", $dateinit12_old[0]);
			 $newdate = implode("-",$stop_date);
			 $getdate = date("Y-m-d",strtotime($newdate));
			 $currentdate = date("Y-m-d");
			
			 $Expirydate = date('Y-m-d', strtotime($getdate . ' +1 day'));  
			 
			 $finalsesiondate = date('Y-m-d',strtotime($finalsession . ' +1 day'));



 ?>      	 
 
 
 
 <tr>	  	  
 <td><?php echo $rows[$i]['nid']; ?></td>	  
 <td><?php echo $rows[$i]['title']; ?></td>	
 <td><?php echo $rows[$i]['uid'];   ?></td>	  
 
 <td><?php  $dateinit12 = explode('-',strip_tags($rows[$i]['field_session_app_date_1']));  echo strip_tags($dateinit12[0]);   ?></td>
 
 <td><?php if($prodate!="") { $arr = explode(' ',$prodate); echo date('d/m/Y',strtotime($arr[0])); } ?></td>  

 <td>
 
 <?php /*<input type="button" name="bookseesment" value="Logs Session" id="myBtn" class="btn btn-xs btn-success getmodel1" data-id="<?php echo $rows[$i]['nid_1']; ?>" data-toggle="modal" data-target="#myModal_<?php echo $rows[$i]['nid_1']; ?>" /> */ ?>
 
  <a class="ctools-use-modal btn btn-xs btn-success" href="modal/node/<?php echo $rows[$i]['nid_1']; ?>/edit/nojs">Logs Session</a> 
 
 <div class="modal fade" id="myModal_<?php echo $rows[$i]['nid_1']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
 <div class="modal-dialog">        
 <div class="modal-content">            
 <div class="modal-header">			                
 
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                
 <h4 class="modal-title" id="myModalLabel">Edit Session</h4>            
 </div>            
 
 <div class="modal-body">			 
 <?php $objnode = node_load($rows[$i]['nid_1']);			         
 $invoices = $objnode->field_session_app_des_1['und'][0]['target_id'];   			        
 $apstatus = $objnode->field_session_app_status_1['und'][0]['target_id'];					?>             	
 
 <div class="row">	                
 <div class="form-group">						                  
 <div class="col-sm-12">	                   
 <?php 	$name = 'invoices_descriptions ';						
    $myvoc = taxonomy_vocabulary_machine_name_load($name);						
	$tree = taxonomy_get_tree($myvoc->vid); ?>						
	
	<label>Initial Assessment </label>						
	<select name="invoices" id="invoices_<?php echo $rows[$i]['nid_1']; ?>" class="form-control">			<option value="">None</option>						
	<?php foreach ($tree as $term) {  ?>						
	<option value="<?php echo $term->tid; ?>" <?php if($term->tid == $invoices) { echo "selected"; } ?>><?php echo $term->name; ?></option>											   
	<?php } ?>					    
	</select>				    
	</div>	                
	</div>	           	                
	<div class="form-group">	                    
	<div class="col-sm-12">	                    
	<?php $name = 'appointment_status  ';						
	$myvoc = taxonomy_vocabulary_machine_name_load($name);						
	$tree = taxonomy_get_tree($myvoc->vid); ?>						
	<label>Appoinment Status</label>						
	<select name="apstatus" id="apstatus_<?php echo $rows[$i]['nid_1']; ?>" class="form-control">				<option value="">None</option>						
	<?php foreach ($tree as $term) {  ?>						
	<option value="<?php echo $term->tid; ?>" <?php if($term->tid == $apstatus) { echo "selected"; } ?>><?php echo $term->name; ?></option>											
	<?php } ?>						
	</select>	                    
	</div>	                
	</div>	            	                            	
	</div>            
	</div>            
	<div class="modal-footer">                
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                
	<button type="button" id="save" data-id="<?php echo $rows[$i]['nid_1']; ?>" class="btn btn-primary getsave">Save changes</button>           
	</div>        
	</div>    
	</div>
	</div>	  		  
	</td>	  	  
	<td>	  
	<input type="button" name="report" value="Reports" id="myBtnre" class="btn btn-xs btn-success getreport" data-id="<?php echo $rows[$i]['nid_1']; ?>" data-toggle="modal" data-target="#report_<?php echo $rows[$i]['nid_1']; ?>" />	  	  
	
	<div class="modal fade" id="report_<?php echo $rows[$i]['nid_1']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
	<div class="modal-dialog">        
	<div class="modal-content">           
	<div class="modal-header">  
			                
	
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                <h4 class="modal-title" id="myModalLabel">Reports</h4>            
	</div>            
	<div class="modal-body">			            	
	<div class="row">	                
	<div class="form-group">						                  
	<div class="col-sm-12">	                  
		
		<h3><?php if($init == "No") { echo $initallink; }else{ ?>
                      <a href="node/<?php echo $ochinitid; ?>/edit?fastsrc=fasttrack&destination=<?php echo $cpath; ?>" class="btn btn-primary" >Initial Assessment Report</a>
					  <?php } ?></h3>				  
		
		<h3><?php if($init == "No") { echo ""; }else{ ?>
                      <a href="node/<?php echo $ochinitid; ?>?fastsrc=fasttrack" class="btn btn-primary" >View IA Report</a>
					  <?php } ?></h3>					 
		
		<h3><?php if($discahrge == "No") { echo $dischargelink; }else{ ?> 
					  <a href="node/<?php echo $ochdisid; ?>/edit?fastsrc=fasttrack&destination=<?php echo $cpath; ?>" class="btn btn-primary" >Discharge Report</a>
					  
					  <?php } ?></h3>
		
	</div>	                
	</div>	           	               	                            	
	</div>            
	</div>            
	
	<div class="modal-footer">                
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                           </div>        
	</div>    
	</div>
	</div>	  	  	  
	</td>	  
	
	<td>       <?php  if($discahrge == "Yes")  { ?>	   	   	    
	
	<a class="btn btn-xs btn-success" href="node/add/invoice?edit[title]=Invoice for <?php echo strip_tags($rows[$i]['title']); ?> sessions&amp;og_group_ref=790&amp;field_invoice_practice_name=<?php echo$rows[$i]['uid_1']; ?>&amp;field_invoice_patient_name=<?php echo $rows[$i]['field_session_patient']; ?>&amp;field_invoice_establishment=<?php echo $rows[$i]['field_session_establishment']; ?>&amp;edit[field_invoice_hsrehab_regnb][und][0][value]=<?php echo$rows[$i]['field_session_patient']; ?>&amp;edit[field_invoice_ini_rate][und][0][value]=<?php echo $rows[$i]['field_session_ini_rate'];?>&amp;edit[field_invoice_session_rate][und][0][value]=<?php echo$rows[$i]['field_session_rate']; ?>&amp;edit[field_invoice_app_date_1][und][0][value][date]=<?php echo strip_tags($rows[$i]['field_session_app_date_1_1']); ?>&amp;edit[field_invoice_app_date_2][und][0][value][date]=<?php echo strip_tags($rows[$i]['field_session_app_date_2']); ?>&amp;edit[field_invoice_app_date_3][und][0][value][date]=<?php echo strip_tags($rows[$i]['field_session_app_date_3']); ?>&amp;edit[field_invoice_app_date_4][und][0][value][date]=<?php echo strip_tags($rows[$i]['field_session_app_date_4']); ?>&amp;edit[field_invoice_app_date_5][und][0][value][date]=<?php echo strip_tags($rows[$i]['field_session_app_date_5']); ?>&amp;edit[field_invoice_app_date_6][und][0][value][date]=<?php echo strip_tags($rows[$i]['field_session_app_date_6']); ?>&amp;edit[field_invoice_app_date_7][und][0][value][date]=<?php echo strip_tags($rows[$i]['field_session_app_date_7']); ?>&amp;edit[field_invoice_app_date_8][und][0][value][date]=<?php echo strip_tags($rows[$i]['field_session_app_date_8']); ?>&amp;edit[field_invoice_app_status_1][und][0][value]=<?php echo$rows[$i]['field_session_app_status_1']; ?>&amp;edit[field_invoice_app_status_2][und][0][value]=<?php echo$rows[$i]['field_session_app_status_2']; ?>&amp;edit[field_invoice_app_status_3][und][0][value]=<?php echo$rows[$i]['field_session_app_status_3']; ?>&amp;edit[field_invoice_app_status_4][und][0][value]=<?php echo$rows[$i]['field_session_app_status_4']; ?>&amp;edit[field_invoice_app_status_5][und][0][value]=<?php echo$rows[$i]['field_session_app_status_5']; ?>&amp;edit[field_invoice_app_status_6][und][0][value]=<?php echo$rows[$i]['field_session_app_status_6']; ?>&amp;edit[field_invoice_app_status_7][und][0][value]=<?php echo$rows[$i]['field_session_app_status_7']; ?>&amp;edit[field_invoice_app_status_8][und][0][value]=<?php echo$rows[$i]['field_session_app_status_8']; ?>&amp;field_invoice_app_des_1=<?php echo $rows[$i]['field_session_app_des_1']; ?>&amp;field_invoice_app_des_2=<?php echo $rows[$i]['field_session_app_des_2']; ?>&amp;field_invoice_app_des_3=<?php echo $rows[$i]['field_session_app_des_3']; ?>&amp;field_invoice_app_des_4=<?php echo $rows[$i]['field_session_app_des_4']; ?>&amp;field_invoice_app_des_5=<?php echo $rows[$i]['field_session_app_des_5']; ?>&amp;field_invoice_app_des_6=<?php echo $rows[$i]['field_session_app_des_6']; ?>&amp;field_invoice_app_des_7=<?php echo $rows[$i]['field_session_app_des_7']; ?>&amp;field_invoice_app_des_8=<?php echo $rows[$i]['field_session_app_des_8']; ?>" title="Create an invoice for this session">Create Invoice</a>	   	   
	<?php  }  ?>	  
	</td>


  <?php /*  <td>
	
	
	 /*echo $Expirydate."</br>";
	 echo $session_in."</br>";
	 echo $average."</br>";
	 echo $expirtymlpostdate."</br>";
	 echo $IA_status."</br>";*/
	
	
	/*if(($currentdate >=$Expirydate && $session_in == "IN") || ($average == 7) || ($currentdate >=$expirtymlpostdate && $IA_status == "IN") || ($currentdate >= $finalsesiondate && $session_in == "IN")) { ?>
	
	<a href="out-standing">Go to Out Standing</a>
	
	<?php } ?>
	</td>
*/ ?>


	
	</tr>	  	  	      
	<?php } ?>  
	</tbody>
	</table>
	<script type="text/javascript">  	
	$(document).ready(function () {		
	$(document).on("click", ".getmodel1", function(){				
	var modal_id = $(this).data("id");				
	$("#myModal_"+modal_id).modal("show");	});    	
	$(document).on("click", ".getsave", function(){				
			var get_id = $(this).data("id");				
			var invoices = $("#invoices_"+get_id).val();		
			var apstatus = $("#apstatus_"+get_id).val();		
			var type = 1;				
			if(invoices == "" || apstatus == "")		
			{			
				alert("Please all field is required..");					
			}else{				        
				window.location.href="node/sess/"+invoices+"/"+apstatus+"/"+get_id+"/"+type+"";				
			}	
		});			 	 	
		$(document).on("click", ".getreport", function(){				
			var modal_id = $(this).data("id");				
			$("#report_"+modal_id).modal("show");	
		});             	 	 	 
		});  
		
		</script>