<?php if ($site_name || $site_slogan): ?>
<div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html"><?php print $site_name; print "&nbsp;<font size='1'>".$site_slogan."</font>" ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-left">
              <?php if ($page['navigation'] || $main_menu): ?>
                <?php print theme('links__system_main_menu', array(
                  'links' => $main_menu,
                  'attributes' => array(
                    'id' => 'main-menu',
                    'class' => array('nav', 'navbar-nav', 'navbar-left'),
                  ),
                )); ?>
              <?php endif; ?>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
              <ul>
                <li><?php print $search_box; ?></li>
              <ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
<?php endif; ?>
    
    <!-- Show a "Please Upgrade" box to both IE7 and IE6 users (Edit to IE 6 if you just want to show it to IE6 users) - jQuery will load the content from js/ie.html into the div -->
    
    <!--[if lte IE 7]>
        <div class="ie warning"></div>
    <![endif]-->
    
    <br />
    <br />
    <br />
    <div class="row">
      <div class="col-sm-3">
        <?php print render($page['sidebar_first']); ?>
        <?php print render($page['sidebar_second']); ?>
      </div>
      <div class="col-sm-8">
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
      </div>
    </div>
    <footer id="footer">
        <p>
            Copyright &copy; 2011 <a href="<?php print $front_page; ?>"><?php print ($site_name) ? $site_name : ''; ?></a>
        </p>
    </footer> <!-- #footer -->
