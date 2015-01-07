<?php
if (preg_match('/(?i)msie [5-9]/', $_SERVER['HTTP_USER_AGENT'])) {
 echo ($_SERVER['HTTP_USER_AGENT']);
 echo "<h2>Sorry! Your browser is outdated and not compatible with this site!!!</h2> "
 . "Please use any modern browsers such as Firefox, Opera, Chrome, IE 10+ ";
 exit;
}
$dont_check_login = true;
?>
<?php
if (file_exists('install.php')) {
 if (isset($_GET['install'])) {
  if ($_GET['install'] == 'done') {
   // Delete the insatll file after installation
   @unlink('install.php');
   // Redirect to main page
   header('location: index.php');
  }
 } else {
  header('location: install.php');
 }
 return;
}
?>
<?php
$content_class = true;
$class_names[] = 'content';
?>
<?php
include_once("includes/functions/loader.inc");
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
  <title>Ino ERP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <?php
  if (!empty($metaname_description)) {
   echo "<meta name='description' content=\"inoERP - A Open Source PHP based Enterprise Management System\">";
  }
  ?>
  <meta name="keywords" content="ERP,PHP ERP,Open Source ERP ">
  <title><?php echo isset($pageTitle) ? $pageTitle . ' - inoERP!' : ' inoERP! ' ?></title>
  <link href="<?php echo THEME_URL; ?>/public.css" media="all" rel="stylesheet" type="text/css" />
  <link href="<?php echo THEME_URL; ?>/jquery.css" media="all" rel="stylesheet" type="text/css" />
  <?php
  if (!empty($css_file_paths)) {
   foreach ($css_file_paths as $key => $css_file) {
    ?>
    <link href="<?php echo HOME_URL . $css_file; ?>" media="all" rel="stylesheet" type="text/css" />
    <?php
   }
  }
  ?>
  <link href="tparty/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Styles -->
  <link href="tparty/bootstrap/css/style.css" rel="stylesheet">
  <!-- Carousel Slider -->
  <link href="tparty/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Animations -->
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,300italic,700,700italic,900' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Exo:400,300,600,500,400italic,700italic,800,900' rel='stylesheet' type='text/css'>
  <link href="<?php echo HOME_URL; ?>themes/default/index.css" media="all" rel="stylesheet" type="text/css" />
  <script src="includes/js/jquery-2.0.3.min.js"></script>
  <script src="tparty/bootstrap/js/bootstrap.min.js"></script>
  <script src="tparty/bootstrap/js/menu.js"></script>
  <script src="<?php echo HOME_URL; ?>includes/js/jssor.slider.mini.js"></script>
 </head>
 <body>   


  <div id="topbar" class="clearfix">
   <div class="container">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
     <div class="social-icons">
      <span><a data-toggle="tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></span>
      <span><a data-toggle="tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a></span>
      <span><a data-toggle="tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></span>
      <span><a data-toggle="tooltip" data-placement="bottom" title="Youtube" href="https://www.youtube.com/playlist?list=PLI9s_lIFpC099xADLymQcDCmrDhnkxcjM"><i class="fa fa-youtube"></i></a></span>
      <span><a data-toggle="tooltip" data-placement="bottom" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></span>
      <span><a data-toggle="tooltip" data-placement="bottom" title="Dribbble" href="#"><i class="fa fa-dribbble"></i></a></span>
      <span class="last"><a data-toggle="tooltip" data-placement="bottom" title="Skype" href="#"><i class="fa fa-skype"></i></a></span>

     </div><!-- end social icons -->
    </div><!-- end columns -->
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
     <div class="topmenu">
      <span class="topbar-login"><i class="fa fa-user"></i> <a href="<?php echo HOME_URL; ?>extensions/user/user_login.php">Login / Register</a></span>

     </div><!-- end top menu -->
     <div class="callus">
      <span class="topbar-email"><i class="fa fa-envelope"></i> <a href="#">contact@inoideas.org</a></span>
      <span class="topbar-phone"><i class="fa fa-phone"></i> 1-205-419-5131</span>
     </div><!-- end callus -->
    </div><!-- end columns -->
   </div><!-- end container -->
  </div><!-- end topbar -->

  <header id="header-style-1">
   <div class="container">
    <nav class="navbar yamm navbar-default">
     <div class="navbar-header">
      <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
       <span class="icon-bar"><img src="<?php
        echo HOME_URL;
        echo!empty($si->logo_path) ? $si->logo_path : 'files/logo.png'
        ?>" class="logo_image" alt="logo"/></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
      </button>
      <a href="<?php
      echo HOME_URL;
      !empty($si->site_name) ? $si->site_name : 'inoERP';
      ?>" class="navbar-brand">ino ERP</a>
     </div><!-- end navbar-header -->

     <div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
      <ul class="nav navbar-nav">
       <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">DEMO <div class="arrow-up"></div></a>
        <!-- end drop down menu -->
       </li><!-- end drop down -->
       <li><a href="#">About</a></li>
       <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Download <div class="arrow-up"></div></a>

       </li><!-- end drop down -->
       <!-- standard drop down -->
       <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Documentation <div class="arrow-up"></div></a>
        <!-- end dropdown-menu -->
       </li><!-- end standard drop down -->
       <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Forum <div class="arrow-up"></div></a>
        <!-- end dropdown-menu -->
       </li><!-- end standard drop down -->
       <!-- standard drop down -->
       <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">About <div class="arrow-up"></div></a>
        <!-- end drop down menu -->
       </li><!-- end drop down -->

      </ul><!-- end navbar-nav -->
     </div><!-- #navbar-collapse-1 -->			</nav><!-- end navbar yamm navbar-default -->
   </div><!-- end container -->
  </header><!-- end header-style-1 -->

  <div class="grey-wrapper jt-shadow">
   <div class="container">
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
     <iframe width="630px" height="320px" src="//www.youtube.com/embed/AS8idx2Cg_U?list=PLI9s_lIFpC099xADLymQcDCmrDhnkxcjM" frameborder="0" allowfullscreen></iframe>
     <!--  </div><!-- end accordion first -->
     <!--  </div> --><!-- end widget -->
    </div><!-- end col-lg-6 -->
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
     <div class="release_message">
      <span class="longHeading">inoERP is an open source web based enterprise management system.
       It’s built using open source technologies and has a wide range of features suitable for running 
       various kind of  businesses.
      </span>
      <span class="heading">inoERP 0.1.2 </span>
      InoERP version 0.1.2 is released and, now available for download. This version is fully functional and ready for production usage. 
      <br>Read the release details <a href="content.php?mode=2&content_id=197&content_type_id=47"> here </a>
      <br>Download the latest version from  <a href="https://github.com/inoerp/inoerp_v1"> GitHub  </a>, or 
      <a href="https://sourceforge.net/projects/inoerp/"> Source Forge  </a>
      <br><br>
      <form action="http://www.google.com" id="cse-search-box" target="_blank">
       <div>
        <input type="hidden" name="cx" value="partner-pub-3081028146173931:7997050045" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" name="q" size="40" />
        <input type="submit" name="sa" value="Search" />
       </div>
      </form>
      <script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>

     </div>
    </div><!-- end col-lg-6 -->
   </div><!-- end container -->
  </div>
  <div class="green-wrapper jt-shadow padding-top">
   <div class="container">
    <div id="slider_msg">
     <div id="slider1_container" style="position: relative; width: 900px; height: 400px; overflow: hidden;">

      <!-- Loading Screen -->
      <div u="loading" style="position: absolute; top: 0px; left: 0px;">
       <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
            background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
       </div>
       <div style="position: absolute; display: block; background: url(files/images/loading.gif) no-repeat center center;
            top: 0px; left: 0px;width: 100%;height:100%;">
       </div>
      </div>

      <!-- Slides Container -->
      <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 900px; height: 400px;
           overflow: hidden;">
       <div>
        <a u=image href="#"><img src="files/images/landscape/simple_ui1.png" /></a>
        <div u=caption t="*" class="captionOrange"  style="position:absolute; left:700px; top: 30px; width:300px; height:250px;"> 
         Simple & Consistent User Interface across all the document forms, reports and search forms. <br> 
        </div>
       </div>
       <div>
        <a u=image href="#"><img src="files/images/landscape/easy_navigation1.png" /></a>
        <div u=caption t="*" class="captionOrange"  style="position:absolute; left:700px; top: 30px; width:300px; height:300px;"> 
         Easy Navigation - Laptop, Tablet & Mobile. <br> Easy data entry through barcode enabled forms and labels.
        </div>
       </div>
       <div>
        <a u=image href="#"><img src="files/images/landscape/dynamic_search1.png" /></a>
        <div u=caption t="*" class="captionOrange"  style="position:absolute; left:700px; top: 30px; width:300px; height:300px;"> 
         Powerful & Dynamic Searching Capabilities. <br>Can be customized on the fly to suit various business requirements.
        </div>
       </div>
       <div>
        <a u=image href="#"><img src="files/images/landscape/graphical_reports.gif" /></a>
        <div u=caption t="*" class="captionOrange"  style="position:absolute; left:700px; top: 30px; width:300px; height:330px;"> 
         Text & Visual Reporting. Visual reports are dynamically generated SVG images. <br>Text reports can be downloaded in any format, such as 
         Excel, Pdf, Word Doc & etc.
        </div>
       </div>
      </div>

      <!-- Bullet Navigator Skin Begin -->
      <!-- jssor slider bullet navigator skin 01 -->

      <!-- bullet navigator container -->
      <div u="navigator" class="jssorb01" style="position: absolute; bottom: 16px; right: 10px;">
       <!-- bullet navigator item prototype -->
       <div u="prototype" style="POSITION: absolute; WIDTH: 12px; HEIGHT: 12px;"></div>
      </div>
      <!-- Bullet Navigator Skin End -->

      <!-- Arrow Navigator Skin Begin -->

      <!-- Arrow Left -->
      <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 123px; left: 8px;">
      </span>
      <!-- Arrow Right -->
      <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 123px; right: 8px">
      </span>

     </div>
    </div>

   </div>
  </div>

  <!-- end white-wrapper -->

  <div class="white-wrapper">
   <div class="container">
    <div style="text-align:center; text-transform:uppercase;"> <h1>Special Features</h1></div>
    <div class="services_vertical">
     <div class="col-lg-4 first">
      <div class="service_vertical_box">
       <div class="service-icon">
        <i class="fa fa-lightbulb-o fa-4x"></i>
       </div>
       <h3>Dynamic Pull Based System</h3>
       <p>
        Dynamic pull system is an advanced version of pull system which encompasses the best feature of traditional pull system & MRP. </p>
       <a href="http://inoideas.org/content.php?mode=2&content_id=197&content_type_id=47" class="readmore">Read More...</a>
      </div><!-- end service_vertical_box -->
     </div><!-- end col-lg-4 -->
     <div class="col-lg-4">
      <div class="service_vertical_box">
       <div class="service-icon">
        <i class="fa fa-gear fa-4x"></i>
       </div>
       <h3>Custom Report Builder</h3>
       <p>The product comes with an inbuilt drag & drop query builder, which can be used to create any kind of custom reports without coding.. </p>
       <a href="#" class="readmore">Read More...</a>
      </div><!-- end service_vertical_box -->
     </div><!-- end col-lg-4 -->
     <div class="col-lg-4 last">
      <div class="service_vertical_box">
       <div class="service-icon">
        <i class="fa fa-tablet fa-4x"></i>
       </div>
       <h3>Multi-Device Usage</h3>
       <p>inoERP can be used with any modern browser through desktop, laptop & mobile devices. </p>
       <a href="#" class="readmore">Read More...</a>
      </div><!-- end service_vertical_box -->
     </div><!-- end col-lg-4 -->
     <div class="col-lg-4 first">
      <div class="service_vertical_box">
       <div class="service-icon">
        <i class="fa fa-folder-o fa-4x"></i>
       </div>
       <h3>End to End System</h3>
       <p>Can be used as a single system for end to end supply chain, fiance, document approval, HR & MES system. </p>
       <a href="#" class="readmore">Read More...</a>
      </div><!-- end service_vertical_box -->
     </div><!-- end col-lg-4 -->
     <div class="col-lg-4">
      <div class="service_vertical_box">
       <div class="service-icon">
        <i class="fa fa-google-plus fa-4x"></i>
       </div>
       <h3>in-Built CMS & Collaboration </h3>
       <p>The in-built content management system seamlessly integrate with the ERP system. Can be used for employee, supplier & customer collaboration </p>
       <a href="#" class="readmore">Read More...</a>
      </div><!-- end service_vertical_box -->
     </div><!-- end col-lg-4 -->
     <div class="col-lg-4 last">
      <div class="service_vertical_box">
       <div class="service-icon">
        <i class="fa fa-bars fa-4x"></i>
       </div>
       <h3>Flexible Architecture</h3>
       <p>All forms, reports & documents are flexible enough to add any kind of new element as per the business requirement. </p>
       <a href="#" class="readmore">Read More...</a>
      </div><!-- end service_vertical_box -->
     </div><!-- end col-lg-4 -->
     <div class="clearfix"></div>
    </div><!-- end services_vertical -->
    <div class="clearfix"></div>

   </div><!-- end container -->
  </div><!-- end transparent-bg -->

  <!-- end grey-wrapper -->
  <div class="grey-wrapper jt-shadow padding-top content_summary">
   <div class="make-center wow fadeInUp animated" style="visibility: visible;">
    <div class="container">
     <?php
     $content = new content();
     $subject_no_of_char = 50;
     $summary_no_of_char = 300;
     $fp_contnts = $content->frontPage_contents(6, 500);
     $cont_count = 1;
     foreach ($fp_contnts as $contnent) {
      if ($cont_count == 1 || $cont_count == 4) {
       $count_class_val = ' first ';
      } else if ($cont_count == 2 || $cont_count == 5) {
       $count_class_val = ' last ';
      } else {
       $count_class_val = '';
      }
      echo '<div class="col-lg-4' . $count_class_val . ' ">
              <div class="panel panel-success">
                <div class="panel-heading">';
      echo "<h3 class='panel-title'>";
      echo '<a href="' . HOME_URL . 'content.php?mode=2&'
      . 'content_id=' . $contnent->content_id . '&content_type_id=' . $contnent->content_type_id . '">';
      echo substr($contnent->subject, 0, $subject_no_of_char) . "</a></h3>";
      echo '</div>';
      echo "<div class='panel-body'>" . substr($contnent->content_summary, 0, $summary_no_of_char) . "</div>";
      echo '</div></div>';
      $cont_count++;
     }
     ?>

    </div>
   </div>
  </div>

  <div class="make-bg-full">
   <div class="calloutbox-full-mini nocontainer">
    <div class="long-twitter">
     <p class="lead"><i class="fa fa-star"></i>
      All inoERP code is Copyright by the Original Authors as mentioned on COPYRIGHT.txt file.
      <br>inoERP is a open Source software; you can redistribute it and/or modify
      it under the terms of the Mozilla Public License Version 2.0 </p>
    </div>
   </div><!-- end calloutbox -->
  </div><!-- make bg -->

  <div id="footer_top"></div>



  <div id="copyrights">
   <div class="container">
    <div class="col-lg-5 col-md-6 col-sm-12">
     <div class="copyright-text">
      <p>Copyright © 2014 inoERP</p>
     </div><!-- end copyright-text -->
    </div><!-- end widget -->
    <div class="col-lg-7 col-md-6 col-sm-12 clearfix">
     <div class="footer-menu">
      <ul class="menu">
       <li class="active"><a href="#">Demo</a></li>
       <li><a href="#">Download</a></li>
       <li><a href="#">Documentation</a></li>
       <li><a href="#">Forum</a></li>
       <li><a href="#">Blog</a></li>

      </ul>
     </div>
    </div><!-- end large-7 --> 
   </div><!-- end container -->
  </div><!-- end copyrights -->

  <div class="dmtop">Scroll to Top</div>

  <!-- Main Scripts-->
  <script>
   jQuery(document).ready(function ($) {
    var _SlideshowTransitions = [
     //["Rotate Overlap"]
     {$Duration: 1200, $Zoom: 11, $Rotate: -1, $Easing: {$Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $Opacity: 2, $Round: {$Rotate: 0.5}, $Brother: {$Duration: 1200, $Zoom: 1, $Rotate: 1, $Easing: $JssorEasing$.$EaseSwing, $Opacity: 2, $Round: {$Rotate: 0.5}, $Shift: 90}}
     //["Switch"]
     , {$Duration: 1400, $Zoom: 1.5, $FlyDirection: 1, $Easing: {$Left: $JssorEasing$.$EaseInWave, $Zoom: $JssorEasing$.$EaseInSine}, $ScaleHorizontal: 0.25, $Opacity: 2, $ZIndex: -10, $Brother: {$Duration: 1400, $Zoom: 1.5, $FlyDirection: 2, $Easing: {$Left: $JssorEasing$.$EaseInWave, $Zoom: $JssorEasing$.$EaseInSine}, $ScaleHorizontal: 0.25, $Opacity: 2, $ZIndex: -10}}
     //["Rotate Relay"]
     , {$Duration: 1200, $Zoom: 11, $Rotate: 1, $Easing: {$Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $Opacity: 2, $Round: {$Rotate: 1}, $ZIndex: -10, $Brother: {$Duration: 1200, $Zoom: 11, $Rotate: -1, $Easing: {$Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $Opacity: 2, $Round: {$Rotate: 1}, $ZIndex: -10, $Shift: 600}}
     //["Doors"]
     , {$Duration: 1500, $Cols: 2, $FlyDirection: 1, $ChessMode: {$Column: 3}, $Easing: {$Left: $JssorEasing$.$EaseInOutCubic}, $ScaleHorizontal: 0.5, $Opacity: 2, $Brother: {$Duration: 1500, $Opacity: 2}}
     //["Rotate in+ out-"]
     , {$Duration: 1500, $Zoom: 1, $Rotate: 0.1, $During: {$Left: [0.6, 0.4], $Top: [0.6, 0.4], $Rotate: [0.6, 0.4], $Zoom: [0.6, 0.4]}, $FlyDirection: 6, $Easing: {$Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $ScaleHorizontal: 0.3, $ScaleVertical: 0.5, $Opacity: 2, $Brother: {$Duration: 1000, $Zoom: 11, $Rotate: -0.5, $Easing: {$Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $Opacity: 2, $Shift: 200}}
     //["Fly Twins"]
     , {$Duration: 1500, $During: {$Left: [0.6, 0.4]}, $FlyDirection: 1, $Easing: {$Left: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear}, $ScaleHorizontal: 0.3, $Opacity: 2, $Outside: true, $Brother: {$Duration: 1000, $FlyDirection: 2, $Easing: {$Left: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear}, $ScaleHorizontal: 0.3, $Opacity: 2}}
     //["Rotate in- out+"]
     , {$Duration: 1500, $Zoom: 11, $Rotate: 0.5, $During: {$Left: [0.4, 0.6], $Top: [0.4, 0.6], $Rotate: [0.4, 0.6], $Zoom: [0.4, 0.6]}, $Easing: {$Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $ScaleHorizontal: 0.3, $ScaleVertical: 0.5, $Opacity: 2, $Brother: {$Duration: 1000, $Zoom: 1, $Rotate: -0.5, $Easing: {$Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $Opacity: 2, $Shift: 200}}
     //["Rotate Axis up overlap"]
     , {$Duration: 1200, $Rotate: -0.1, $FlyDirection: 5, $Easing: {$Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $ScaleHorizontal: 0.25, $ScaleVertical: 0.5, $Opacity: 2, $Brother: {$Duration: 1200, $Rotate: 0.1, $FlyDirection: 10, $Easing: {$Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $ScaleHorizontal: 0.1, $ScaleVertical: 0.7, $Opacity: 2}}
     //["Chess Replace TB"]
     , {$Duration: 1600, $Rows: 2, $FlyDirection: 1, $ChessMode: {$Row: 3}, $Easing: {$Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $Brother: {$Duration: 1600, $Rows: 2, $FlyDirection: 2, $ChessMode: {$Row: 3}, $Easing: {$Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2}}
     //["Chess Replace LR"]
     , {$Duration: 1600, $Cols: 2, $FlyDirection: 8, $ChessMode: {$Column: 12}, $Easing: {$Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $Brother: {$Duration: 1600, $Cols: 2, $FlyDirection: 4, $ChessMode: {$Column: 12}, $Easing: {$Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2}}
     //["Shift TB"]
     , {$Duration: 1200, $FlyDirection: 4, $Easing: {$Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $Brother: {$Duration: 1200, $FlyDirection: 8, $Easing: {$Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2}}
     //["Shift LR"]
     , {$Duration: 1200, $FlyDirection: 1, $Easing: {$Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $Brother: {$Duration: 1200, $FlyDirection: 2, $Easing: {$Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2}}
     //["Return TB"]
     , {$Duration: 1200, $FlyDirection: 8, $Easing: {$Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $ZIndex: -10, $Brother: {$Duration: 1200, $FlyDirection: 8, $Easing: {$Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $ZIndex: -10, $Shift: -100}}
     //["Return LR"]
     , {$Duration: 1200, $Delay: 40, $Cols: 6, $FlyDirection: 1, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: {$Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $ZIndex: -10, $Brother: {$Duration: 1200, $Delay: 40, $Cols: 6, $FlyDirection: 1, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: {$Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $ZIndex: -10, $Shift: -100}}
     //["Rotate Axis down"]
     , {$Duration: 1500, $Rotate: 0.1, $During: {$Left: [0.6, 0.4], $Top: [0.6, 0.4], $Rotate: [0.6, 0.4]}, $FlyDirection: 10, $Easing: {$Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $ScaleHorizontal: 0.1, $ScaleVertical: 0.7, $Opacity: 2, $Brother: {$Duration: 1000, $Rotate: -0.1, $FlyDirection: 5, $Easing: {$Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $ScaleHorizontal: 0.2, $ScaleVertical: 0.5, $Opacity: 2}}
     //["Extrude Replace"]
     , {$Duration: 1600, $Delay: 40, $Cols: 12, $During: {$Left: [0.4, 0.6]}, $SlideOut: true, $FlyDirection: 2, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: {$Left: $JssorEasing$.$EaseInOutExpo, $Opacity: $JssorEasing$.$EaseInOutQuad}, $ScaleHorizontal: 0.2, $Opacity: 2, $Outside: true, $Round: {$Top: 0.5}, $Brother: {$Duration: 1000, $Delay: 40, $Cols: 12, $FlyDirection: 1, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 1028, $Easing: {$Left: $JssorEasing$.$EaseInOutExpo, $Opacity: $JssorEasing$.$EaseInOutQuad}, $ScaleHorizontal: 0.2, $Opacity: 2, $Round: {$Top: 0.5}}}
    ];

    var _CaptionTransitions = [
     //CLIP|LR
     {$Duration: 900, $Clip: 3, $Easing: $JssorEasing$.$EaseInOutCubic},
     //CLIP|TB
     {$Duration: 900, $Clip: 12, $Easing: $JssorEasing$.$EaseInOutCubic},
     //DDGDANCE|LB
     {$Duration: 1800, $Zoom: 1, $FlyDirection: 9, $Easing: {$Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Zoom: $JssorEasing$.$EaseOutQuad}, $ScaleHorizontal: 0.3, $ScaleVertical: 0.3, $Opacity: 2, $During: {$Left: [0, 0.8], $Top: [0, 0.8]}, $Round: {$Left: 0.8, $Top: 2.5}},
     //DDGDANCE|RB
     {$Duration: 1800, $Zoom: 1, $FlyDirection: 10, $Easing: {$Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Zoom: $JssorEasing$.$EaseOutQuad}, $ScaleHorizontal: 0.3, $ScaleVertical: 0.3, $Opacity: 2, $During: {$Left: [0, 0.8], $Top: [0, 0.8]}, $Round: {$Left: 0.8, $Top: 2.5}},
     //TORTUOUS|HL
     {$Duration: 1500, $Zoom: 1, $FlyDirection: 1, $Easing: {$Left: $JssorEasing$.$EaseOutWave, $Zoom: $JssorEasing$.$EaseOutCubic}, $ScaleHorizontal: 0.2, $Opacity: 2, $During: {$Left: [0, 0.7]}, $Round: {$Left: 1.3}},
     //TORTUOUS|VB
     {$Duration: 1500, $Zoom: 1, $FlyDirection: 8, $Easing: {$Top: $JssorEasing$.$EaseOutWave, $Zoom: $JssorEasing$.$EaseOutCubic}, $ScaleVertical: 0.2, $Opacity: 2, $During: {$Top: [0, 0.7]}, $Round: {$Top: 1.3}},
     //ZMF|10
     {$Duration: 600, $Zoom: 11, $Easing: {$Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2},
     //ZML|R
     {$Duration: 600, $Zoom: 11, $FlyDirection: 2, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.6, $Opacity: 2},
     //ZML|B
     {$Duration: 600, $Zoom: 11, $FlyDirection: 8, $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleVertical: 0.6, $Opacity: 2},
     //ZMS|B
     {$Duration: 700, $Zoom: 1, $FlyDirection: 8, $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleVertical: 0.6, $Opacity: 2},
     //ZM*JDN|LB
     {$Duration: 1200, $Zoom: 11, $FlyDirection: 9, $Easing: {$Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: {$Top: [0, 0.5]}},
     //ZM*JUP|LB
     {$Duration: 1200, $Zoom: 11, $FlyDirection: 9, $Easing: {$Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: {$Top: [0, 0.5]}},
     //ZM*JUP|RB
     {$Duration: 1200, $Zoom: 11, $FlyDirection: 10, $Easing: {$Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: {$Top: [0, 0.5]}},
     //ZM*WVR|LT
     {$Duration: 1200, $Zoom: 11, $FlyDirection: 5, $Easing: {$Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave}, $ScaleHorizontal: 0.5, $ScaleVertical: 0.3, $Opacity: 2, $Round: {$Rotate: 0.8}},
     //ZM*WVR|RT
     {$Duration: 1200, $Zoom: 11, $FlyDirection: 6, $Easing: {$Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave}, $ScaleHorizontal: 0.5, $ScaleVertical: 0.3, $Opacity: 2, $Round: {$Rotate: 0.8}},
     //ZM*WVR|TL
     {$Duration: 1200, $Zoom: 11, $FlyDirection: 5, $Easing: {$Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseLinear}, $ScaleHorizontal: 0.3, $ScaleVertical: 0.5, $Opacity: 2, $Round: {$Rotate: 0.8}},
     //ZM*WVR|BL
     {$Duration: 1200, $Zoom: 11, $FlyDirection: 9, $Easing: {$Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseLinear}, $ScaleHorizontal: 0.3, $ScaleVertical: 0.5, $Opacity: 2, $Round: {$Rotate: 0.8}},
     //RTT|10
     {$Duration: 700, $Zoom: 11, $Rotate: 1, $Easing: {$Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo}, $Opacity: 2, $Round: {$Rotate: 0.8}},
     //RTTL|R
     {$Duration: 700, $Zoom: 11, $Rotate: 1, $FlyDirection: 2, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.6, $Opacity: 2, $Round: {$Rotate: 0.8}},
     //RTTL|B
     {$Duration: 700, $Zoom: 11, $Rotate: 1, $FlyDirection: 8, $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic}, $ScaleVertical: 0.6, $Opacity: 2, $Round: {$Rotate: 0.8}},
     //RTTS|R
     {$Duration: 700, $Zoom: 1, $Rotate: 1, $FlyDirection: 2, $Easing: {$Left: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad}, $ScaleHorizontal: 0.6, $Opacity: 2, $Round: {$Rotate: 1.2}},
     //RTTS|B
     {$Duration: 700, $Zoom: 1, $Rotate: 1, $FlyDirection: 8, $Easing: {$Top: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad}, $ScaleVertical: 0.6, $Opacity: 2, $Round: {$Rotate: 1.2}},
     //RTT*JDN|RT
     {$Duration: 1000, $Zoom: 11, $Rotate: .2, $FlyDirection: 6, $Easing: {$Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: {$Top: [0, 0.5]}},
     //RTT*JDN|LB
     {$Duration: 1000, $Zoom: 11, $Rotate: .2, $FlyDirection: 9, $Easing: {$Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: {$Top: [0, 0.5]}},
     //RTT*JUP|RB
     {$Duration: 1000, $Zoom: 11, $Rotate: .2, $FlyDirection: 10, $Easing: {$Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: {$Top: [0, 0.5]}},
     {$Duration: 1200, $Zoom: 11, $Rotate: true, $FlyDirection: 6, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseLinear, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.5, $ScaleVertical: 0.8, $Opacity: 2, $During: {$Left: [0, 0.5]}, $Round: {$Rotate: 0.5}},
     //RTT*JUP|BR
     {$Duration: 1000, $Zoom: 11, $Rotate: .2, $FlyDirection: 10, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseLinear, $Zoom: $JssorEasing$.$EaseInCubic}, $ScaleHorizontal: 0.5, $ScaleVertical: 0.8, $Opacity: 2, $During: {$Left: [0, 0.5]}},
     //R|IB
     {$Duration: 900, $FlyDirection: 2, $Easing: {$Left: $JssorEasing$.$EaseInOutBack}, $ScaleHorizontal: 0.6, $Opacity: 2},
     //B|IB
     {$Duration: 900, $FlyDirection: 8, $Easing: {$Top: $JssorEasing$.$EaseInOutBack}, $ScaleVertical: 0.6, $Opacity: 2},
    ];

    var options = {
     $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
     $AutoPlaySteps: 1, //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
     $AutoPlayInterval: 4000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
     $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

     $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
     $SlideDuration: 500, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
     $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
     //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
     //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
     $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
     $DisplayPieces: 1, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
     $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
     $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
     $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
     $DragOrientation: 3, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

     $SlideshowOptions: {//[Optional] Options to specify and enable slideshow or not
      $Class: $JssorSlideshowRunner$, //[Required] Class to create instance of slideshow
      $Transitions: _SlideshowTransitions, //[Required] An array of slideshow transitions to play slideshow
      $TransitionsOrder: 1, //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
      $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
     },
     $CaptionSliderOptions: {//[Optional] Options which specifies how to animate caption
      $Class: $JssorCaptionSlider$, //[Required] Class to create instance to animate caption
      $CaptionTransitions: _CaptionTransitions, //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
      $PlayInMode: 1, //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
      $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
     },
     $BulletNavigatorOptions: {//[Optional] Options to specify and enable navigator or not
      $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
      $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
      $AutoCenter: 0, //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
      $Steps: 1, //[Optional] Steps to go for each navigation request, default value is 1
      $Lanes: 1, //[Optional] Specify lanes to arrange items, default value is 1
      $SpacingX: 10, //[Optional] Horizontal space between each item in pixel, default value is 0
      $SpacingY: 10, //[Optional] Vertical space between each item in pixel, default value is 0
      $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
     },
     $ArrowNavigatorOptions: {
      $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
      $ChanceToShow: 2                                //[Required] 0 Never, 1 Mouse Over, 2 Always
     }
    };

    var jssor_slider1 = new $JssorSlider$("slider1_container", options);
    //responsive code begin
    //you can remove responsive code if you don't want the slider scales while window resizes
    function ScaleSlider() {
     var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
     if (parentWidth)
      jssor_slider1.$SetScaleWidth(Math.min(parentWidth, 1020));
     else
      window.setTimeout(ScaleSlider, 30);
    }

    ScaleSlider();

    if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
     $(window).bind('resize', ScaleSlider);
    }


    //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
    //    $(window).bind("orientationchange", ScaleSlider);
    //}
    //responsive code end
   });
  </script>
 </body>
</html>