<?php

 $destination = $_REQUEST['destination'];
 $src = $_REQUEST['src'];
 
 
   if($destination=='new_referral' || $destination=='fasttrack-patient' || $destination=='standard-patient' || $destination=='others')

   { ?>



   	<script type="text/javascript">

   		$(".group-patient-informations").hide();

   		$(".group-medical-informations").hide();

   		$(".field-name-field-patient-descrip-injury").hide();

   		$(".group-appoin-info").hide();

   		

   			

   	</script>



  <?php } ?>

  
  <?php if($destination=='fasttrack-patient' || $destination=='standard-patient')
  {  ?>
          <script type="text/javascript"> 
		  
		  $(".group-triage-info").hide();
		  $(".borderh h1").replaceWith('<h1 class="page-header pheader">Assigining the Patient to the clinic</h1>');
          
		  </script>
 


  <?php } ?>
  
  
   <?php if($destination=='others')
  {  ?>
          <script type="text/javascript"> 
		  
		  
		  $(".borderh h1").replaceWith('<h1 class="page-header pheader">Assigining the Patient</h1>');
          
		  </script>
 


  <?php } ?>
  
  
  <?php if($destination=='/client-companies')
  {  
      global $base_url; 
      
	  $nid = $_REQUEST['field_user_company']; 
      $nodeobj = node_load($nid);
      $title = $nodeobj->title; 

?>
          <script type="text/javascript"> 
		  
		  
		  $(".borderh h1").replaceWith('<h1 class="page-header pheader">Add Client Company user</h1>');
		  
		   $(".borderh .breadcrumb").replaceWith('<div class="breadcrumb"><span class="inline odd first"><a href="<?php echo $base_url;?>">Dashboard</a></span><span class="delimiter">»</span><span class="inline odd first"><a href="<?php echo $base_url;?>/client-companies">Client Company</a></span> <span class="delimiter">»</span> <span class="inline even"><a href="<?php echo $base_url;?>/node/<?php echo $nid; ?>"><?php echo $title; ?></a></span> <span class="delimiter">»</span> <span class="inline odd last">Add Client user</span></div>');
          
		  </script>
 


  <?php } ?>
  
  
  
   <?php if($src=='network')
  {  
      global $base_url; 
      
	  $nid = $_REQUEST['field_user_company']; 
      $nodeobj = node_load($nid);
      $title = $nodeobj->title; 

?>
          <script type="text/javascript"> 
		  
		  
		  $(".borderh h1").replaceWith('<h1 class="page-header pheader">Add Clinician</h1>');
		  
		   $(".borderh .breadcrumb").replaceWith('<div class="breadcrumb"><span class="inline odd first"><a href="<?php echo $base_url;?>">Dashboard</a></span> <span class="delimiter">»</span><span class="inline odd first"><a href="<?php echo $base_url;?>/admin/network-company">Network Company</a></span><span class="delimiter">»</span> <span class="inline even"><a href="<?php echo $base_url;?>/node/<?php echo $nid; ?>"><?php echo $title; ?></a></span> <span class="delimiter">»</span> <span class="inline odd last">Add Clinician</span></div>');
          
		  </script>
 


  <?php } ?>
  
  
  
 <?php $path = current_path(); 
   global $base_url;
    if($path == "node/add/patient-sheet")
	{ ?>
<script type="text/javascript"> 
    
	
	$(".borderh .breadcrumb").replaceWith('<div class="breadcrumb"><span class="inline odd first"><a href="<?php echo $base_url;?>">Dashboard</a></span> <span class="delimiter">»</span><span class="inline odd first">Refer a Patient</span></div>');
	
	
	$(".form-item-field-patient-dob-und-0-value-date label").replaceWith('<label class="control-label" for="edit-field-patient-dob-und-0-value-datepicker-popup-1">Date Of Birth</label>');
	
	
	
	
 </script>
	<?php } ?>
  
  
  
  
  
  
   <?php if($destination=='new_referral')
  {  ?>
          <script type="text/javascript"> 
		  
		  $(".group-phy-info").hide();
		  $(".borderh h1").replaceWith('<h1 class="page-header pheader">Assigining the Patient to the Triage Staff</h1>');
          
		  </script>
 


  <?php } ?>
  
 

 <?php if($_REQUEST['field_user_staff_type'] == 1)

 { ?>

	 <script type="text/javascript">

	 $("#edit-field-user-staff-type-und").prop('checked', true);

	 

	 </script>

	 

<?php } ?>	 



<?php if($_REQUEST['field_user_reg_type'])

{ ?>

	<script type="text/javascript">

	$(".group-registration-type").hide();

	</script>

<?php } ?>





<?php if($_REQUEST['chtitle'])

{ ?>

	<script type="text/javascript">

	$(".borderh h1").replaceWith('<h1 class="page-header pheader">Triage Follow-up Report</h1>');

	</script>

<?php } ?>


<?php if($_REQUEST['fastsrc'])
{ ?>
	<script type="text/javascript">
	$('.tabs--primary').hide();
	</script>

<?php } ?>


<?php if($_REQUEST['standsrc'])
{ ?>
<script type="text/javascript">
	$('.tabs--primary').hide();
	</script>

<?php } ?>


<?php 

global $user;  
$user->roles;  
if(in_array('company-och',$user->roles))
{ ?>

<script type="text/javascript">
	$('#comments').hide();
</script>

<?php } ?>

<?php if(in_array('company-medicolegal',$user->roles))
{ ?>

<script type="text/javascript">
	$('#comments').hide();
</script>

<?php } ?>

<?php if(in_array('auditor',$user->roles))
{ ?>

<script type="text/javascript">
	$('#comments').hide();
</script>

<?php } ?>



<?php if($_REQUEST['field_triage_form_att_app'])
  {  
      global $base_url; 
      
	  $nid = $_REQUEST['field_triage_form_att_app']; 
      $nodeobj = node_load($nid);
      $title = $nodeobj->title; 

?>
          <script type="text/javascript"> 
		  
		  
		 
		  
		   $(".borderh .breadcrumb").replaceWith('<div class="breadcrumb"><span class="inline odd first"><a href="<?php echo $base_url;?>">Dashboard</a></span><span class="delimiter">»</span><span class="inline odd first"><a href="<?php echo $base_url;?>/ap-confirm">Appointment Confirmed</a></span> <span class="delimiter">»</span> <span class="inline even"><a href="<?php echo $base_url;?>/node/<?php echo $nid; ?>"><?php echo $title; ?></a></span> <span class="delimiter">»</span> <span class="inline odd last">Triage Assetment Form</span></div>');
          
		  </script>
 


  <?php } ?>

  
  <?php if($destination=='admin/current_patient')
  { ?>
        <script type="text/javascript"> 
		
        var closeorder = <?php echo variable_get('assign_close_order'); ?>
		
		var total = parseInt(closeorder) + 1;
		
		$("#edit-field-assign-close-order input").val(total);
		
		
		</script>

  <?php } ?>

  
  