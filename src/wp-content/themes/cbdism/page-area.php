<!--
Template Name: エリア一覧ページ
-->

<?php
  $taxsonomy = 'store_area';
  $args = array(
    'hide_empty' => false,
    'parent' => 0
  );
  $parent_terms = get_terms($taxsonomy, $args);
?>
<?php get_header();?>
  <main class="main container">
    <h1 class='page_title'>エリアの指定</h1>
    <ul class="simple_list area_list">
      <!--全体カテゴリ一覧 'works_cat'適宜変更-->
      <?php foreach ($parent_terms as $parent_term) :?>
        <?php if($parent_term->slug == "online"):?>
        <li class="item"><a href="<?php echo get_term_link($parent_term->term_id, $taxsonomy);?>">
          <h2 class="text-primary">オンラインストア</h2><i class="fas fa-chevron-right"></i>
        </a></li>
        <?php else: ?>
        <li class="item">
          <a class="not-scroll" data-toggle="collapse" href="#area_collapse_<?php echo $parent_term->term_id; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
            <h2><?php echo $parent_term->name;?></h2><i class="fas fa-plus"></i>
          </a>
        </li>
        <div class="collapse" id="area_collapse_<?php echo $parent_term->term_id; ?>">
          <ul class="simple_list second_list">
            <!-- <li class="item"><a href='#'><h3>青森</h3><i class="fas fa-chevron-right"></i></a></li> -->
            <?php
              $child_terms = get_term_children($parent_term->term_id, $taxsonomy);
              if (!is_wp_error($child_terms)) :
                foreach($child_terms as $child_term) :
            ?>
            <?php $term = get_term_by('id',$child_term,$taxsonomy); ?>
            <li class="item">
              <a href='<?php echo get_term_link($term->term_id, $taxsonomy);?>'>
                <h3><?php echo $term->name;?></h3>
                <i class="fas fa-chevron-right"></i>
              </a>
            </li>
              <?php endforeach; endif;?>
          </ul>
        </div>
        <?php endif;?>
      <?php endforeach;?>
    </ul>
  </main>
<?php get_footer();?>
