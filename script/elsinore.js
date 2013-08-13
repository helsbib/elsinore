/**
 * @file
 * JavaScript tweaks for the Elsinore theme.
 */
Drupal.behaviors.elsinore = function () {
  // Check if the tabs lib is loaded before trying to call it.
  if ($.fn.tabs) {
    $("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 7000, true);
    $('#frontpage-featured-tabs-button-pause').fadeIn('fast');

    $('#frontpage-featured-tabs-button-pause').click(function(e){
      e.preventDefault();
      $("#featured > ul").tabs('rotate',false);
      $(this).fadeOut('fast',function(){
        $('#frontpage-featured-tabs-button-resume').fadeIn('fast');
      });
    });

    $('#frontpage-featured-tabs-button-resume').click(function(e){
      e.preventDefault();
      $("#featured > ul").tabs('rotate', 7000, true);
      $(this).fadeOut('fast',function(){
        $('#frontpage-featured-tabs-button-pause').fadeIn('fast');
      });
    });
    $("#nyhedtilmeldform label").inFieldLabels({
      fadeOpacity:"0.2",
      fadeDuration:"100"
    });

  }
};
