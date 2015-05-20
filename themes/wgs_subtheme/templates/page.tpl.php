<div id="wrapper">

    <header id="header" class="clearfix" role="banner">
    
        <?php if ($site_name || $site_slogan): ?>
      <hgroup>
        <?php if ($site_name): ?>
            <h1 id="site-title"><a href="<?php print $front_page; ?>"><?php print $site_name; ?></a></h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <h2 id="site-description"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </hgroup><!-- /hgroup -->
    <?php endif; ?>
    
    </header> <!-- #header -->

<div id="main" class="clearfix">

    <?php if ($page['navigation'] || $main_menu): ?>
      <!-- Navigation -->
      <nav id="menu" class="clearfix" role="navigation">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>

        <?php print render($page['navigation']); ?>
      </nav> <!-- #nav -->
    <?php endif; ?>
    
    <!-- Show a "Please Upgrade" box to both IE7 and IE6 users (Edit to IE 6 if you just want to show it to IE6 users) - jQuery will load the content from js/ie.html into the div -->
    
    <!--[if lte IE 7]>
        <div class="ie warning"></div>
    <![endif]-->
    
    <div id="content" role="main">
    
        <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if ($tabs = render($tabs)): ?>
        <div class="tabs"><?php print $tabs; ?></div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    
    </div> <!-- #content -->
    
    <aside id="sidebar" role="complementary">
         <?php print render($page['sidebar_first']); ?>

          <?php print render($page['sidebar_second']); ?>
    </aside> <!-- #sidebar -->
    
</div> <!-- #main -->
    
    <footer id="footer">
        <p>
            Copyright &copy; 2011 <a href="<?php print $front_page; ?>"><?php print ($site_name) ? $site_name : ''; ?></a>
        </p>
    </footer> <!-- #footer -->
    
    <div class="clear"></div>

</div> <!-- #wrapper -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script src="js/script.js"></script>
