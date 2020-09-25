<?php
/**
 * Template Name: 店舗詳細ページ
 */
?>
<?php
  global $post;
  the_post();
  $cf_sample = SCF::get('store-image');
  $cf_sample = wp_get_attachment_image_src($cf_sample,'large');
  $imgUrl = esc_url($cf_sample[0]);
  $term = get_the_terms($post->ID, 'store_area');
  $store_id = get_the_ID();
  $level = get_avarage_rate($store_id);
  $max = 5;
  $star1 = ($level > 0) ? array_fill(0, $level, "★") : array();
  $stars = implode("", array_pad($star1, $max, "☆"));

  // レビュー投稿数取得
  $count_rate = get_count_reviews($store_id);
?>
<?php get_header();?>
  <div id="page_top" class="">
    <!-- ページの一番上を認識させるためのタブ -->
  </div>
  <main class="main store_page">
    <section class="store_info">
      <div class="inner container d-flex">
          <img src="<?php echo $imgUrl;?>" class="image">
          <div class="text_container">
            <h1><?php the_title();?></h1>
            <div class="star_rating">
              <?php echo number_format($level, 1);?>
              <span class="star">
                <?php echo $stars;?>
                <span class="sum_reviewer">
                  (<?php echo $count_rate;?>)
                </span>
              </span>
            </div>
            <p class="time"><span>営業時間</span>： <?php echo SCF::get('bisiness-hours');?></p>
          </div>
      </div>
    </section>
    <div class="store_container">
      <div class="row">
        <div class="col-12 col-md-8 left_item">
          <?php if($term[0]->slug != "online") :?>
            <section class="store_map">
              <div class="container">
                <div class="d-flex label">
                  <h2 class=title>住所</h2>
                  <p class="text"><?php echo SCF::get('address');?></p>
                </div>
                <div class="ggmap d-md-none">
                  <iframe src="https://maps.google.co.jp/maps?output=embed&q=<?php echo SCF::get('address');?>"
                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
              </div>
            </section>
          <?php endif;?>
          <section class="store_time">
            <div class="container">
              <div class="d-flex label">
                <h2 class=title>営業時間</h2>
                <p class="text"><?php echo SCF::get('bisiness-hours');?></p>
              </div>
            </div>
          </section>
          <section class="store_time">
            <div class="container">
              <div class="d-flex label">
                <h2 class=title>電話番号</h2>
                <p class="text"><?php echo SCF::get('telephone')?></p>
              </div>
            </div>
          </section>
          <section class="store_web">
            <div class="container">
              <div class="d-flex label">
                <h2 class=title>WEB</h2>
                <p class="text"><a href="<?php echo SCF::get('web');?>"><?php echo SCF::get('web');?></a></p>
              </div>
            </div>
          </section>
        </div>
        <div class="d-none d-md-block col-4 right_item">
        <?php if($term[0]->slug != "online") :?>
          <div class="ggmap_2">
            <iframe src="https://maps.google.co.jp/maps?output=embed&q=<?php echo SCF::get('address');?>" width="600" height="450" frameborder="0" style="border:0;"   allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        <?php endif;?>
        </div>
      </div>
    </div>
    <section class="store_explanation">
      <div class="container">
        <div class="d-flex label">
          <h2 class=title>説明</h2>
          <p class="text"><?php echo SCF::get('description');?></p>
        </div>
      </div>
    </section>
    <section class="product_review">
      <?php get_template_part("review");?>
    </section>
  </main>
<?php get_footer();?>
