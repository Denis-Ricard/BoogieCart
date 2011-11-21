<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Make IE8 behave like IE7, necessary for charts -->
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    
    <title>Admin Control Panel</title>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo MAIN_URL; ?>css/reset.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo MAIN_URL; ?>css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo MAIN_URL; ?>css/custom-theme/jquery-ui-1.8.1.custom.css" />
    
    <!-- IE specific CSS stylesheet -->
    <!--[if IE]>
            <link rel="stylesheet" type="text/css" media="screen" href="<?php echo MAIN_URL; ?>css/ie.css" />
    <![endif]-->
    
    <!-- This stylesheet contains advanced CSS3 features that do not validate yet -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo MAIN_URL; ?>css/css3.css" />
    
    <!-- JavaScript -->
    <script type="text/javascript" src="<?php echo MAIN_URL; ?>js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php echo MAIN_URL; ?>js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo MAIN_URL; ?>js/jquery.wysiwyg.js"></script>
    <script type="text/javascript" src="<?php echo MAIN_URL; ?>js/excanvas.js"></script>
    <script type="text/javascript" src="<?php echo MAIN_URL; ?>js/jquery.visualize.js"></script>
    <script type="text/javascript" src="<?php echo MAIN_URL; ?>js/script.js"></script>
  </head>

  <body>
    <div id="bokeh"><div id="container">
    
    <div id="header">
      
      <h1 id="logo">Admin Control Panel </h1>
            
      <?php if($contentFile != "login.php") { require_once(dirname(__FILE__) . '/menu.php'); } ?>
      
    </div><!-- end #header -->
            
    <div id="content">
            