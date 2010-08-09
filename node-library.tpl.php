<?php
/*
ad a class="" if we have anything in the $classes var
this is so we can have a cleaner output - no reason to have an empty <div class="" id=""> 
*/
if($classes){
   $classes = ' class="' . $classes . ' clearfix"';
}

if($id_node){
  $id_node = ' id="' . $id_node . '"';  
}
?>

<?php if ($page == 0){ ?>
<!--node-lib !!-->
<div<?php print $id_node . $classes; ?>>
  <div class="picture">
      <?php print $field_list_image_rendered; ?>
      <?php // print $list_image; ?>
    </div>

  <div class="content">
  
    <div class="library-openstatus <?php print $node->field_opening_hours_processed['status'];?>">
        <?php print $node->field_opening_hours_processed['status_local'];?>
    </div>

    <div class="vcard">
      <h2 class="fn org"><?php print l($node->title, 'node/'.$node->nid); ?></h2>
      <div class="adr">
        <div class="street-address"><?php print $node->location['street']; ?></div>
        <span class="postal-code"><?php print $node->location['postal_code']; ?></span>
        <span class="locality"><?php print $node->location['city']; ?></span>
      </div>

      <div class="link-card">
          <a href="/biblioteker?lat=<?php echo $node->location['latitude'] ?>&long=<?php echo $node->location['longitude'] ?>" id="biblo-<?php print $node->nid ?>">Se på kort</a>
      </div>

      <?php if($node->location['phone']){ ?>
      <div class="tel">
        <span class="type"><?php print t('Phone'); ?>:</span> <span><?php print $node->location['phone']; ?></span>
      </div>
      <?php } ?>
      <?php if($node->location['fax']){ ?>
      <div class="tel">
        <span class="type"><?php print t('Fax'); ?>:</span> <span><?php print $node->location['fax']; ?></span>
      </div>
      <?php } ?>
      <?php if($node->field_email['0']['view']){ ?>
      <div class="email">
        <span class="type"><?php print t('E-mail'); ?>:</span> <span><?php print $node->field_email['0']['view']; ?></span>
      </div>
      <?php } ?>
      <div class="geo">
      	<?php print t('Position'); ?>:
      	<span class="latitude"><?php echo $node->location['latitude'] ?></span>, 
 				<span class="longitude"><?php echo $node->location['longitude'] ?></span>
      </div>
    </div>

  </div>
  
  <?php print $node->field_opening_hours['0']['view'];?>
</div>

<?php }else{ 
//Content
?>
<div<?php print $id_node . $classes; ?>>

	<h1><?php print $title;?></h1>
		
	<div class="meta">
  	<?php if ($picture) { ;?>
			<span class="author-picture">
		  		<?php print $picture; ?>  
			</span>
		<?php } ?>


		<span class="time">
			<?php print format_date($node->created, 'custom', "j F Y") ?> 
		</span>	
		<span class="author">
			af <?php print theme('username', $node); ?>
		</span>	



		<?php if (count($taxonomy)){ ?>
		  <div class="taxanomy">
	   	  <?php print $terms ?> 
		  </div>  
		<?php } ?>
	</div>

	<div class="content">
		<?php print $content ?>
	</div>
		
	<?php if ($links){ ?>
    <?php  print $links; ?>
	<?php } ?>
</div>
<?php } ?>
