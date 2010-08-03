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
	$pass =  	drupal_render($form['pass']); 
	$submit =  	drupal_render($form['submit']); 
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


/**
 * Preprocess node template variables.
 */
function elsinore_preprocess_node(&$variables) {
  $node = $variables['node'];
  if (!$variables['page']) {
  if (isset($variables['field_list_image_rendered']) && strlen($variables['field_list_image_rendered']) > 1) {
    $variables['list_image'] = $variables['field_list_image_rendered'];
  }
  else {
    $variables['list_image'] = '&nbsp;'; //<--why ??
  }
  }

  $similar_nodes = similarterms_list(variable_get('ding_similarterms_vocabulary_id', 0));
  if (count($similar_nodes)) {
  $variables['similarterms'] = theme('similarterms', variable_get('similarterms_display_options', 'title_only'), $similar_nodes);
  }

  if ($variables['type'] == 'event') {
  $start = strtotime($node->field_datetime[0]['value'] . 'Z');
  $end = strtotime($node->field_datetime[0]['value2'] . 'Z');

  // If no end time is set, use the start time for comparison.
  if (2 > $end) {
    $end = $start;
  }

  // Find out the end time of the event. If there's no specified end
  // time, we’ll use the start time. If the event is in the past, we
  // create the alert box.
  if (($end > 0 && format_date($end, 'custom', 'Ymd') < format_date($_SERVER['REQUEST_TIME'], 'custom', 'Ymd'))) {
    $variables['alertbox'] = '<div class="alert">' . t('NB! This event occurred in the past.') . '</div>';
  }

  // Style date and price
  $info = theme('event_information', $start, $end);
  
  $variables['event_date'] = $info['date'];
  if ($info['time'] != NULL) {
    $variables['event_time'] = $info['time'];
  }
  $variables['event_price'] = $info['price'];
  $variables['event_lenght'] = $info['length'];  
  }
}

function elsinore_event_information($start, $end, $price) {
  $output = array();

  // Maybe swap end and start (problem with views event_list)
  if ($end < $start) {
  $t = $end; $end = $start; $start = $t;
  }

  // More human-friendly date formatting – try only to show the stuff
  // that’s different when displaying a date range.
  if (date("Ymd", $start) == date("Ymd", $end)) {
  $output['date'] = format_date($start, 'custom', "j. F Y");
  $output['time'] = format_date($start, 'custom', "H:i");
  }
  elseif(date("Ym", $start) == date("Ym", $end)) {
  $output['date'] = format_date($start, 'custom', "j.") . " – " . format_date($end, 'custom', "j. F Y");
  $output['time'] = format_date($start, 'custom', "H:i") . " – " . format_date($end, 'custom', "H:i");
  }
  else {
  $output['date'] = format_date($start, 'custom', "j. M.") . " – " . format_date($end, 'custom', "j. M. Y");
  $output['time'] = format_date($start, 'custom', "H:i") . " – " . format_date($end, 'custom', "H:i");
  }

  // Validate event time
  if (format_date($start, 'custom', "Hi") == '0000') {
  $output['time'] = NULL;
  }
  
  
   $output['length'] = (($end - $start) / 60) / 60;


  /* Price */
	if ($price > 0){
  $output['price'] = check_plain($price) ." ". t('Kr');
	} 
  else {
  $output['price'] = t('Free');
	}

  return $output;
}


