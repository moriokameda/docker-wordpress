<?php

/**
 * @package reviews_approve
 * @version 1.0
 */

/*
Plugin Name: reviews_approve
Plugin URI: http://www.○○○.com/reviews_approve
Description: 投稿してきたレビュー一覧と承認待ちのものを表示する。
Author: 亀田森生
Version: 1.0
Author URI: http://www.○○○.com
*/


class Reviews_show
{
    /**
     * reviews_show constructor.
     */
    function __construct()
    {

        add_action('admin_init', array($this, 'add_init'));
        add_action('wp_ajax_update_reviews', array($this, 'update_reviews'));
        add_action('admin_menu', array($this, 'add_reviews_page'));
    }

    /**
     *
     */
    function add_reviews_page()
    {
        add_menu_page('レビュー',
            'レビュー',
            'edit_dashboard',
            __FILE__,
            array($this, 'show_reviews'), '',
            8);

    }

    /**
     * CSSファイルの初期読み込み
     */
    function add_init()
    {
        wp_register_style('reviews_approve', plugins_url('css/reviews-approve.css', __FILE__));
        wp_enqueue_style('reviews_approve');
    }

    function action()
    {
        add_action('admin_init', 'add_init');
        add_action('add_menu', 'add_reviews_page');
    }

    function show_status($review_status)
    {
        $review_status__message = "";
        switch ($review_status) {
            case 0:
                $review_status__message = "未承認";
                break;
            case 1:
                $review_status__message = "表示拒否";
            case 2:
                $review_status__message = "承認済";
        }
        return $review_status__message;
    }

    function update_reviews()
    {
        global $wpdb;
        $update_reviews = $_POST['review_id_list'];
        $status = "2";
        if (count($update_reviews) < 1) {
            echo "更新するIDがありません。";
            die();
        }
        $table = $wpdb->prefix . 'reviews';
        foreach ($update_reviews as $review) {
            $db_review_status = $wpdb->get_var("SELECT review_status FROM $table WHERE review_id = $review");
            if ($status != $db_review_status) {

//            $results = $wpdb->query($wpdb->prepare(
//                "UPDATE $table SET review_status = 2 WHERE review_id = $update_review"
//            ));
                $results = $wpdb->update(
                    $table,
                    array(
                        "review_status" => $status,
                    ),
                    array(
                        "review_id" => $review
                    )
                );
                if ($results == false) {
                    echo "更新に失敗しました。";
                    echo $wpdb->print_error();
                    die();
                }
            }
        }
        echo "更新に成功しました";
        die();


    }

    function regist_review()
    {
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

    function show_reviews()
    {
        global $wpdb;
        $http = is_ssl() ? 'https' : 'http' . '://';
        $reviews = $wpdb->get_results("SELECT * FROM wp_reviews ORDER BY review_id");
        ?>
        <div class="wrap">
            <div id="icon-options-general" class="icon32"><br/></div>
            <h2>レビュー承認設定</h2>
            <div>
                <button class="button all_check">一括承認</button>
                <button class="button close" style="display: none">チェックボックスを閉じる</button>
            </div>
            <table class="wp-list-table widefat fixed striped table-view-list comments">
                <thead>
                <tr>
                    <th id="cb" class="manage-column column-cb check-column col-1">
                        <label class="screen-reader-text">全て選択</label>
                        <input id="cb-select-all" type="checkbox">
                    </th>
                    <th scope="col" id="author" class="manage-column column-author" style="width: 7%;">投稿者</th>
                    <th scope="col" id="rate" class="manage-column column-rate" style="width: 6%">レート</th>
                    <th scope="col" id="comment" class="manage-column column-comment column-primary"
                        style="width: 40%;">レビュー内容
                    </th>
                    <th scope="col" id="date" class="manage-column column-date sortable desc" style="width: 11%;">
                        レビュー日
                    </th>
                    <th scope="col" id="status" class="manage-column column-status sortable desc" style="width: 10%;">
                        ステータス
                    </th>

                    <th scope="col-3" id="response" class="manage-column column-response sortable desc"
                        style="width: 30%;">投稿先
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $max = 5;
                foreach ($reviews as $index => $review):
                    $level = $review->review_rating;
                    $star1 = ($level > 0) ? array_fill(0, $level, "★") : array();
                    $stars = implode("", array_pad($star1, $max, "☆"));
                    $post = get_post($review->review_post_id);
                    setup_postdata($post);
                    ?>
                    <tr class="review_list">
                        <form>

                            <td class="col-1">
                                <input type="checkbox" name="<?php echo $review->review_id; ?>"
                                       value="<?php echo $review->review_id; ?>"
                                       class="approve_check">
                            </td>
                            <td class="col-1">
                                <input type="hidden" value="<?php echo $review->review_id; ?>"
                                       id="<?php echo $review->review_id; ?>">
                                <p class="nickname"><span><?php echo urldecode($review->review_author); ?></span></p>
                            </td>
                            <td class="col-1">
                                <div class='star_rating'>
                                    <?php echo $stars; ?>
                                </div>
                            </td>
                            <td class="review_comments__wrap col-4">
                                <div class="review_comments">
                                    <?php echo urldecode($review->review_comment); ?>
                                </div>
                            </td>
                            <td class="review_date__wrap col-1">
                                <span class="review_date"><?php echo $review->create_at; ?></span>
                            </td>

                            <td class="review_approve_status col-1">
                                <span><?php echo $this->show_status($review->review_status); ?></span>
<!--                                <div class="review_approve_status">-->
<!--                                    --><?php //if (!$review->review_status == 2): ?>
<!--                                        <a id="approve" class="btn button-success approve_review">-->
<!--                                            承認する-->
<!--                                        </a>-->
<!--                                        <a id="reject" class="btn button-dark reject">-->
<!--                                            拒否する-->
<!--                                        </a>-->
<!--                                    --><?php //endif; ?>
<!--                                </div>-->
                            </td>
                            <td class="related_post col-3">
                                <?php echo $post->post_title; ?>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <button class="button all_check">一括承認</button>
        </div>

        <style>

        </style>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
            jQuery(function () {
                // レビューAjax処理
                //const ajax_url = "<?php //echo $http . $_SERVER["HTTP_HOST"];?>/wp-admin/admin-ajax.php";
                const ajax_url = "https://cbdism.info/wp-admin/admin-ajax.php";

                /**
                 * 一括承認処理
                 */
                jQuery('.all_check').click(function () {
                    var checked = jQuery('[class="approve_check"]:checked').map(function () {
                        return parseInt(jQuery(this).val());
                    }).get();
                    console.log(checked);
                    jQuery.ajax({
                        type: "POST",
                        url: ajax_url,
                        data: {
                            action: 'update_reviews',
                            review_id_list: checked
                        }
                    }).then(function (response) {
                        console.log(response);
                        window.alert(response);
                        window.location.reload();
                    }).catch(function (err) {
                        console.log(err);
                        window.alert(err);
                    })
                });

                /**
                 * 一括承認チェック処理
                 */
                jQuery('#cb-select-all').click(function () {
                    if (jQuery('#cb-select-all').prop('checked')) {
                        jQuery('.approve_check').prop('checked', true);
                    } else {
                        jQuery('.approve_check').prop('checked', false);
                    }
                });

                // var post_id = jQuery("#post_id").val();
                // // レビュー一覧取得処理
                // jQuery.ajax({
                //     type: "GET",
                //     url: ajax_url,
                //     data: {
                //         action: 'get_review',
                //         post_id: post_id
                //     },
                //
                // }).then(function (response) {
                //     console.log(response);
                //     var nickname = response.review_author;
                //     var rate_value = parseInt(response.review_rating);
                //     var review_comment = response.review_comment;
                // }).catch(function (err) {
                //     console.log(err);
                // });

                // レビュー投稿処理
            });
        </script>
        <?php
    }


}


$show_text = new reviews_show();

function add_reviews_page()
{
    add_menu_page('レビュー',
        'レビュー',
        'edit_dashboard',
        __FILE__,
        'show_reviews', '',
        8);

}

/**
 * CSSファイルの初期読み込み
 */
