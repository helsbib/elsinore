<?php 

/*forms*/
function elsinore_ting_search_form($form){
	$form['submit']['#type'] 	= "submit" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','elsinore')."/images/searchbutton.png";
	$form['submit']['#attributes']['class'] 	= "";

	return drupal_render($form);	
}

function elsinore_user_login_block($form){
	$form['submit']['#type'] 	= "image_button" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','elsinore')."/images/accountlogin.png";
	$form['submit']['#attributes']['class'] 	= "";


	$name = drupal_render($form['name']);
	$pass = drupal_render($form['pass']);
	$submit = drupal_render($form['submit']);
	$remember =	drupal_render($form['remember_me']); 
	
	return 	$name . $pass .$submit . $remember . drupal_render($form);
}

function elsinore_menu_item_link($link) {

  if ($link['href'] == 'http://nolink') {
  return '<span class="nolink">' . check_plain($link['title']) . '</span>';
  } 
  else {
  return theme_menu_item_link($link);
 }
}

function elsinore_preprocess_ding_panels_content_library_location(&$variables) {
  $node = $variables['node'];

  // Add a static Google map to the location information.
  if (function_exists('location_has_coordinates') && location_has_coordinates($node->location)) {
    $map_url = url('http://maps.google.com/maps/api/staticmap', array('query' => array(
      'zoom' => 14,
      'size' => '210x210',
      'markers' => $node->location['latitude'] . ',' . $node->location['longitude'],
      'sensor' => 'false',
    )));
    $variables['library_map'] = theme('image', $map_url, '', '', NULL, FALSE);
  }

}


function  elsinore_preprocess_ding_panels_content_library_title(&$variables) {
//  dsm('elsinore_preprocess_ding_panels_content_library_title');
  print_r($variables['library_links']);  

/*
  unset($variables['library_links']['pc_booking']);
  $variables['library_links']['morten'] = 'hest;
*/

  $variables['library_navigation'] = theme('item_list', $variables['library_links']);  
}
