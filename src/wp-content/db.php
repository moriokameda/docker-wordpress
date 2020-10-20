<?php
/**
 * ファイルの説明
 *
 */
require_once(ABSPATH . WPINC . '/wp-db.php');

class my_wp_db extends wpdb
{
    // データベースの定義変更
    var $tables = array(
        'posts',
        'comments',
        'links',
        'options',
        'postmeta',
        'terms',
        'term_taxonomy',
        'term_relationships',
        'termmeta',
        'commentmeta',
        'db_count',
        'reviews',
    );
}

if (!isset($wpdb)) {
    # code...
    $wpdb = new my_wp_db(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
}
