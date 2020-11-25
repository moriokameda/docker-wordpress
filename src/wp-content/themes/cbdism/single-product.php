<?php
/**
 * Template name: 製品詳細ページ
 */
?>
<?php
/* （ステップ1）データの取得 */
$query = new WP_Query(
    array(
        'post_type' => 'store',
        'posts_per_page' => 3,
    )
);
// 製品イメージの取得
$sample_image = SCF::get('product-image');
$sample_image_URL = wp_get_attachment_image_src($sample_image, 'full');
$imgUrl = esc_url($sample_image_URL[0]);
// 取扱ストアの取得
$treat_stores = SCF::get('store-group');
foreach ($treat_stores as $key => $value) {
    $store_price[$key] = $value['store-price'];
}
array_multisort($store_price, SORT_DESC, $treat_stores);
?>
<?php get_header(); ?>
<nav class='product_nav'>
    <h1 class='page_title'><?php the_title(); ?></h1>
    <ul class="nav">
        <li><a href="#info">情報 <i class="fas fa-sort-down"></i></a></li>
        <li><a href="#review">レビュー <i class="fas fa-sort-down"></i></a></li>
        <li><a href="#store">取り扱いストア <i class="fas fa-sort-down"></i></a></li>
    </ul>
</nav>
<main class="main">
    <section class="product_info" id="info">
        <?php if (have_posts()) : while (have_posts()):
        the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 image_area"><img class="image" src='<?php echo $imgUrl; ?>'></div>
                <div class="col-6 col-md-3 text_area">
                    <p class='text'>定価: <span class="text-danger"><?php echo SCF::get('price'); ?>円</span> (税込)</p>
                    <p class='text'>内容量：<?php echo SCF::get('size'); ?>ml</p>
                    <p class='text'>CBD含有量：<?php echo SCF::get('cbd-size'); ?>mg</p>
                    <p class='text'>CBD単価/1mg：<?php echo SCF::get('cbd-price'); ?>円</p>
                    <p class='text'>原産国：<?php echo SCF::get('product-country'); ?></p>
                </div>
                <div class="text_container col-12 col-md-6">
                    <?php echo SCF::get('description'); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="product_review">
        <?php get_template_part("review"); ?>
    </section>
    <section class="a8_area">
        <div class="a8_title">
            <?php if (SCF::get('product-affiliate') != null): ?>
                <p><?php echo SCF::get('affiliate-store'); ?>から購入</p>
            <?php endif; ?>
        </div>
        <div class="a8_content">
            <?php echo SCF::get('product-affiliate'); ?>
        </div>
    </section>
    <section class="product_store">
        <div class="container">
            <div class="title" id="store">取り扱いストア</div>
            <div class="sort">
                <span id="sort_price">価格順</span>
                <span id="sort_review">評価順</span>
            </div>
            <ul>
                <?php
                foreach ($treat_stores
                         as $treat_store) :
                    ?>
                    <?php
                    if (count($treat_store['store']) > 0):
                        ?>
                        <li class="item d-flex">
                            <?php
                            var_dump($treat_store['store']);
                            exit();
                            $store = get_post($treat_store['store'][0]);
                            var_dump($store);
                            exit();
                            $store_id = $store->ID;
                            $level = get_avarage_rate($store_id);
                            $max = 5;
                            $star1 = ($level > 0) ? array_fill(0, $level, "★") : array();
                            $stars = implode("", array_pad($star1, $max, "☆"));

                            // レビュー投稿数取得
                            $count_rate = get_count_reviews($store_id);
                            // 取扱ストアイメージ取得
                            $cf_sample = SCF::get('store-image', $store_id);
                            $cf_sample = wp_get_attachment_image_src($cf_sample, 'large');
                            $imgUrl = esc_url($cf_sample[0]);
                            ?>
                            <img src="<?php echo $imgUrl ?>" class="image">
                            <div class="text_container">
                                <a href="<?php echo get_permalink($store_id) ?>"
                                   style="color: #0b0b0b; cursor: pointer">
                                    <h3><?php echo $store->post_title; ?></h3>
                                    <div class="star_rating">
                                        <?php echo number_format($level, 1); ?>
                                        <span class="star">
                                    <?php echo $stars; ?>
                                      <span class="sum_reviewer">
                                        (<?php echo $count_rate; ?>)
                                      </span>
                                </span>

                                    </div>

                                    <p class="price">
                                        <span class="price_value"><?php echo $treat_store['store-price']; ?></span><span>円</span>
                                        （税込み）
                                    </p>
                                </a>
                            </div>
                            <a href="<?php echo $treat_store['product_href']; ?>" class="btn_store_href">
                                <button class="btn rounded-pill btn_store">このストアで購入</button>
                            </a>

                        </li>
                    <?php endif; endforeach; ?>
            </ul>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <script>
        jQuery("#sort_price").click(function () {
            var stores = jQuery(".item");
            stores.sort(function (before, after) {
                console.log(before);
                console.log(after);
                if (parseInt(jQuery(before).find(".price span").text()) > parseInt(jQuery(after).find(".price span").text())) {
                    return 1;
                }
                if (parseInt(jQuery(before).find(".price span").text()) < parseInt(jQuery(after).find(".price span").text())) {
                    return -1;
                }
                return 0;
            });
            jQuery(".item").remove();
            stores.each(function (index, store) {
                jQuery('.product_store ul').append(store);
            });
        });
        jQuery("#sort_review").click(function () {
            var stores = jQuery(".item");
            stores.sort(function (before, after) {
                if (parseInt(jQuery(before).find(".star_rating").text()) > parseInt(jQuery(after).find(".star_rating").text())) {
                    console.log(jQuery(before).text());
                    return -1;
                }
                if (parseInt(jQuery(before).find(".star_rating").text()) < parseInt(jQuery(after).find(".star_rating").text())) {
                    console.log(jQuery(after).text());
                    return 1;
                }
                if (parseInt(jQuery(before).find(".star_rating").text()) == parseInt(jQuery(after).find(".star_rating").text())) {
                    if (parseInt(jQuery(before).find(".sum_reviewer").text()) < parseInt(jQuery(after).find(".sum_reviewer").text())) {
                        return 1;
                    }
                    if (parseInt(jQuery(before).find(".sum_reviewer").text()) > parseInt(jQuery(after).find(".sum_reviewer").text())) {
                        return -1;
                    }
                }
                return 0;
            });
            jQuery(".item").remove();
            stores.each(function (index, store) {
                jQuery('.product_store ul').append(store);
            });
        });
    </script>
</main>
<?php get_footer(); ?>
