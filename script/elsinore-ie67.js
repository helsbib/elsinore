/**
 * @file
 * JavaScript tweaks for IE6/7.
 */
Drupal.behaviors.elsinore_pngfix = function () {
    DD_belatedPNG.fix('#pageheader');
    DD_belatedPNG.fix('#pagebody');
    DD_belatedPNG.fix('#pagebody-inner');
    DD_belatedPNG.fix('#pagefooter');
    //DD_belatedPNG.fix('#featured li.ui-tabs-nav-item a');
    DD_belatedPNG.fix('div.jcarousel-next');
    DD_belatedPNG.fix('div.jcarousel-prev');
    DD_belatedPNG.fix('div.ding-library-map a.resize');
    DD_belatedPNG.fix('div#account-profile li.loans div.status span.warning');
    DD_belatedPNG.fix('div#account-profile li.reservations div.status span.ok');
    DD_belatedPNG.fix('div#pageheader-inner ul#helpers li a');
};
