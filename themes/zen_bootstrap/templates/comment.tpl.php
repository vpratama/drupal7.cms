<article class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <header>
    <p class="submitted alert-info">
      <span class="picture"><?php print $picture; ?></span><br/>
      <span class="author"><?php print $author; ?></span><br/>
      <span class="submission-date"><?php print $created; ?></span><br/>
    </p>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h3<?php print $title_attributes; ?>>
        <?php print $title; ?>
        <?php if ($new): ?>
          <mark class="new"><?php print $new; ?></mark>
        <?php endif; ?>
      </h3>
    <?php elseif ($new): ?>
      <mark class="new"><?php print $new; ?></mark>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($status == 'comment-unpublished'): ?>
      <p class="unpublished"><?php print t('Unpublished'); ?></p>
    <?php endif; ?>
  </header>
  <div class="content-body">
  <?php
    hide($content['links']);
    print render($content);
  ?>
  <?php print render($content['links']) ?>
  </div>
  <?php if ($signature): ?>
    <footer class="user-signature clearfix">
      <?php print $signature; ?>
    </footer>
  <?php endif; ?>
</article>
