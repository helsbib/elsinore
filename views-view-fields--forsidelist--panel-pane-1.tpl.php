<?php

// Insert title as alt text. Would like to do this in a preprocess function,
// but this doesn't seem possible with current version of Views.
$fields['field_list_image_fid']->content = str_replace('alt=""', 'alt="' . check_plain($fields['title']->raw) . '"', $fields['field_list_image_fid']->content);

?>

<div class="image">
  <?php print $fields['field_image_fid']->content; ?>
</div>


<div class="info">
  <h3><?php print l($fields['title']->content, $fields['field_link_teaser_url']->raw); ?></h3>
  <p><?php print $fields['field_text_value']->content; ?></p>
</div>



