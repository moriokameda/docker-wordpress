<div class="container">
  <h2 class="title" id="review">レビュー</h2>
  <div class="bar_area">
    <div class="bar_wrap">
      <table class="bar_table">
        <?php
          $nums = [5,4,3,2,1];
          $post_id = get_the_ID();
          foreach($nums as $num) :
            $num_review_count = (int) get_percentage_reviews($post_id,$num);
            // var_dump($num_review_count);
            $review_count = (int) get_count_reviews($post_id);
            $percentage = 0;

            if ($review_count > 0) {
              $percentage = ($num_review_count / $review_count ) * 100;
            }

            if ($percentage > 0) {
              $percentage = floor($percentage);
            }
        ?>
        <tr class="bar">
          <th class="num_class"><?php echo $num;?></th>
          <td class="bar_chart">
            <div class="canvas_wrap">
              <div class="shadow_line"></div>
              <div class="main_line" style="width: <?php echo $percentage;?>%;"></div>
            </div>
          </td>
          <td class="bar_percent"><?php echo $percentage;?>%</td>
        </tr>
          <?php endforeach;?>

      </table>
      <!-- <canvas id="canvas"></canvas> -->
      <div class="avg_area">
        <?php
          $store_id = get_the_ID();

          $level = get_avarage_rate($store_id);
          $max = 5;
          $star1 = ($level > 0) ? array_fill(0, $level, "★") : array();
          $stars = implode("", array_pad($star1, $max, "☆"));

          // レビュー投稿数取得
          $count_rate = get_count_reviews($store_id);
        ?>
        <div class="star_rating avg_rating">
          <p class="star_avg">
            <?php echo number_format($level, 1);?>
          </p>
          <p class="star">
            <?php echo $stars;?>
          </p>
          <p class="sum_reviewer">
            (<?php echo $count_rate;?>)
          </p>
        </div>
      </div>
    </div>

  </div>
  <div class="review_btn text-center">
    <button class="btn rounded-pill">レビューを書く</button>
  </div>
  <?php get_template_part('review-form'); ?>
  <div class="comments">
    <ul>
      <?php
        require_wp_db();
        $reviews = get_reviews(get_the_ID());
        $max = 5;
        foreach($reviews as $index => $review):
          $level = $review->review_rating;
          $star1 = ($level > 0) ? array_fill(0, $level, "★") : array();
          $stars = implode("", array_pad($star1, $max, "☆"));
      ?>
      <li>
        <p class="nickname"><?php echo urldecode($review->review_author);?></p>
        <div class='star_rating'><?php echo $stars;?> <span class="review_date"><?php echo $review->create_at;?></span></div>
        <p class="review_comments"><?php echo urldecode($review->review_comment);?></p>
      </li>
      <?php endforeach;?>
    </ul>
  </dvi>
</div>
