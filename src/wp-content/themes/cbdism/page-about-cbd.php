<!--
Template Name: about ページ
-->
<?php get_header();?>

  <main class="main container textpage_container">
    <?php if (have_posts()): while (have_posts()) :the_post();?>
      <h2 class="page_title"><?php the_title();?></h2>
      <?php the_content();?>
    <?php endwhile; endif; ?>
    <!-- <h1 class='page_title'>CBDについて</h1> -->

    <!-- <p class="text_area">CBDはカンナビジオールの略称です。<br>
麻に含まれる成分であるカンナビノイドの1つです。<br>
「麻」の成熟した茎から抽出された 「CBD」は<b><font color="#45A788">医療用途の研究</font></b>が進められています。</p>
    <h2 class='page_title'>CBDは合法なのですか？</h2>
    <p class="text_area">『大麻草の葉と花穂(花冠)とその製品が禁止されており、麻の茎および種子それら由来の製品は除外される』<br>
上記が、日本では法律的に禁じられている「大麻」となります。<br>
CBDは<b><font color="#45A788">「産業用大麻の成熟した茎と種子及びその製品」</font></b>です。<br>
つまり、法律で<b><font color="#45A788">合法</font></b>になります。</p>
    <h2 class='page_title'>CBDとTHCの違い</h2>
    <p class="text_area">THCには精神を活性化する作用がありますが、CBDにはありません。<br>
CBDの効能は、<b><font color="#45A788">脳機能と記憶力をアップ</font></b>させることです。</p>
    <h2 class='page_title'>CBDの<font color="#45A788">10</font>の効能</h2>
    <p class="text_area">⑴ 上質な睡眠（寝つきが良くなり、深い睡眠）<br>
      ⑵ 不安感や憂鬱な気持ちの軽減<br>
      ⑶ 集中力、記憶力がアップする<br>
      ⑷ お肌の改善（皮膚の再生機能アップする）<br>
      ⑸ 性欲がアップする<br>
      ⑹ ケガなどの痛み軽減<br>
      ⑺ 味覚がアップする<br>
      ⑻ ぜんそく<br>
      ⑼ てんかんの発作の軽減、重症化を防ぐ<br>
      ⑽ 認知症・アルツハイマー病</p> -->
  </main>
<?php get_footer();?>
