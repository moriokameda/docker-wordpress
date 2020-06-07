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
        </div>
        <div class="post_content">
          <?php the_content(); ?>
        </div>
      </div>
      <!-- post -->
      <?php
          endwhile;
        else :
      ?>
      <p>ページはありません。</p>
      <?php endif; ?>
    </div>
    <!-- posts -->
    <!-- sidebar -->
    <?php get_sidebar();?>
    <!-- sidebar -->
  </div>
  <!-- main -->
<?php get_footer(); ?>
