<?php
if (post_password_required()) {
	return;
}
?>
<div class="container">
  <h2 class="title" id="review">レビュー</h2>
  <div class="">
    <p>
    評価の分布図：ワードプレスの制作時に作成
    </p>
  </dvi>
  <div class="review_btn text-center">
    <button class="btn rounded-pill">レビューを書く</button>
    <?php echo do_shortcode('[WPCR_INSERT]');?>
  </div>
  <div class="review_area">
    <section id="modalArea" class="modalArea">
      <div id="modalBg" class="modalBg"></div>
      <div class="modalWrapper">
        <form action="POST" class="review_form">
          <div class="name_area">
            <p class="form_name">ニックネーム</p>
            <input type="text" name="nickname">
          </div>
          <div class="rating_area">
            <p class="form_name">評価</p>
          </div>
          <div class="comment_area">
            <p class="form_name">レビュー</p>
            <textarea name="review" id="" cols="30" rows="10" placeholder="こちらにレビューを記載してください"></textarea>
          </div>
          <div class="submit_area">
            <input type="submit" value="投稿する" class="submit">
          </div>
        </form>
        <div id="closeModal" class="closeModal">
          戻る
        </div>
      </div>
    </section>
  </div>
  <div class="comments">
    <ul>
      <li>
        <p>ニックネーム</p>
        <div class='star_rating'>&#9733;&#9733;&#9733;&#9733;&#9733;WP制作時に作成</div>
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </li>
      <li>
        <p>ニックネーム</p>
        <div class='star_rating'>&#9733;&#9733;&#9733;&#9733;&#9733;WP制作時に作成</div>
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </li>
      <li>
        <p>ニックネーム</p>
        <div class='star_rating'>&#9733;&#9733;&#9733;&#9733;&#9733;WP制作時に作成</div>
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </li>
    </ul>
  </div>
</div>
