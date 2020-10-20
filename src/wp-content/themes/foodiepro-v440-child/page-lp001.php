<!--
Template Name: ランディングページ
-->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>すなっくゆう</title>
  <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/lp001.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
  <!-- ヘッダー-->

  <header>
    <div class="header_wrap">
      <div class="header_logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/yu003_03.png" srcset="" alt="ふくろう" /></div>
      <div class="header_logo_sp"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/yu002sp-2_03.png" srcset="" alt="ふくろう" /></div>
      <h1 class="title">
        <span class="strong" style="display: none;">すなっくゆう</span>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/yu002_03.png" alt="" />
      </h1>
      <h2 class="shop_message">あなたの隠れ家として<br>心よりお待ちしております。</h2>
    </div>
  </header>
  <!-- ナビゲーション -->
  <nav class="header_nav">
    <ul class="header_nav_list">
      <li class="nav_list_item">
        <a href="#information" class="nav_list_item__href">
          <span class="nav_list_item__title">店舗情報</span>
          <br>
          information
        </a>
      </li>
      <li class="nav_list_item">
        <a href="#greeting" class="nav_list_item__href">
          <span class="nav_list_item__title">ご挨拶</span>
          <br>
          greeting
        </a>
      </li>
      <li class="nav_list_item">
        <a href="#system" class="nav_list_item__href">
          <span class="nav_list_item__title">お料金</span>
          <br>
          system
        </a>
      </li>
      <li class="nav_list_item">
        <a href="#event" class="nav_list_item__href">
          <span class="nav_list_item__title">イベント</span>
          <br>
          event
        </a>
      </li>
      <li class="nav_list_item">
        <a href="#access" class="nav_list_item__href">
          <span class="nav_list_item__title">アクセス</span>
          <br>
          access
        </a>
      </li>
      <li class="nav_list_item">
        <a href="#notice" class="nav_list_item__href">
          <span class="nav_list_item__title">お知らせ</span>
          <br>
          notice
        </a>
      </li>
      <li class="nav_telephone">
        <a class="nav_list_item__href" href="tel:03-6803-2207">
          <span class="nav_list_item__title">電話予約</span>
          <br>03-6803-2207
        </a>
      </li>
    </ul>
  </nav>
  <!-- ハンバーガメニュー -->
  <div class="hamburger" id="js-hamburger">
    <span class="hamburger__line hamburger__line--1"></span>
    <span class="hamburger__line hamburger__line--2"></span>
    <span class="hamburger__line hamburger__line--3"></span>
  </div>
  <div class="black-bg" id="js-black-bg"></div>
  <!-- トップへ戻るボタン、電話ボタン -->
  <div class="sp_button">
    <a href="tel:03-6803-2207" class="telephone_btn sp_btn">電話</a>
    <a href="#" class="top_btn sp_btn">TOP</a>
  </div>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
  <?php endwhile;
  endif; ?>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/lp001.js"></script>
</body>

</html>
