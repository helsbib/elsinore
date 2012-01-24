<?php
// $Id$

/**
 * Overrides dynamo filefield icon.
 */
function elsinore_filefield_icon($file) {
  if (is_object($file)) {
    $file = (array) $file;
  }
  $alt = t('PDF file');

  if ($icon_url = filefield_icon_url($file)) {
    $icon = '<img alt="'. $alt .'" src="'. $icon_url .'" />';
  }
  return $icon;
}

/**
 * Override of theme_ting_search_form().
 */
function elsinore_ting_search_form($form){
  $form['submit']['#type']  = "submit" ;
  $form['submit']['#src']   = drupal_get_path('theme','elsinore')."/images/searchbutton.png";
  $form['submit']['#attributes']['class']   = "";

  return drupal_render($form);
}

/**
 * Override of theme_user_login_block().
 */
function elsinore_user_login_block($form){
  $name = drupal_render($form['name']);
  $pass = drupal_render($form['pass']);
  $submit = drupal_render($form['submit']);
  $remember = drupal_render($form['remember_me']);

  return  $name . $pass .$submit . $remember . drupal_render($form) . '<div class="new_loaner"><div><a href="/DIN+SIDE/Ny+låner%3F">Sådan bliver du låner...</a></div></div>';
}

/**
 * Override of theme_menu_item_link().
 */
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
  if ($variables['type'] == 'page' && isset($variables['field_page_type'][0]['safe'])) {
    $page_type = $variables['field_page_type'][0]['safe'];

    if (!empty($page_type)) {
      $variables['classes'] .= ' page-type-' . $page_type;
    }
  }
  /*
   * Someone removed links from node display, so we add in flag by hand.
   */
  if (module_exists('flag')) {
    $variables['content'] .= flag_create_link('ding_redia_feed_mobileapp', $variables['node']->nid);
  }
}

/**
 * Preprocess library location pane template variables.
 */
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

/**
 * Preprocess library title pane template variables.
 */
function  elsinore_preprocess_ding_panels_content_library_title(&$variables) {
  if (isset($variables['library_links'])) {
    $variables['library_links']['events'] = l('Det sker', $variables['base_url'] . '/arrangementer');
    $variables['library_navigation'] = theme('item_list', $variables['library_links']);
  }
}

/**
 * Preprocess ting objects.
 */
function elsinore_preprocess_ting_object(&$variables) {
  $object = $variables['object'];

  // Want all subjects on one line. We do that by pretending there is
  // only one subject that is the concatenation of all the subjects.
  $object->subjects = array(implode(', ', $object->subjects));

  // Reverse order of buttons.
  $variables['buttons'] = array_reverse($variables['buttons']);
}

/**
 * Preprocess ting list item.
 */
function elsinore_preprocess_ting_list_item(&$variables) {
  $variables['buttons'] = array_reverse($variables['buttons']);
}
