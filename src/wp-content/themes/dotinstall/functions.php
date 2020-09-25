<?php

add_theme_support('menus');

register_sidebar(
  array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

add_theme_support('post-thumbnails');

function shotecode_tw() {
  return '<a href="https://twiter.com/taguchi">@testを</a>をフォローしてね！';
}

add_shortcode('tw', 'shotecode_tw');


// ajax処理

// 今日の登録数の取得
function getTodayCount() {
  global $wpdb;
  $request = $_GET['today'];
  $now = date("Y/m/d");
  // $sql = $wpdb->prepare('select * from $wpdb->wp_db_counts where wp_db_counts.regist_day = 2020-07-06');
  $table_name = $wpdb->prefix . "db_count";
  // $results = $wpdb->get_results(
  //   'select * from wp_db_count where regist_day = 2020-07-06'
  // );
  $results = $wpdb->get_var("SELECT COUNT(*) FROM wp_db_count WHERE regist_day = CURRENT_DATE");
  $countResult = $wpdb->num_rows;
  // header('Content-Type: application/json; charset=UTF-8');
  // var_dump($countResult);
  // die();
  echo $results;
  // echo "test";
  die();
}
add_action('wp_ajax_get_today_count', 'getTodayCount');
add_action('wp_ajax_nopriv_get_today_count', 'getTodayCount');

// カウントの登録
function setCount() {
  global $wpdb;
  $request = $_POST['today'];
  $nowDate = date("Y/m/d");
  $nowTime = date("Y/m/d H:i:s");
  $table_name = $wpdb->prefix ."db_count";
  $results = $wpdb->insert(
    $table_name,
    array(
      'regist_day' => $request,
      'created_at' => $nowTime,
    )
  );
  if ($results == false) {
    # code...
    echo "登録に失敗しました";
  } else {
    echo "登録に成功しました";
  }
  die();
}
add_action('wp_ajax_set_count', 'setCount');
add_action('wp_ajax_nopriv_set_count', 'setCount');
