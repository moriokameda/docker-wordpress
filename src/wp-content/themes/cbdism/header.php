<!DOCTYPE html>
<html lang="ja">
<head>
  <?php wp_head();?>
  <meta charset="UTF-8">
  <title><?php wp_title('|', true, 'right'); bloginfo('name');?></title>
  <link rel="shortcut icon" href="https://cbdism.info/wp-content/uploads/2020/08/favicon.png">
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="Keywords" content="<?php bloginfo('keywords');?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/reset.css">
  <!-- Swiper.js -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/swiper/css/swiper.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/bootstrap/css/bootstrap.css">
  <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/style.css"> -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/bootstrap/js/bootstrap.js"></script>
</head>
<body>
  <div class="top_header">
    <header class="header" id="header">
      <h1 class='logo'><a href="<?php echo home_url('/');?>">CBDism</a></h1>
      <a class="accordion_menu_btn sl-btn text-primary search_logo not-scroll" data-toggle="collapse" href="#search_menu" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="cross fas fa-times search_logo_setting d-none"></i><i class="sl fas fa-search search_logo_setting "></i>
      </a>
    </header>
    <?php get_search_form();?>
  </div>
  <div id="page_top" class="">
    <!-- ページの一番上を認識させるためのタブ -->
  </div>
