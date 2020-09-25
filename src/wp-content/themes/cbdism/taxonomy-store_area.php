<?php
/**
 * Template Name: 店舗一覧ページ
 */
?>
<?php
  $taxonomy = 'store_area';
  $term = get_term_by('id', get_queried_object_id(), $taxonomy);
  $custom_posts = get_posts(array(
    'post_type' => 'store',
    'post_per_page' => 20,
    'orderby' => 'id',
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'slug',
        'terms' => $term->slug,
        'operator' => 'IN',
      )
    )
  ));
  global $post;
?>
<?php get_header();?>
  <main class="main">
    <section class='store_list'>
      <h1 class='page_title'><?php single_term_title();?></h1>
      <?php if ($custom_posts) :?>
      <ul class="">
        <?php foreach($custom_posts as $post):
          setup_postdata($post);
          $cf_sample = SCF::get('store-image');
          $cf_sample = wp_get_attachment_image_src($cf_sample,'large');
          $imgUrl = esc_url($cf_sample[0]);
          $store_id = $post->ID;
          $level = get_avarage_rate($store_id);
          $max = 5;
          $star1 = ($level > 0) ? array_fill(0, $level, "★") : array();
          $stars = implode("", array_pad($star1, $max, "☆"));

          // レビュー投稿数取得
          $count_rate = get_count_reviews($store_id);
        ?>
        <li class="store_info"><a href="<?php echo the_permalink();?>" class="container d-flex">
          <img src="<?php echo $imgUrl;?>" class="image">
          <div class="text_container">
            <h1><?php echo the_title();?></h1>
            <div class="star_rating">
              <?php echo number_format($level, 1);?>
              <span class="star">
                <?php echo $stars;?>
                <span class="sum_reviewer">
                  (<?php echo $count_rate;?>)
                </span>
              </span>
            </div>
            <p class="time"><?php echo SCF::get('address');?></p>
            <p class="time"><span>営業時間</span>： <?php echo SCF::get('bisiness-hours');?></p>
          </div>
        </a></li>
        <?php endforeach;?>
      </ul>
      <div class="text-center more_show">
        <button class="btn btn-lg rounded-pill">もっと見る <i class="fas fa-chevron-down"></i></button>
      </div>
      <?php endif;?>
    </section>
  </main>
<?php get_footer();?>
