<?php

require_wp_db();

add_theme_support('menus');

function add_scripts() {
	wp_enqueue_script( 'smart-script', get_stylesheet_directory_uri() . 'assets/main.js', array( 'jquery' ), '20190105', true );

}
add_action('wp_print_scripts', 'add_scripts');

/**
 * 管理画面にメニュー追加
 */
add_action('init','create_post_type');
function create_post_type() {
  $storeType = [
    'title',
    'editor',
    'thumbnail',
    'custom-fields',
    'excerpt',
    'trackbacks',
    'comments',
    'revisions',
    'page-attributes',
  ];
  $productType = [// プロダクトのサポートタイプ
    'title',
    'editor',
    'thumbnail',
    'custom-fields',
    'excerpt',
    'trackbacks',
    'comments',
    'revisions',
    'page-attributes',
  ];
  register_post_type('store',
    array(
      'labels' => array(
        'name' => __('ストア'),
        'singular_name' => __('ストア'),
        'all_items' => __('ストア一覧')
      ),
      'public' => true,
      'menu-icon' => 'dashicons-admin-customizer',//アイコン画像
      'has_archive' => true,
      'show_in_rest' => false,
      'menu-position' => 3,
      'supports' => $storeType
    )
  );
  register_post_type('product',
    array(
      'labels' => array(
        'name' => __('製品'),
        'singular_name' => __('製品詳細'),
        'all_items' => __('製品一覧')
      ),
      'public' => true,
      'has_archive' => true,
      'menu-position' => 4,
      'show_in_rest' => false,
      'supports' => $productType
    )
  );
}

/**
 * カスタムタクソノミー追加
 */
function add_taxnomies() {
  // 製品カテゴリー
  register_taxonomy(
    'product_category',
    array('product'),
    array(
      'label' => '製品カテゴリー',// 表示カテゴリー
      'public' => true,
      'show_in_menu' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'hierarchical' => true, // trueはカテゴリ falseはタグ
      'rewrite' => array(
        'slug' => 'product_category', 'with_front' => true,
      ),
      'show_in_rest' => true,
      'rest_base' => "",
    ),
  );

  // ストアエリア
  register_taxonomy(
    'store_area',
    array('store'),
    array(
      'label' => '店舗エリア',// 表示カテゴリー
      'public' => true,
      'show_in_menu' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'hierarchical' => true, // trueはカテゴリ falseはタグ
      'rewrite' => array(
        'slug' => 'store_area',
        'with_front' => true,
      ),
      'show_in_rest' => true,
      'rest_base' => "",
    ),
  );
}

add_action('init', 'add_taxnomies', 0);

/**
   * 管理画面にメニューを追加
 *
 * 第1引数：メニューが選択されたとき、ページのタイトルタグに表示されるテキスト
 * 第2引数：メニューとして表示されるテキスト
 * 第3引数：メニューを表示するために必要な権限
 * 第4引数：メニューのスラッグ名
 * 第5引数：（任意）メニューページを表示する際に実行される関数
 * 第6引数：（任意）メニューのアイコンを示す URL
 * 第7引数：（任意）メニューが表示される位置
 */
function add_origin_menu_at_admin_view() {
  // メニューに製品を追加
  add_menu_page('製品追加','製品追加','edit_dashboard', 'edit.php?post_type=product','', 'dashicons-admin-post', 6
  );

  // メニューにストアを追加
  add_menu_page('ストア追加','ストア追加','edit_dashboard', 'edit.php?post_type=store','', 'dashicons-admin-post', 7
  );
}

// add_action('admin_menu', 'add_origin_menu_at_admin_view');
function my_acf_google_map_api($api) {
  $api['key'] = 'AIzaSyARNFDzNvkqznYN22YhmQVBwT-w3tgzDQ4';
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function my_comment_form_fields( $fields){
  unset( $fields['email']);   // 「メールアドレス」を非表示にする場合
  unset( $fields['url']);     // 「ウェブサイト」を非表示にする場合
  return $fields;
}
add_filter( 'comment_form_default_fields', 'my_comment_form_fields');

/**
 * ajaxURLの追加
 */
function add_my_ajaxurl() {
  ?>
      <script>
          var ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
      </script>
  <?php
  }
  add_action( 'wp_head', 'add_my_ajaxurl', 1 );

/**
 * レビュー一覧取得
 * @param $post_id = int
 */
function get_reviews($post_id) {
  global $wpdb;
  $results = $wpdb->get_results("SELECT * FROM wp_reviews WHERE review_post_id = $post_id AND review_status = 2 ORDER BY review_id");

  return $results;
}
add_action('wp_ajax_get_reviews','get_reviews');
add_action('wp_ajax_nopriv_get_reviews','get_reviews');

function get_review() {
  global $wpdb;
  $post_id = $_GET['review_id'];
  $results = $wpdb->get_results("SELECT * FROM wp_reviews WHERE review_id = $post_id");
  echo $results;
  die();
}
add_action('wp_ajax_get_review','get_review');
add_action('wp_ajax_nopriv_get_review','get_review');


/**
 * レビュー投稿処理
 */
function regist_review() {
  global $wpdb;
  $post_id = $_POST['post_id'];
  $nickname = $_POST['nickname'];
  $rate_value = $_POST['rate_value'];
  $review_comment = $_POST['review_comment'];
  $review_status = 0;
  $now_time = date("Y/m/d H:i:s");
  $table = $wpdb->prefix . 'reviews';
  // echo $nickname;
  $results = $wpdb->insert(
    $table,
    array(
      'review_post_id' => $post_id,
      'review_author' => urlencode($nickname),
      'review_rating' => $rate_value,
      'review_comment' => urlencode($review_comment),
      'review_status' => $review_status,
      'create_at' => $now_time,
      'update_at' => $now_time
    )
  );
  if ($results == false) {
    echo "登録に失敗しました。";
    echo $wpdb->print_error();
    die();
  }
  echo "投稿成功しました。";
  die();
}
add_action('wp_ajax_regist_review','regist_review');
add_action('wp_ajax_nopriv_regist_review','regist_review');

/**
 * レビュー平均取得
 */
function get_avarage_rate($post_id) {
  global $wpdb;
  $avarage_rate = $wpdb->get_var("SELECT AVG(review_rating) FROM wp_reviews WHERE review_post_id = $post_id AND review_status = 2");
  return $avarage_rate;
}

/**
 * 合計レビュー数取得
 */
function get_count_reviews($post_id) {
  global $wpdb;
  $count_reviews = $wpdb->get_var("SELECT COUNT(review_id) FROM wp_reviews WHERE review_post_id = $post_id AND review_status = 2");
  return $count_reviews;
}

/**
 * レビュー割合取得
 */
function get_percentage_reviews($post_id, $num) {
  global $wpdb;
  $percentage_review = $wpdb->get_var("SELECT COUNT(review_id) FROM wp_reviews WHERE review_post_id = $post_id AND review_rating = $num AND review_status = 2");
  return $percentage_review;
}


/**
 * レビューテーブル作成
 */
function create_review_table() {
  global $wpdb;
  $result = $wpdb->query("CREATE TABLE IF NOT EXISTS wp_reviews (
    review_id int AUTO_INCREMENT NOT NULL,
    review_post_id int NOT NULL,
    review_author VARCHAR(255) NOT NULL,
    review_rating int NOT NULL,
    review_status int NOT NULL,
    review_comment text,
    create_at DATETIME,
    update_at DATETIME,
    primary key(review_id))
  ");
  if ($result == false) {
    echo "テーブル作成に失敗しました。";
    exit;
  }
  echo "テーブル作成に成功しました。";
}
// create_review_table();
// add_filter( 'smart-cf-is_use_default_when_not_saved', '__return_false' );