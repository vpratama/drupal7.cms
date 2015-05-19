<?php
 static $acc_class;
  if (!isset($acc_class)) {
    $acc_menu = theme_get_setting('zenstrap_menu_accordion');
    if (!empty($acc_menu)) {
      $acc_menu = array_filter($acc_menu);
    }
    $acc_class = (empty($acc_menu)? '' : 'accordion');
  }
 $classes .= " $acc_class";
?>

<?php if ($content): ?>
  <section id="<?php print $region;?>" class="<?php print $classes; ?>">
    <?php print $content; ?>
  </section><!-- region__sidebar -->
<?php endif; ?>