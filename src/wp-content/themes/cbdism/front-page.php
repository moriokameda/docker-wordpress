<!--
Template Name: トップページ
-->
<?php
  $taxonomy = 'product_category';
  $args = array(
    'hide_empty' => false,
    'parent' => 0
  );
  $parent_terms = get_terms($taxonomy, $args);
  $custom_posts = get_posts(array(
    'post_type' => 'product',
    'post_per_page' => 10,
    'orderby' => 'id',
  ));

?>
<?php get_header() ?>
  <div class='main_visiual'>
    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/mv_1.jpg' alt='main visiual'>
    <p>あなたにあったCBDを探しましょう。</p>
  </div>
  <main class="main container index" id="main">
    <div class="row">
      <section class="sec_category col-sm-6 col-xs-12">
        <a class="accordion_menu_btn amb-c text-primary not-scroll" data-toggle="collapse" href="#acd_category" role="button" aria-expanded="false" aria-controls="collapseExample">
          カテゴリ一覧<i class="am-c-u fas fa-chevron-up d-none"></i><i class="am-c-d fas fa-chevron-down"></i>
        </a>
        <h2 class='section_title'>カテゴリから探す</h2>
        <div class="collapse class accordion_mune" id="acd_category">
          <ul class="navbar-nav">
            <?php foreach($parent_terms as $parent_term) :?>
            <li class="nav-item">
              <a href="<?php echo get_term_link($parent_term->term_id, $taxonomy);?>" class="nav-link">
                <?php echo $parent_term->name;?>
                <i class="fas fa-chevron-right"></i>
              </a>
            </li>
            <!-- <li class="nav-item"><a href="" class="nav-link">ワックス<i class="fas fa-chevron-right"></i></a></li>
            <li class="nav-item"><a href="" class="nav-link">グミ<i class="fas fa-chevron-right"></i></a></li> -->
            <?php endforeach;?>
          </ul>
        </div>
        <div class="swiper-container slider-category">
          <div class="swiper-wrapper">
            <?php
              foreach($parent_terms as $index => $parent_term) :
                // var_dump($parent_term->term_id);
                $cf_sample = SCF::get_term_meta($parent_term->term_id, $taxonomy, "product_category__img");
                $cf_sample = wp_get_attachment_image_src($cf_sample,'large');
                $imgUrl = esc_url($cf_sample[0]);
            ?>
              <div class="swiper-slide"><a href="<?php echo get_term_link($parent_term->term_id, $taxonomy);?>" class='item'>
                <!-- <img src='<?php echo get_template_directory_uri(); ?>/assets/images/dummy/p-dummy-<?php
                 echo $index + 1;?>.png' alt='product'> -->
                <img src='<?php echo $imgUrl;?>' alt='product'>
                <p class='text'><?php echo $parent_term->name;?></p>
              </a></div>
            <?php endforeach;?>
          </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next d-none d-sm-block"></div>
            <div class="swiper-button-prev d-none d-sm-block"></div>
        </div>

      </section>
      <section class="sec_store col-sm-6 col-xs-12">
        <h2 class='section_title'>ストアを探す</h2>
        <div class='container'>
          <div class="row">
          <div class="col-6 map">
            <a class="inner" href="/index.php/area">
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/map.png' alt='product'>
              <p class='text'>エリアから探す</p>
            </a>
          </div>
          <div class="col-6 map_nearby">
            <!-- <div class="inner">
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/nearby.png' alt='product' width="100" height="100">
              <p class='text'>現在地から探す</p> -->
            </div>
          </div>
        </div>
        </div>
      </section>
    </div>
    <section class="sec_overall_rank">
      <a class="accordion_menu_btn amb-r text-primary not-scroll" data-toggle="collapse" href="#acd_rank" role="button" aria-expanded="false" aria-controls="collapseExample">
        ランキング一覧<i class="am-r-u fas fa-chevron-up d-none"></i><i class="am-r-d fas fa-chevron-down"></i>
      </a>
      <h2 class='section_title'>総合ランキング</h2>
      <div class="collapse class accordion_mune" id="acd_rank">
        <ol class="navbar-nav rank_list">
          <?php
            foreach ($custom_posts as $post) :
              setup_postdata($post);
              $product_id = $post->ID;
              $level = get_avarage_rate($product_id);
              $count_rate = get_count_reviews($product_id);
          ?>
          <li class="nav-item"><a href="<?php the_permalink();?>" class="nav-link">
            <i class="fas fa-chevron-right"></i>
            <span class="order"></span>
            <p><?php the_title();?></p>
            </a>
            <div class="rate" style="display: none;"><?php echo $level;?></div>
            <div class="sum_reviewer" style="display: none;"><?php echo $count_rate;?></div>
          </li>
            <?php endforeach;?>
        </ol>
      </div>
      <div class="swiper-container slider-ranking">
          <div class="swiper-wrapper">
            <?php
              foreach ($custom_posts as $post) :
                setup_postdata($post);
                $cf_sample = SCF::get('product-image',$post->ID);
                $cf_sample = wp_get_attachment_image_src($cf_sample,'large');
                $imgUrl = esc_url($cf_sample[0]);
                $product_id = $post->ID;
                $level = get_avarage_rate($product_id);
                $count_rate = get_count_reviews($product_id);
            ?>
            <div class="swiper-slide"><a href="<?php the_permalink();?>" class='item'>
              <span class='order'></span>
              <img src='<?php echo $imgUrl;?>' alt='<?php the_title();?>の製品画像'>
              <p class='text'><?php the_title();?></p>
              </a>
              <div class="rate" style="display: none;"><?php echo $level;?></div>
              <div class="sum_reviewer" style="display: none;"><?php echo $count_rate;?></div>
            </div>
            <?php endforeach;?>
          </div>
          <!-- Add Arrows -->
          <div class="swiper-button-next d-none d-sm-block"></div>
          <div class="swiper-button-prev d-none d-sm-block"></div>
      </div>
    </section>
    <script>
      jQuery(function() {
        var product_titles = jQuery(".rank_list li");
        var products = jQuery(".slider_ranking .swiper-slide");
        // 総合ランキングのタイトルのソート
        product_titles.sort(function (before, after) {
          if (parseInt(jQuery(before).find(".rate").text()) > parseInt(jQuery(after).find(".rate").text())) {
            console.log(jQuery(before).text());
            return -1;
          }
          if (parseInt(jQuery(before).find(".rate").text()) < parseInt(jQuery(after).find(".rate").text())) {
            console.log(jQuery(after).text());
            return 1;
          }
          if (parseInt(jQuery(before).find(".rate").text()) == parseInt(jQuery(after).find(".rate").text())) {
            if (parseInt(jQuery(before).find(".sum_reviewer").text()) < parseInt(jQuery(after).find(".sum_reviewer").text())) {
              return 1;
            }
            if (parseInt(jQuery(before).find(".sum_reviewer").text()) > parseInt(jQuery(after).find(".sum_reviewer").text())) {
              return -1;
            }
          }
          return 0;
        });
        jQuery(".rank_list li").remove();
        product_titles.each(function(index, product_title) {
          jQuery('.rank_list').append(product_title);
        });
        // 総合ランキング（画像あり）のソート
        products.sort(function (before, after) {
          if (parseInt(jQuery(before).find(".rate").text()) > parseInt(jQuery(after).find(".rate").text())) {
            console.log(jQuery(before).text());
            return -1;
          }
          if (parseInt(jQuery(before).find(".rate").text()) < parseInt(jQuery(after).find(".rate").text())) {
            console.log(jQuery(after).text());
            return 1;
          }
          if (parseInt(jQuery(before).find(".rate").text()) == parseInt(jQuery(after).find(".rate").text())) {
            if (parseInt(jQuery(before).find(".sum_reviewer").text()) < parseInt(jQuery(after).find(".sum_reviewer").text())) {
              return 1;
            }
            if (parseInt(jQuery(before).find(".sum_reviewer").text()) > parseInt(jQuery(after).find(".sum_reviewer").text())) {
              return -1;
            }
          }
          return 0;
        });
        jQuery(".slider_ranking .swiper-slide").remove();
        products.each(function(index, product) {
          jQuery('.slider_ranking .swiper-wrapper').append(product);
        });
      });
    </script>
  </main>
<?php wp_footer();?>
<?php get_footer();?>
