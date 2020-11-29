<?php get_header(); ?>

<?php
global $wp_query;
$search_query = get_search_query();
$total_results = new WP_Query(array(
    'post_type' => array('product', 'store'),
    's' => $search_query
));
//    $total_results = $wp_query->found_posts;

?>

<h1 style="text-align: center;"><?php echo $search_query; ?>
    の検索結果<span>（<?php echo $total_results->found_posts; ?>件）</span></h1>

<ul class='category_list simple_list'>
    <?php
    if ($total_results->found_posts > 0):
        $query_posts = $total_results->get_posts();
//      if(have_posts()):

        foreach ($query_posts as $query_post):
            the_post();
//        setup_postdata($query_post);
          $post = get_the_ID();
            $cf_sample = SCF::get('product-image', $post);

//            $cf_sample = SCF::get('product-image', the_ID());
            if ($cf_sample == null) {
                $cf_sample = SCF::get('store-image', $post);
//                $cf_sample = SCF::get('store-image', the_ID());
            }
            $cf_sample = wp_get_attachment_image_src($cf_sample, 'large');
            $imgUrl = esc_url($cf_sample[0]);
            $product_id = get_the_ID();
            $level = get_avarage_rate($product_id);
//            $level = get_avarage_rate(the_ID());
            $max = 5;
            $star1 = ($level > 0) ? array_fill(0, $level, "★") : array();
            $stars = implode("", array_pad($star1, $max, "☆"));
            // レビュー投稿数取得
            $count_rate = get_count_reviews($product_id);
//            $count_rate = get_count_reviews(the_ID());
            ?>
            <li><a href="<?php the_permalink(); ?>" class="container d-flex">
                    <img class="image" src='<?php echo $imgUrl; ?>'>
                    <div class='text_area'>
                        <h2><?php the_title(); ?></h2>
                        <div class='star_rating'>
                            <?php echo number_format($level, 1); ?>
                            <span class="star">
          <?php echo $stars; ?>
          <span class="sum_reviewer">
            (<?php echo $count_rate; ?>)
          </span>
        </span>
                        </div>
                        <?php if (SCF::get('price') != null) : ?>
                            <p class='text'>定価: <span><?php echo SCF::get('price'); ?>円</span> (税込)</p>
                        <?php endif; ?>
                        <?php if (SCF::get('address') != null): ?>
                            <p class='address'><span><?php echo SCF::get('address'); ?></span></p>
                            <p class='bissness-hours'>営業時間<span><?php echo SCF::get('bisiness-hours'); ?></span></p>
                        <?php endif; ?>
                    </div>
                </a></li>
            <?php the_excerpt(); ?>

        <?php endforeach; else: ?>

        <?php echo $search_query; ?> に一致する情報は見つかりませんでした。

    <?php endif; ?>
