<?php dsm('fdf'); ?>
<!-- pane 4 !! -->
<?php 
//dsm($fields['field_datetime_value']);
  // Convert the date value to timestamp
  $date = strtotime($fields['field_datetime_value']->raw . 'Z');
  if (format_date($_SERVER['REQUEST_TIME'], 'custom', 'd-m-Y') == format_date($date, 'custom', 'd-m-Y') ) {
    $is_today = "today";
  }

	/* Price */
	if($fields['field_entry_price_value']->content > 0){
		$price = check_plain($fields['field_entry_price_value']->raw) ." ". t('Kr');
  	//print $fields['field_entry_price_value']->content;
	}else{ 
  	$price = t('Free');
	}  
?>



<div class="calendar-leafs">

  <div class="leaf <?php print $is_today ?>">
    <div class="day"><?php print format_date($date, 'custom', 'l');?></div>
    <div class="date"><?php print format_date($date, 'custom', 'j');?></div>
    <div class="month"><?php print format_date($date, 'custom', 'M');?></div>
  </div>

  <div class="info">
    <h4><?php print $fields['title']->content; ?></h4>
	 <?php $fields['field_datetime_value']; ?>
			  
    <span><?php print $fields['field_library_ref_nid']->content; ?></span>

    <?php if (format_date($date, 'custom', 'Hi') != '0000') { ?>
    <span class="time">
      <?php print $datetime; ?>
			<?php print format_date($date, 'custom', 'H:i'); ?> 
			<?php // $fields['field_datetime_value']->content; ?>
    </span>
    <?php } ?>
    <?php print $price; ?>
  </div>

</div>