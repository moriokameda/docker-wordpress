<div class="review_form">
  <div class="modalBg">
    <div class="review_wrap">
      <div id="closeModal" class="closeModal">
        ×
      </div>
      <form method="post" class="review_form_area">
        <input type="hidden" name="post_id" id="post_id" value="<?php echo get_the_ID(); ?>">
        <div class="name">
          <p class="form_item">ニックネーム</p>
          <input type="text" name="name" id="nickname" size="25">
        </div>
        <div class="rating_area">
          <p class="form_item">評価</p>
          <div class="stars">
            <input id="star5" type="radio" name="star" value="5" />
            <label for="star5">★</label>
            <input id="star4" type="radio" name="star" value="4" />
            <label for="star4">★</label>
            <input id="star3" type="radio" name="star" value="3" />
            <label for="star3">★</label>
            <input id="star2" type="radio" name="star" value="2" />
            <label for="star2">★</label>
            <input id="star1" type="radio" name="star" value="1" />
            <label for="star1">★</label>
          </div>
        </div>
        <div class="review_area">
          <p class="form_item"><strong> レビュー</strong></p>
          <textarea name="review_content" class="review_comment" rows="10" onMouseover="this.style.backgroundColor='white'"
          placeholder="こちらにレビューを書いてください！"></textarea>
        </div>
      </form>
      <div class="review_submit_area">
        <button class="btn review_btn review_submit-btn rounded-pill">
          投稿する
        </button>
      </div>
      <div class="review_cancel_area ">
        <button class="review_cancel-btn rounded-pill btn">戻る</button>
      </div>
    </div>
  </div>
</div>
<div class="review_post_alert">
  <div class="alert_area">
    <p class="message">レビューの送信が完了しました。</p>
    <p class="message">ありがとうございます！</p>
    <p class="message">反映までしばらくお時間がかかる場合がございます。</p>
    <hr>
    <p class="close-btn">OK</p>
  </div>
  <!-- <div class="modalBg">
  </div> -->
</div>
