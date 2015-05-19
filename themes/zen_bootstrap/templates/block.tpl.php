<?php if (!isset($_GET['modal']) || !$_GET['modal']): ?>
<?php if ($single_accordion):?>
   <?php print $content; ?>
<?php elseif ($block_is_menu) :?>
<div class="accordion-group">
  <div class="accordion-heading">
    <a class="accordion-toggle" data-toggle='collapse' data-parent="#<?php print $block->region;?>"
      href="#accordion-<?php print $block->delta; ?>"><?php print $title; ?></a>
  </div>
  <div id="accordion-<?php print $block->delta; ?>" class="accordion-body collapse">
    <div class="accordion-inner">
       <?php print $content; ?>
    </div>
  </div>
</div>
<?php else: ?>
<div id="<?php print $block_html_id; ?>" class="well <?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php print $content; ?>
</div>
<?php endif; ?>
<?php endif; ?>