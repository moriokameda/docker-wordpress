<?php
/**
 * Template Name: 製品カテゴリ一覧ページ
 */
?>
<?php
  $taxonomy = 'product_category';
  $term = get_term_by('id', get_queried_object_id(), $taxonomy);
  $custom_posts = get_posts(array(
    'post_type' => 'product',
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
    <section class='each_category'>
      <h1 class='page_title'><?php single_term_title();?></h1>
      <?php if($custom_posts) :?>
      <ul class='category_list simple_list'>
        <?php foreach($custom_posts as $post) :
          setup_postdata($post);
          $cf_sample = SCF::get('product-image',$post->ID);
          $cf_sample = wp_get_attachment_image_src($cf_sample,'large');
          $imgUrl = esc_url($cf_sample[0]);
          $product_id = $post->ID;
          $level = get_avarage_rate($product_id);
          $max = 5;
          $star1 = ($level > 0) ? array_fill(0, $level, "★") : array();
          $stars = implode("", array_pad($star1, $max, "☆"));

          // レビュー投稿数取得
          $count_rate = get_count_reviews($product_id);
        ?>
        <li><a href="<?php the_permalink();?>" class="container d-flex">
          <img class="image" src='<?php echo $imgUrl;?>'>
          <div class='text_area'>
            <h2><?php the_title();?></h2>
            <div class='star_rating'>
              <?php echo number_format($level, 1);?>
              <span class="star">
                <?php echo $stars;?>
                <span class="sum_reviewer">
                  (<?php echo $count_rate;?>)
                </span>
              </span>
            </div>
            <p class='text'>定価: <span><?php echo SCF::get('price');?>円</span> (税込)</p>
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
