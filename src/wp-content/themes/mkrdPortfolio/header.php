<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- header -->
  <div class="header">
    <header>
      <div class="title">
        <h1><a href="<?php home_url('/'); ?>"><?php wp_title('|', true, 'right'); bloginfo('name');?></a></h1>
        <h2>Web Enginner</h2>
      </div>
      <?php  wp_nav_menu();?>
      <div class="header_video">
        <video muted autoplay loop preload="auto" playsinline>
          <source src="video/cofee_drink.mp4">
        </video>
      </div>
    </header>
  </div>
<?php wp_head();?>
