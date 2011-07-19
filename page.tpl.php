<?php
// $Id$

/**
 * @file page.tpl.php
 * Main page template file for the dynamo theme.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<!--
  Dynamo!
-->
<head>
<!--<meta http-equiv="X-UA-Compatible" content="IE=8; chrome=1" />-->
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if (IE 6)|(IE 7) ]>
    <link type="text/javascript" src="/<?php print(path_to_theme());?>/script/elsinore-ie67.js" />
    <link type="text/javascript" src="/<?php print(path_to_theme());?>/script/DD_belatedPNG_0.0.8a-min.js" />
  <![endif]-->
</head>
<body class="<?php print $body_classes; ?><?php if (!empty($admin)) print ' '.admin;  ?>">
<?php
/*adds support for for the admin module*/
  if (!empty($admin)) print $admin;
?>

<?php if ($help OR $messages) { ?>
  <div id="drupal-messages">
    <div id="messages-hide">
      <a href="#"><?php print t('hide'); ?></a>
    </div>

    <?php print $help ?>
    <?php print $messages ?>

    </div>
<?php } ?>

<div id="container" class="clearfix">

    <div id="page" class="minheight">
      <div id="page-inner" class="clearfix">

        <div id="pageheader">
          <div id="pageheader-inner">

            <<?php print $site_name_element; ?> id="site-name">
              <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>" rel="home">
                <?php print $site_name; ?>
              </a>
            </<?php print $site_name_element; ?>>


            <ul id="helpers">

             <li> <a class="print" href="javascript:window.print();">Print</a></li>
             <li> <a class="read" href="http://adgangforalle.dk">Læs op</a></li>
             <li> <a class="english" href="/node/189">English</a></li>
            </ul>

            <div id="top" class="clearfix">

              <div id="header" class="left">
                <?php print $header ?>
              </div>

              <div id="search" class="left">
                <?php print $search ?>
              </div>

              <div id="account" class="left">
                <?php print $account; ?>
              </div>

            </div>

            <div id="navigation">
              <div id="navigation-inner">
                <?php if ($primary_links){ ?>
                  <?php print theme('links', $primary_links); ?>
                <?php } ?>
              </div>
            </div>

            <?php print $breadcrumb; ?>
          </div>
        </div>

        <div id="pagebody" class="clearfix">
          <div id="pagebody-inner" class="clearfix">

            <?php if ($left) { ?>
              <div id="content-left">
                <?php print $left; ?>
              </div>
            <?php } ?>

            <div id="content">
              <div id="content-inner">

                <?php
                  /*if were in the user pages add the tabs in the top*/
                  if (arg(0) == 'user' && is_numeric(arg(1)) && $tabs){
                    print '<div class="tabs-user">' . $tabs . '</div>';
                  }
                ?>

                <div id="content-main">
                  <?php print $content; ?>
                </div>

                <?php
                  if (arg(0) != 'user'  && $tabs){
                    print '<div class="tabs">' . $tabs . '</div>';
                  }
                ?>


              </div>
            </div>

            <?php if ($right) { ?>
              <div id="content-right">
                <?php print $right; ?>
              </div>
            <?php } ?>

          </div>
        </div>

        <div id="pagefooter">
          <div id="pagefooter-inner" class="clearfix">
            <?php print $footer; ?>
          </div>

          <div class="footerlink">
            <a href="/node/191">Om hjemmesiden</a>
          </div>
          
          <div class="ting-powered">
            <a href="http://ting.dk">Empowered by Ting</a>
          </div>
          
        </div>


      </div>
    </div>

</div>
<?php print $closure; ?>
</body>
</html>

