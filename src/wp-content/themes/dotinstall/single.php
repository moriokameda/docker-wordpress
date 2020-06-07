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
          <?php the_content(); ?>
        </div>
      </div>
      <!-- post -->
      <div class="navigation">
        <div class="prev"><?php previous_post_link(); ?></div>
        <div class="next"><?php next_post_link(); ?></div>
      </div>
      <?php
          endwhile;
        else :
      ?>
      <p>記事はありません。</p>
      <?php endif; ?>
    </div>
    <!-- posts -->
    <!-- sidebar -->
    <?php get_sidebar();?>
    <!-- sidebar -->
  </div>
  <!-- main -->
<?php get_footer(); ?>
