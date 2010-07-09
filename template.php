<?php 

function elsinore_ting_search_form($form){
	$form['submit']['#type'] 	= "submit" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','elsinore')."/images/searchbutton.png";
	$form['submit']['#attributes']['class'] 	= "";

	return drupal_render($form);	
}


/*forms*/
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
