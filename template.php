<?php 

function elsinore_ting_search_form($form){

	$form['submit']['#type'] 	= "submit" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','elsinore')."/images/searchbutton.png";
	$form['submit']['#attributes']['class'] 	= "";

	return drupal_render($form);	
}


function elsinore_menu_item_link($link) {
  if ($link['href'] == 'http://nolink') {
    return '<span class="nolink">'.check_plain($link['title']).'</span>';
  }
  else {
    return theme_menu_item_link($link);
  }
}
