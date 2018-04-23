
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
        <?php foreach ($header as $field => $label): ?>
          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?> scope="col">
            <?php print $label; ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>
  <?php endif; ?>
  <tbody>
  
  <?php //echo "<pre>"; print_r($rows); ?>
  
  
    <?php for($i=0;$i<count($rows);$i++)  { ?>
      
	  <tr>
	  
	  <td><?php echo $rows[$i]['nid']; ?></td>
	  <td><?php echo $rows[$i]['title']; ?></td>
	  <td><?php echo $rows[$i]['uid']; ?></td>
	  <td><?php echo $rows[$i]['field_patient_referral_date']; ?></td>
	  <td>
	 
	  <input type="button" name="bookseesment" value="Book the appointment" id="myBtn" class="btn btn-xs btn-success getapp" data-id="<?php echo $rows[$i]['nid_1']; ?>" data-toggle="modal" data-target="#app_<?php echo $rows[$i]['nid_1']; ?>" />
	  
		  
	  
	  
	    <div class="modal fade" id="app_<?php echo $rows[$i]['nid_1']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Book the appointment</h4>
            </div>
            <div class="modal-body">
			 <input type="hidden" class="form-control" id="nid" value="<?php echo $rows[$i]['nid_1']; ?>">
			 
			 <input type="hidden" class="form-control" id="asset_<?php echo $rows[$i]['nid_1']; ?>" value="<?php echo $rows[$i]['field_initial_assessment_rate_pa']; ?>">
			 
			 <input type="hidden" class="form-control" id="rate_<?php echo $rows[$i]['nid_1']; ?>" value="<?php echo $rows[$i]['field_rate_per_treatment_pat']; ?>">
			 
			  <input type="hidden" class="form-control" id="uid_<?php echo $rows[$i]['nid_1']; ?>" value="<?php echo strip_tags($rows[$i]['uid']); ?>">
			 
			 
            	<div class="row">
	                <div class="form-group">
					
	                    <div class="col-sm-6">
						<label>Date</label>
	                        <?php /*<input type="date" required class="form-control gdate" id="ndate_<?php echo $rows[$i]['nid_1']; ?>" placeholder="yy/mm/dd"> */ ?>
							
							<input type="text" name="idTourDateDetails" placeholder="dd/mm/yyyy" id="idTourDateDetails" class="form-control clsDatePicker ndate_<?php echo $rows[$i]['nid_1']; ?> "> 
							
							
	                    </div>
						 <div class="col-sm-6">
						<label>Time</label>
	                        <?php /*<input type="stime" required class="form-control" id="time_<?php echo $rows[$i]['nid_1']; ?>" placeholder="Enter Time"> */?>
							
							<select class="form-control" id="time_<?php echo $rows[$i]['nid_1']; ?>">
							<option value="08:00">08:00</option>
							<option value="08:15">08:15</option>
							<option value="08:30">08:30</option>
							<option value="08:45">08:45</option>
							<option value="09:00">09:00</option>
							<option value="09:15">09:15</option>
							<option value="09:30">09:30</option>
							<option value="09:45">09:45</option>
							<option value="10:00">10:00</option>
							<option value="10:15">10:15</option>
							<option value="10:30">10:30</option>
							<option value="10:45">10:45</option>
							<option value="11:00">11:00</option>
							<option value="11:15">11:15</option>
							<option value="11:30">11:30</option>
							<option value="11:45">11:45</option>
							<option value="12:00">12:00</option>
							<option value="12:15">12:15</option>
							<option value="12:30">12:30</option>
							<option value="12:45">12:45</option>
							<option value="13:00">13:00</option>
							<option value="13:15">13:15</option>
							<option value="13:30">13:30</option>
							<option value="13:45">13:45</option>
							<option value="14:00">14:00</option>
							<option value="14:15">14:15</option>
							<option value="14:30">14:30</option>
							<option value="14:45">14:45</option>
							<option value="15:00">15:00</option>
							<option value="15:15">15:15</option>
							<option value="15:30">15:30</option>
							<option value="15:45">15:45</option>
							<option value="16:00">16:00</option>
							<option value="16:15">16:15</option>
							<option value="16:30">16:30</option>
							<option value="16:45">16:45</option>
							<option value="17:00">17:00</option>
							<option value="17:15">17:15</option>
							<option value="17:30">17:30</option>
							<option value="17:45">17:45</option>
							<option value="18:00">18:00</option>
							</select>
							
	                    </div>
	                </div>
	           
	               
	                   
	          
					
					 <div class="form-group">
					
	                  <div class="col-sm-12">
	                   <?php 
					    
						$name = 'appointment_booking_status  ';
						$myvoc = taxonomy_vocabulary_machine_name_load($name);
						$tree = taxonomy_get_tree($myvoc->vid); ?>
						<label>Status</label>
						<select name="appstatus" id="appstatus_<?php echo $rows[$i]['nid_1']; ?>" class="form-control getappstatus">
						<option value="">None</option>
						<?php foreach ($tree as $term) {  ?>
						<option value="<?php echo $term->tid; ?>" <?php if($term->tid == $invoices) { echo "selected"; } ?>><?php echo $term->name; ?></option>
						
					   <?php } ?>
					    </select>
				    </div>
	                </div>
					<!-- himanshu -->
					
					
					<!-- himanshu end -->
					
					
					
					
	            
	               
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
	  
	      <td></td>
	  
	  </tr>
	  
	  
	  
    <?php } ?>
  </tbody>
</table>

<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	  
	  
	  <script>
        $('#idTourDateDetails').datepicker({
     dateFormat: 'dd/mm/yy',
     minDate: '+5d',
     changeMonth: true,
     changeYear: true,
     altField: "#idTourDateDetailsHidden",
     altFormat: "yy-mm-dd"
 });
      </script>
	  
	  
<script type="text/javascript">
  	
$(document).ready(function () {
	$("#status_datetime").hide();
	$(document).on("click", ".getapp", function(){
				var modal_id = $(this).data("id");
				$("#app_"+modal_id).modal("show");
	});
    
	$(document).on("click", ".getsave", function(){
		
		var get_id = $(this).data("id");
		
		var ndate = $(".ndate_"+get_id).val();
		var dateAr = ndate.split('/');
		
		var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
		
		var time = $("#time_"+get_id).val();
		var appstatus = $("#appstatus_"+get_id).val();
		
		if(ndate == "" || time == "" || appstatus == "")
		{
			alert("Please all field is required..");
			
		}else{
		
        window.location.href="book/app/"+newDate+"/"+time+"/"+appstatus+"/"+get_id+"";
        }	
 	});	
	
	
     
	 
	
   
          
	 
	 
	 
});

  </script>

