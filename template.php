<?php 

function elsinore_ting_search_form($form){

	$form['submit']['#type'] 	= "submit" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','elsinore')."/images/searchbutton.png";
	$form['submit']['#attributes']['class'] 	= "";

	return drupal_render($form);	
}
