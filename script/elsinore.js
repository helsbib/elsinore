/**
 * @file
 * JavaScript tweaks for the Elsinore theme.
 */
Drupal.behaviors.elsinore = function () {
  // Check if the tabs lib is loaded before trying to call it.
  if ($.fn.tabs) {
    $("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 7000, true);
  }
};
