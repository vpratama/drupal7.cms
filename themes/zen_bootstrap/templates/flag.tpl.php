<span class="<?php print $flag_wrapper_classes; ?>">
  <?php if ($link_href): ?>
    <a href="<?php print $link_href; ?>" title="<?php print $link_title; ?>" class="btn btn-mini <?php print $flag_classes ?>" rel="nofollow"><?php print $link_text; ?></a><span class="flag-throbber">&nbsp;</span>
  <?php else: ?>
    <span class="<?php print $flag_classes ?>"><?php print $link_text; ?></span>
  <?php endif; ?>
  <?php if ($after_flagging): ?>
    <span class="btn btn-mini flag-message flag-<?php print $status; ?>-message">
      <?php print $message_text; ?>
    </span>
  <?php endif; ?>
</span>
