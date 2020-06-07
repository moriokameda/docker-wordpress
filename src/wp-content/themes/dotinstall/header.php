<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>
  <!-- header -->
  <div id="header" class="container">
    <h1><a href="<?php home_url('/') ?>"><?php bloginfo('name'); ?></a></h1>
    <?php wp_nav_menu();?>
  </div>
  <!-- header -->
<?php wp_head(); ?>
