<?php
// $Id$

/**
 * @file alma_user_status_block.tpl.php
 * Template for the user status block.
 */

/*
 * TODO get status from mikl
 */
if( $user_status['loan_overdue_count'] >= 1){
  $loan_status  = "warning";
}
else{
  $loan_status  = "default";
}

if( $user_status['reservation_count'] >= 1){
  $reservation_status = "ok";
}
else{
  $reservation_status = "default";

}
?>
<div id="account-profile" class="clearfix">
  <div class="user">

    <div class="logout">
      <?php print l(t('log out'), 'logout', array('attributes' => array('class' =>'logout'))); ?>
    </div>

    <h5><span><?php print t('Welcome'); ?></span></h5>
    <span class="username">
      <?php print l($display_name, $profile_link, array('attributes' => array('class' =>'username')));  ?>
    </span>
  </div>
  <?php if ($status_available): ?>
      <?php if ($has_cart): ?>
      <div class="cart">
        <?php echo l('<span class="count">' . $cart_count . '</span>', 'user/' . $user->uid . '/cart', array('html' => true)) ?>
      </div>
    <?php endif; ?>

    <ul>
      <li class="loans">

        <div class="content">
          <?php print l('<span>'.t("Loans") . '</span> <strong>' . $user_status['loan_count'] . '</strong>', 'user/'. $user->uid . '/status', array('html' => TRUE)); ?>
        </div>
        <?php if($loan_status != "default"){ ?>
          <div class="status"><span class="<?php print $loan_status ?>" alt="<?php format_plural($user_status['loan_overdue_count'], '1 loan overdue', '@count loans overdue'); ?>">!</span></div>
        <?php } ?>
      </li>
      <li class="reservations">
        <div class="content">
          <?php print l('<span>'.t("Reservations") . '</span> <strong>' . $user_status['reservation_count'] . '</strong>', 'user/'. $user->uid . '/status', array('html' => TRUE, 'fragment' => 'reservation')); ?>
        </div>
        <?php if($reservation_status  != "default"){ ?>
          <div class="status"><span class="<?php print $reservation_status ?>">ok</span></div>
        <?php } ?>

      </li>
  </ul>
  <?php else: ?>
    <div class="status-unavailable">
      <?php print $status_unavailable_message; ?>
    </div>
  <?php endif; ?>
</div>
