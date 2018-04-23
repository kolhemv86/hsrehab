<script>

$( document ).ready(function() {
	
$("#edit-field-date-for-contact-patient-und-0-value-timeEntry-popup-1")
    .replaceWith('<select id="txtQuantity" name="field_date_for_contact_patient[und][0][value][time]" class="form-control">' +
          '<option value="08:00:00" <?php if($time == "08:00:00") { ?> selected="selected" <?php } ?> >08:00</option>' +
          '<option value="08:15:00" <?php if($time == "08:15:00") { ?> selected="selected" <?php } ?>>08:15</option>' +
          '<option value="08:30:00" <?php if($time == "08:30:00") { ?> selected="selected" <?php } ?>>08:30</option>' +
          '<option value="08:45:00" <?php if($time == "08:45:00") { ?> selected="selected" <?php } ?>>08:45</option>' +
          '<option value="09:00:00" <?php if($time == "09:00:00") { ?> selected="selected" <?php } ?>>09:00</option>' +
		  '<option value="09:15:00" <?php if($time == "09:15:00") { ?> selected="selected" <?php } ?>>09:15</option>' +
		  '<option value="09:30:00" <?php if($time == "09:30:00") { ?> selected="selected" <?php } ?>>09:30</option>' +
		  '<option value="09:45:00" <?php if($time == "09:45:00") { ?> selected="selected" <?php } ?>>09:45</option>' +
		  '<option value="10:00:00" <?php if($time == "10:00:00") { ?> selected="selected" <?php } ?>>10:00</option>' +
		  '<option value="10:15:00" <?php if($time == "10:15:00") { ?> selected="selected" <?php } ?>>10:15</option>' +
		  '<option value="10:30:00" <?php if($time == "10:30:00") { ?> selected="selected" <?php } ?>>10:30</option>' +
		  '<option value="10:45:00" <?php if($time == "10:45:00") { ?> selected="selected" <?php } ?>>10:45</option>' +
		  '<option value="11:00:00" <?php if($time == "11:00:00") { ?> selected="selected" <?php } ?>>11:00</option>' +
		  '<option value="11:15:00" <?php if($time == "11:15:00") { ?> selected="selected" <?php } ?>>11:15</option>' +
		  '<option value="11:30:00" <?php if($time == "11:30:00") { ?> selected="selected" <?php } ?>>11:30</option>' +
		  '<option value="11:45:00" <?php if($time == "11:45:00") { ?> selected="selected" <?php } ?>>11:45</option>' +
		  '<option value="12:00:00" <?php if($time == "12:00:00") { ?> selected="selected" <?php } ?>>12:00</option>' +
		  '<option value="12:15:00" <?php if($time == "12:15:00") { ?> selected="selected" <?php } ?>>12:15</option>' +
		  '<option value="12:30:00" <?php if($time == "12:30:00") { ?> selected="selected" <?php } ?>>12:30</option>' +
		  '<option value="12:45:00" <?php if($time == "12:45:00") { ?> selected="selected" <?php } ?>>12:45</option>' +
		  '<option value="13:00:00" <?php if($time == "13:00:00") { ?> selected="selected" <?php } ?>>13:00</option>' +
		  '<option value="13:15:00" <?php if($time == "13:15:00") { ?> selected="selected" <?php } ?>>13:15</option>' +
		  '<option value="13:30:00" <?php if($time == "13:30:00") { ?> selected="selected" <?php } ?>>13:30</option>' +
		  '<option value="13:45:00" <?php if($time == "13:45:00") { ?> selected="selected" <?php } ?>>13:45</option>' +
		  '<option value="14:00:00" <?php if($time == "14:00:00") { ?> selected="selected" <?php } ?>>14:00</option>' +
		  '<option value="14:15:00" <?php if($time == "14:15:00") { ?> selected="selected" <?php } ?>>14:15</option>' +
		  '<option value="14:30:00" <?php if($time == "14:30:00") { ?> selected="selected" <?php } ?>>14:30</option>' +
		  '<option value="14:45:00" <?php if($time == "14:45:00") { ?> selected="selected" <?php } ?>>14:45</option>' +
		  '<option value="15:00:00" <?php if($time == "15:00:00") { ?> selected="selected" <?php } ?>>15:00</option>' +
		  '<option value="15:15:00" <?php if($time == "15:15:00") { ?> selected="selected" <?php } ?>>15:15</option>' +
		  '<option value="15:30:00" <?php if($time == "15:30:00") { ?> selected="selected" <?php } ?>>15:30</option>' +
		  '<option value="15:45:00" <?php if($time == "15:45:00") { ?> selected="selected" <?php } ?>>15:45</option>' +
		  '<option value="16:00:00" <?php if($time == "16:00:00") { ?> selected="selected" <?php } ?>>16:00</option>' +
		  '<option value="16:15:00" <?php if($time == "16:15:00") { ?> selected="selected" <?php } ?>>16:15</option>' +
		  '<option value="16:30:00" <?php if($time == "16:30:00") { ?> selected="selected" <?php } ?>>16:30</option>' +
		  '<option value="16:45:00" <?php if($time == "16:45:00") { ?> selected="selected" <?php } ?>>16:45</option>' +
		  '<option value="17:00:00" <?php if($time == "17:00:00") { ?> selected="selected" <?php } ?>>17:00</option>' +
		  '<option value="17:15:00" <?php if($time == "17:15:00") { ?> selected="selected" <?php } ?>>17:15</option>' +
		  '<option value="17:30:00" <?php if($time == "17:30:00") { ?> selected="selected" <?php } ?>>17:30</option>' +
		  '<option value="17:45:00" <?php if($time == "17:45:00") { ?> selected="selected" <?php } ?>>17:45</option>' +
		  '<option value="18:00:00" <?php if($time == "18:00:00") { ?> selected="selected" <?php } ?>>18:00</option>' +
        '</select>');

$('#edit-field-clinic-locator-und-0-target-id').blur(function () {
		var data = this.value;
		var arr = data.split(' ');
		$("#edit-field-assign-to-a-clinic-und").val(arr[0]);		
});



var pval = <?php echo variable_get('assign_order'); ?>



$('body').on('click', '.getid', function() {
    var value = $(this).data('id');
    //var pval = parseInt(assorder) + 1; 
   

	
	$("#edit-field-assign-to-a-clinic-und").val(value);

    $('html, body').animate({
        scrollTop: $("#edit-field-triage-booking-status-und").offset().top
    }, 2000);
    
	
	
	$.ajax({
				url: '../../get/staff/user/'+value,
				type: 'GET', // Send post data
				async: false,
				success: function(data)
				{
					$("#edit-field-assign-to-a-staff-pat-und").empty();
					servers = $.parseJSON(data);
					
					$.each(servers, function(index, value) {
					
					$("#edit-field-assign-to-a-staff-pat-und").append($("<option></option>").val(value.uid).html(value.users_name));
					
					
					});	    		
				  
				},
				error: function(e)
				{
				
				}
		 });	
		 







		 
		 
	$.ajax({
				url: '../../get/rate/clinic/'+value,
				type: 'GET', // Send post data
				async: false,
				success: function(data)
				{
					
					$("#edit-field-initial-assessment-rate-pa-und-0-value").val('');
					$("#edit-field-rate-per-treatment-pat-und-0-value").val('');
					servers = $.parseJSON(data);
					
					$.each(servers, function(index, value) {
						
					$("#edit-field-initial-assessment-rate-pa-und-0-value").val(value.field_initial_assessment__value);	
					$("#edit-field-rate-per-treatment-pat-und-0-value").val(value.field_treatment_sessions__value);	
						
					});	
					
					
				  
				},
				error: function(e)
				{
				
				}
		 });		 
		 
 $("#field-assign-order-add-more-wrapper input").val(pval);

});



$("#edit-field-assign-to-a-clinic-und").change(function(){
var value = $("#edit-field-assign-to-a-clinic-und").val();


 //var pval = parseInt(assorder) + 1; 
 
	$.ajax({
				url: '../../get/staff/user/'+value,
				type: 'GET', // Send post data
				async: false,
				success: function(data)
				{
					$("#edit-field-assign-to-a-staff-pat-und").empty();
					servers = $.parseJSON(data);
					
					$.each(servers, function(index, value) {
					
					$("#edit-field-assign-to-a-staff-pat-und").append($("<option></option>").val(value.uid).html(value.users_name));
					
					
					});	 

				
				  
				},
				error: function(e)
				{
				
				}
		 });
		 
		 
		 
	$.ajax({
				url: '../../get/rate/clinic/'+value,
				type: 'GET', // Send post data
				async: false,
				success: function(data)
				{
					
					$("#edit-field-initial-assessment-rate-pa-und-0-value").val('');
					$("#edit-field-rate-per-treatment-pat-und-0-value").val('');
					servers = $.parseJSON(data);
					
					$.each(servers, function(index, value) {
						
					$("#edit-field-initial-assessment-rate-pa-und-0-value").val(value.field_initial_assessment__value);	
					$("#edit-field-rate-per-treatment-pat-und-0-value").val(value.field_treatment_sessions__value);	
						
					});	
					
					
				  
				},
				error: function(e)
				{
				
				}
		 });			 
		 
$("#field-assign-order-add-more-wrapper input").val(pval);

});








$('#edit-field-username-und-0-value').blur(function () {
	
	var value = $("#edit-field-username-und-0-value").val();
	
	$.ajax({
		url: '../../visit/plan/user/'+value,
        type: 'GET', // Send post data
        async: false,
        success: function(data)
		{
		  	if(data!="")
			{
				$("#edit-field-username-und-0-value").focus();
			}
			
		  $("#msg").html(data);						    		
		  
		},
		  error: function(e)
		  {
		  }
		 });	
});


$('#edit-field-password-und-0-password-field').blur(function () {

var tt = $('#edit-field-password-und-0-password-field').val();
$("#field-hidden-add-more-wrapper input").val(tt);


});


$('body').on('click', '.getreportid', function() {
	
	var value = $(this).data('id');
	
	var uid = $("#users_"+value).val();
	var type = $("#hidtype_"+value).val();
	
	window.location.href='report/assign/user/'+value+'/'+uid+'/'+type;
	
	
	
});


$('body').on('click', '.getaudireportid', function() {
	
	var value = $(this).data('id');
	
	
	var valid = $("#valauditor_"+value).val();
	var type = $("#hidtype_"+value).val();
	var cpath = $("#path_"+value).val();
	
	window.location.href='audireport/validate/'+value+'/'+valid+'/'+type+'/'+cpath;
	
	
	
});






$('#edit-field-treatment-sessions-und-0-value').blur(function () {
	
	var assetrate = parseInt($("#edit-field-initial-assessment-und-0-value").val());
	var session = parseInt($("#edit-field-treatment-sessions-und-0-value").val());
	
	var Toatalrate = assetrate+session;
    $("#field-total-rate-add-more-wrapper input").val(Toatalrate);	
	
	
	
	
});




$(".nav-tabs").find("[href='/core/hsrehab.co.uk/node/639/pdf']").hide();



$("#edit-field-service-packages-und  option[value=_none]").html('Select');
$("#edit-field-service-packages-new-und  option[value=_none]").html('Select');
$("#edit-field-service-psckages-physoth-und  option[value=_none]").html('Select');
$("#edit-field-service-packages-osteopath-und  option[value=_none]").html('Select');
$("#edit-field-service-packages-podiatry-und  option[value=_none]").html('Select');



//$(".form-item-field-initial-assessment--und-0-value label").replaceWith('<label class="control-label" for="edit-field-initial-assessment-und-0-value">Initial Assessment(rate in £ )</label>');



});

</script>
  