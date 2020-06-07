<?php get_header(); ?>
<!-- main -->
  <div id="main" class="container">
    <!-- posts -->
    <div id="posts">
      <!-- post -->
      <?php
        if (have_posts()) :
          while(have_posts()) :
            the_post();
      ?>
      <div class="post">
        <div class="post_header">
          <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
          <div class="post_meta"><?php echo get_the_date(); ?>【<?php the_category(', '); ?>】</div>
        </div>
        <div class="post_content">
          <div class="post_image">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail(array('100' , '100')); ?>
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png" alt="" width="100" height="100">
            <?php endif ;?>
          </div>
          <div class="post_body">
            <?php the_excerpt(); ?>
          </div>
        </div>
      </div>
      <!-- post -->
      <?php
          endwhile;
        else :
      ?>
      <p>記事はありません。</p>

      <?php endif; ?>

      <div class="navigation">
        <div class="prev"><?php previous_posts_link(); ?></div>
        <div class="next"><?php next_posts_link(); ?></div>
      </div>
    </div>
    <!-- posts -->
  <!-- sidebar -->
    <?php get_sidebar();?>
  <!-- sidebar -->
  </div>
  <!-- main -->
  <!-- footer -->
  <?php get_footer(); ?>
