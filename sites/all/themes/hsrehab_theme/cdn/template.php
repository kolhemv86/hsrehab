<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
 /**
   * Print user role class in body
 **/
 function hsrehab_theme_preprocess_html(&$vars) {
   foreach($vars['user']->roles as $role){
     $vars['classes_array'][] = 'role-' . drupal_html_class($role);
   }            
 }  

/**
  * Implementation of form_alter
**/
function hsrehab_theme_form_alter(&$form, $form_state, $form_id) {
	
	//print_r($form_id);
	
  if($form_id == 'appointment_request_node_form') {
    $form['title']['#description'] = '<p>' . t('Give a Reference to identify your Appointment Request.') . '</p>';  // Add an Help text to title
    $form['field_appointment_clinic'][LANGUAGE_NONE][0]['target_id']['#attributes'] = array(
      'onChange' => 'this.form.submit();', // Autosubmit field
    );
    global $user;
    if(in_array('hsrehab_admin', $user->roles)) {
     $form['title']['#attributes'] = array('readonly' => 'readonly');
     $form['field_appointment_preferred_city']['und'][0]['value']['#attributes'] = array('readonly' => 'readonly');
    }
  }
  
  
  
   /*if($form_id == 'user_register_form') {
	  
	   $form['actions']['submit']['#submit'][] = 'redirect_user';
	   
   }*/

  
  
  
  
  if($form_id == 'patient_sheet_node_form') {
    $form['actions']['submit']['#value'] = '<span class="glyphicon glyphicon-ok"></span> Submit';
    $form['actions']['submit']['#attributes']['class'][] = 'icon-before btn-success';
	$form['actions']['submit']['#submit'][] = 'mysubmit_node_submit';    
	
	if(arg(0) == 'node' && arg(2) == 'edit'){
     
	 drupal_set_title('Modify the Status');
	
	}
    
	else{
    
	drupal_set_title('Refer a Patient'); }
		
	
	
	
  }
  
  if($form_id == 'company_sheet_node_form') {
	  
	 $form['actions']['submit']['#value'] = 'Next'; 
	 $form['actions']['submit']['#attributes']['class'][] = 'btn btn-success';
	 $form['actions']['submit']['#submit'][] = 'company_redirect';
	  
  }
  
  
  if($form_id == 'network_company_sheet_node_form') {
	  
	 $form['actions']['submit']['#submit'][] = 'netcompany_redirect';
	  
  }
  
  
  
  
  
  
  if($form_id == 'invoice_node_form') {
    $form['field_invoice_ini_rate']['und'][0]['value']['#attributes'] = array('readonly' => 'readonly');
    $form['field_invoice_session_rate']['und'][0]['value']['#attributes'] = array('readonly' => 'readonly');
  }
  if($form_id == 'triage_assessment_form_node_form') {
    $form['title']['#description'] = '<p>' . t('Please indicate a title for your assessment, or leave it as it is.') . '</p>';  // Add an Help text to title
	
  }
  if($form_id == 'session_node_form') {
    $form['title']['#description'] = '<p>' . t('Please indicate a title for this session, or leave it as it is.') . '</p>';  // Add an Help text to title
	
	
	
	
	
	$form['type_options'] = array(
  '#type' => 'value',
  '#value' => array('_none' => t('None'),
					'70' => t('Initial Assessment and Discharge'),
                    '69' => t('Initial Assessment'))
                   
);
	
	/*$form['field_session_app_des_1']['und'] = array(
    '#type' => 'select', 
    '#title' => t('Description'),
	'#options' => $form['type_options']['#value'],
    '#weight' => 2, 	

   );
	
	
	$form['field_session_app_des_2'] = array(
    '#type' => 'select', 
    '#title' => t('Description'),
	'#options' => array('_none' => t('None'),
					'71' => t('Follow Up'),
                    '72' => t('Follow Up and Discharge'),
					'73' => t('Discharge (Without Follow Up)'),
					
					),
    '#weight' => 2, 	

   );
   
   $form['field_session_app_des_3'] = array(
    '#type' => 'select', 
    '#title' => t('Description'),
	'#options' => array('_none' => t('None'),
					'71' => t('Follow Up'),
                    '72' => t('Follow Up and Discharge'),
					'73' => t('Discharge (Without Follow Up)'),
					
					),
    '#weight' => 2, 	

   );
   
   $form['field_session_app_des_4'] = array(
    '#type' => 'select', 
    '#title' => t('Description'),
	'#options' => array('_none' => t('None'),
					'71' => t('Follow Up'),
                    '72' => t('Follow Up and Discharge'),
					'73' => t('Discharge (Without Follow Up)'),
					
					),
    '#weight' => 2, 	

   );
   
   
   $form['field_session_app_des_5'] = array(
    '#type' => 'select', 
    '#title' => t('Description'),
	'#options' => array('_none' => t('None'),
					'71' => t('Follow Up'),
                    '72' => t('Follow Up and Discharge'),
					'73' => t('Discharge (Without Follow Up)'),
					
					),
    '#weight' => 2, 	

   );
   
   
   $form['field_session_app_des_6'] = array(
    '#type' => 'select', 
    '#title' => t('Description'),
	'#options' => array('_none' => t('None'),
					'71' => t('Follow Up'),
                    '72' => t('Follow Up and Discharge'),
					'73' => t('Discharge (Without Follow Up)'),
					
					),
    '#weight' => 2, 	

   );
   
   
   $form['field_session_app_des_7'] = array(
    '#type' => 'select', 
    '#title' => t('Description'),
	'#options' => array('_none' => t('None'),
					'71' => t('Follow Up'),
                    '72' => t('Follow Up and Discharge'),
					'73' => t('Discharge (Without Follow Up)'),
					
					),
    '#weight' => 2, 	

   );
   
   
   $form['field_session_app_des_8'] = array(
    '#type' => 'select', 
    '#title' => t('Description'),
	'#options' => array('_none' => t('None'),
					'71' => t('Follow Up'),
                    '72' => t('Follow Up and Discharge'),
					'73' => t('Discharge (Without Follow Up)'),
					
					),
    '#weight' => 2, 	

   );
	*/
	
	
  }
  if($form_id == 'och_initial_assessment_report_node_form') {
    $form['title']['#description'] = '<p>' . t('Please indicate a title for this report, or leave it as it is.') . '</p>';  // Add an Help text to title
  }
  if($form_id == 'och_discharge_report_node_form') {
    $form['title']['#description'] = '<p>' . t('Please indicate a title for this report, or leave it as it is.') . '</p>';  // Add an Help text to title
  }
  if($form_id == 'ml_initial_assessment_report_node_form') {
    $form['title']['#description'] = '<p>' . t('Please indicate a title for this report, or leave it as it is.') . '</p>';  // Add an Help text to title
  }
  if($form_id == 'ml_discharge_report_node_form') {
    $form['title']['#description'] = '<p>' . t('Please indicate a title for this report, or leave it as it is.') . '</p>';  // Add an Help text to title
  }
  if($form_id == 'invoice_node_form') {
    $form['title']['#description'] = '<p>' . t('Please indicate a title for this report, or leave it as it is.') . '</p>';  // Add an Help text to title
  }
  
  
  if ( $form_id == 'user_register_form') {
	  
    $param = $form_state['entityreference_prepopulate']['user']['user']['field_user_reg_type'][0];
	
	  if($param!=16)
	  {	  
		$form['account']['roles']['#access'] = TRUE;
		$form['account']['roles']['#required'] = TRUE;
		
	  }
		  // Get available roles.
		  $roles = array_map('check_plain', user_roles(TRUE));

		  // Unset system roles.
		  unset($roles[DRUPAL_AUTHENTICATED_RID]);
		  unset($roles[DRUPAL_ANONYMOUS_RID]);
		  unset($roles[3]);
		  unset($roles[2]);
		  unset($roles[7]);
		  unset($roles[10]);
		  unset($roles[4]);
		  unset($roles[11]);
		  unset($roles[12]);
		  unset($roles[8]);
		  unset($roles[5]);
		  unset($roles[14]);
		  

		  // Add options without system roles.
		  $form['account']['roles']['#options'] = $roles; 
	  
	
  
  
  }
  
  
}


function getrolbyuser($uid)
{
	
	 $role = db_query("SELECT r.name FROM {users_roles} ur LEFT JOIN {role} r ON r.rid=ur.rid WHERE ur.uid=$uid LIMIT 1");
	 $result = $role->fetchAll();
	 return $result;
	
}



function hsrehab_theme_comment_view_alter(&$build) {
  //$build['#post_render'][] = 'MY_MODULE_comment_post_render';
  
global $user;  
$user->roles;  
if(in_array('staff',$user->roles))
{
	
	
  $uid = $build['#comment']->uid;
  $rorles = getrolbyuser($uid);
 
  
  if($rorles[0]->name == 'hsrehab_admin')
  {
	  
	  
	  $build['#post_render'][] = 'MY_MODULE_comment_post_render';
	  
  }	  
} 
  
if(in_array('staff-triage',$user->roles))
{
	$uid = $build['#comment']->uid;
	 $rorles = getrolbyuser($uid);
	if($rorles[0]->name == 'hsrehab_admin')
	{
	  $build['#post_render'][] = 'MY_MODULE_comment_post_render';
	  
	}	  
		
}
  
  
  
  
}




function MY_MODULE_comment_post_render() {
  // Nothing here.
}




/*function hsrehab_theme_form_comment_form_alter(&$form, &$form_state) {
  //echo "<pre>";
 // print_r($form['title']);
  global $user;
   if (!user_role('staff')){
    // Form alter here to unset comment form and show "only premium members can comment"
    unset($form['author']); 
    unset($form['subject']); 
    unset($form['comment_body']);
    unset($form['actions']['submit'] );
    unset($form['actions']['preview'] );
    print "Only Premium members can comment";
  } 
  
 
}
*/


/*function hsrehab_theme_comment_view_alter(&$build) {
  
 //echo "<pre>";
 //print_r($build);
  
  //$build['comment_body']['#access'] = FALSE;
 // hide($build['#comment']->comment_body);
//$build['#comment']->subject = FALSE;
//$build['#comment']->picture = FALSE;
  
}
*/





/**
  * Alter User Registration form
**/
// function hsrehab_theme_form_user_register_form_alter(&$form, $form_state, $form_id) {
//     $form['field_user_company'][LANGUAGE_NONE][0]['target_id']['#attributes'] = array(
//      'onChange' => 'this.form.submit();', // Autosubmit field
//    );
// }

/**
  * Redirect to Dashboard Handler
**/
function hsrehab_theme_redirect_handler($form, &$form_state)
{
	unset($_REQUEST['destination']); // this doesn't seem to work though
	unset($form['#redirect']); // i think this doesnt do anything because $form is not a reference
	$form_state['redirect'] = '/dashboard';
}
/**
  * Hoverize the menu
**/

function hsrehab_theme_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    else{
    unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
    $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle disabled';
    $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
  	$element['#localized_options']['attributes']['data-hover'] = 'dropdown';
  	$element['#localized_options']['attributes']['data-delay'] = '100';
  	$element['#localized_options']['attributes']['data-close-others'] = 'false';

    // Check if this element is nested within another
    if ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] > 1)) {
      // Generate as dropdown submenu
      $element['#attributes']['class'][] = 'dropdown-submenu';
	  $element['#localized_options']['attributes']['tabindex'][] = '-1';

    }
    else {
      // Generate as standard dropdown
      $element['#attributes']['class'][] = 'dropdown';
      $element['#localized_options']['html'] = TRUE;
      $element['#title'] .= ' <span class="caret"></span>';
    }
  }
  // Set dropdown trigger element to # to prevent inadvertant page loading with submenu click
   $element['#localized_options']['attributes']['data-target'] = '#';
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}



function mysubmit_node_submit($form, &$form_state) {/*echo "<pre>"; print_r($form_state); exit;  
  //echo "<pre>";
 /* print_r($form_state['build_info']['args'][0]->uid);
  exit;*/
  
  /*$pname = $form_state['build_info']['args'][0]->title;
  $dob = $form_state['build_info']['args'][0]->field_patient_dob;
  $age = $form_state['build_info']['args'][0]->field_patient_age;
  $adress = $form_state['build_info']['args'][0]->field_patient_address;
  
  $address1 = $form_state['build_info']['args'][0]->field_patient_address['und'][0]['thoroughfare'];
  $address2 = $form_state['build_info']['args'][0]->field_patient_address['und'][0]['premise'];
  $country = $form_state['build_info']['args'][0]->field_patient_address['und'][0]['country'];
  $postalcode = $form_state['build_info']['args'][0]->field_patient_address['und'][0]['postal_code'];
  $locality = $form_state['build_info']['args'][0]->field_patient_address['und'][0]['locality'];
  
  $fulladress = $address1.$address2.'</br>';
  $fulladress.= $country.$postalcode.'</br>';
  $fulladress.= $locality;
  
  
  
  $pmail = $form_state['build_info']['args'][0]->field_patient_mail['und'][0]['email'];
  //$injury = $form_state['build_info']['args'][0]->field_patient_area_of_injury['und'][0];
  $pno = $form_state['build_info']['args'][0]->field_patient_phone_number['und'][0]['value'];
  
  
  $uid = $form_state['build_info']['args'][0]->uid;
  $user=user_load($uid);
  
 $from = variable_get('site_mail');  
  
  $message = "You have Refer new Patient details given below </br>
 <table>
 <tr><td>Patient Name</td><td>Patient Email</td><td>Patient Contact no</td><td>Patient Address</td></tr>
 <tr><td>$pname</td><td>$pmail</td><td>$pno</td><td>$fulladress</td><td></td></tr>
 </table>
 "; // Body of your email here.

 
 
 $params = array(
           'body' => $message,
           'subject' => 'Patient Created',
           'headers'=>'simple',
     );
     $to = $user->mail;
     drupal_mail('Patient Sheet', 'send_link', $to, language_default(), $params, $from, TRUE);
  
  
  
  $form_state['redirect'] = '/node/add/patient-sheet';*/
  }
  
function company_redirect($form, &$form_state)
{
	/*echo "<pre>";
	print_r($form_state);
	exit;
	*/
	
	
	$nid = $form_state['build_info']['args'][0]->nid;
    $client_type = $form_state['build_info']['args'][0]->field_company_client_type['und'][0]['target_id'];
	
	$form_state['redirect'] = array(
    'admin/people/create',
    array(
      'query' => array(
	    'field_user_company' => $nid,
        'field_user_reg_type' => 16,
        'field_hs_rehab_service_types' => 13,
		'field_user_company_type' => $client_type,
		'destination' => '/client-companies'
      ),
     
    ),
  );

}


function netcompany_redirect($form, &$form_state)
{
	
	$form_state['redirect']='admin/network-company';
	
}



function hsrehab_theme_date_popup_process_alter(&$element, &$form_state, &$context) 
{  
if ($form_state['complete form']['#form_id'] == 'patient_sheet_node_form' && $element['#field']['field_name'] == 'field_date_for_contact_patient' || $element['#field']['field_name'] == 'field_triage_booking_date_time_') 
{     
  $max = 0; 		  
}  

if (isset($element['#datepicker_options']['maxDate'])) {    
	
	$max = $element['#datepicker_options']['maxDate'];  

}  

if (isset($max)) 
{    

$element['#datepicker_options'] = array('minDate' => "+2D",);  

}  


$element['date'] = date_popup_process_date_part($element);}  
  
