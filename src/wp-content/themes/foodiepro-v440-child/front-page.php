<!--
Template Name: ランディングページ
-->
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>すなっくゆう</title>
	<link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/lp001.css" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
	<!-- ヘッダー-->
	<header>
		<div class="header_wrap">
			<div class="header_logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/yu003_03.png" srcset="" alt="ふくろう" /></div>
			<div class="header_logo_sp"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/yu002sp-2_03.png" srcset="" alt="ふくろう" /></div>
			<h1 class="title">
				<span class="strong" style="display: none;">すなっくゆう</span>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/yu002_03.png" alt="" />
			</h1>
			<h2 class="shop_message">あなたの隠れ家として<br>心よりお待ちしております。</h2>
		</div>
	</header>
	<!-- ナビゲーション -->
	<nav class="header_nav">
		<ul class="header_nav_list">
			<li class="nav_list_item">
				<a href="#information" class="nav_list_item__href">
					<span class="nav_list_item__title">店舗情報</span>
					<br>
					information
				</a>
			</li>
			<li class="nav_list_item">
				<a href="#greeting" class="nav_list_item__href">
					<span class="nav_list_item__title">ご挨拶</span>
					<br>
					greeting
				</a>
			</li>
			<li class="nav_list_item">
				<a href="#system" class="nav_list_item__href">
					<span class="nav_list_item__title">お料金</span>
					<br>
					system
				</a>
			</li>
			<li class="nav_list_item">
				<a href="#event" class="nav_list_item__href">
					<span class="nav_list_item__title">イベント</span>
					<br>
					event
				</a>
			</li>
			<li class="nav_list_item">
				<a href="#access" class="nav_list_item__href">
					<span class="nav_list_item__title">アクセス</span>
					<br>
					access
				</a>
			</li>
			<li class="nav_list_item">
				<a href="#notice" class="nav_list_item__href">
					<span class="nav_list_item__title">お知らせ</span>
					<br>
					notice
				</a>
			</li>
			<li class="nav_telephone">
				<a class="nav_list_item__href" href="tel:03-6803-2207">
					<span class="nav_list_item__title">電話予約</span>
					<br>03-6803-2207
				</a>
			</li>
		</ul>
	</nav>
	<!-- ハンバーガメニュー -->
	<div class="hamburger" id="js-hamburger">
		<span class="hamburger__line hamburger__line--1"></span>
		<span class="hamburger__line hamburger__line--2"></span>
		<span class="hamburger__line hamburger__line--3"></span>
	</div>
	<div class="black-bg" id="js-black-bg"></div>
	<!-- トップへ戻るボタン、電話ボタン -->
	<div class="sp_button">
		<a href="tel:03-6803-2207" class="telephone_btn sp_btn">電話</a>
		<a href="#" class="top_btn sp_btn">TOP</a>
	</div>
	<main>
		<!-- 店舗情報 -->
		<section id="information">
			<div class="section_area">
				<div class="section_title__wrap">
					<div class="section_border"></div>
					<h2 class="section_title">店舗情報</h2>
				</div>
				<div class="section_content__wrap">
					<div class="section_item">
						<table class="section_item__table">
							<tbody>
								<tr class="table_row">
									<th class="table__tag">店名</th>
									<td class="table__border">:</td>
									<td class="table__item">すなっく　ゆう</td>
								</tr>
								<tr class="table_row">
									<th class="table__tag">営業時間</th>
									<td class="table__border">:</td>
									<td class="table__item">18:30〜24:00（LO 23:30）</td>
								</tr>
								<tr class="table_row">
									<th class="table__tag">席数</th>
									<td class="table__border">:</td>
									<td class="table__item">カウンター８席</td>
								</tr>
								<tr class="table_row">
									<th class="table__tag">電話番号</th>
									<td class="table__border">:</td>
									<td class="table__item">03-6803-2207</td>
								</tr>
								<tr class="table_row">
									<th class="table__tag">住所</th>
									<td class="table__border">:</td>
									<td class="table__item">〒113-0034 <br>
										東京都文京区湯島3-37-10 太田ビル2F</td>
								</tr>
								<tr class="table_row">
									<th class="table__tag">最寄り駅</th>
									<td class="table__border">:</td>
									<td class="table__item">東京メトロ銀座線<span>上野広小路駅</span><span>徒歩３分</span><br>
										(アクセスマップを参照ください)</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="section_info__img"><img src="https://www.yushima-snack-you.com/wp-content/uploads/2020/09/counter.jpg" alt="店舗情報イメージ" /></div>
				</div>
			</div>
		</section>
		<!-- ご挨拶-->
		<section id="greeting">
			<div class="section_area">
				<div class="section_title__wrap">
					<div class="section_border"></div>
					<h2 class="section_title">ご挨拶</h2>
				</div>
				<div class="section_content__wrap">
					<div class="section_greeting">
						湯島で20年間続くスナックです。<br>
						初めての方、おひとり様もご遠慮なく
						ご来店ください。<br>
						<br>
						座席が8席の小さなお店ですが<br>
						あなたの特別な隠れ家となれますよう<br>
						精一杯のおもてなしをさせて頂きます。
					</div>
					<div class="section_greeting__img">
						<img src="https://www.yushima-snack-you.com/wp-content/uploads/2020/09/greeting.jpg" alt="挨拶イメージ" />
						<div class="section_greeting__img_message">今宵楽しく<br>
							あなたとお話しできることを<br>
							心よりお待ちしております</div>
					</div>
				</div>
			</div>
		</section>
		<!-- お料金-->
		<section id="system">
			<div class="section_area">
				<div class="section_title__wrap">
					<div class="section_border"></div>
					<h2 class="section_title">お料金</h2>
				</div>
				<div class="system__wrap">
					<div class="section_content__title_wrap">
						<h3 class="section_content_title">＜料金価格について＞</h3>
					</div>
					<div class="section_content__item">
						<p class="system__description">全て税抜き価格となります。<br>
							税＋サービス料が別途10％を頂戴しております。</p>

					</div>
				</div>
				<div class="system__wrap">
					<div class="section_content__title_wrap">
						<h3 class="section_content_title">＜基本コース＞</h3>
					</div>
					<div class="section_content__item">
						<div class="system__description">①ボトルキープセット：6,000円 <span>（フリータイム）</span><br>
							②ボトルキープセット：5,000円 <span>（120分）</span><br>
							③飲み放題コース　　：6,000円 <span> （90分）</span> <br>
							<div class="system__description_detail">
								ハウスウイスキー、焼酎<br>
								(延長60分3,000円)
							</div>
							※①～③はカラオケ無料<br>
							※①～③はセット付（アイス、ミネラル、炭酸、おつまみ３点、乾きもの）
						</div>
					</div>
				</div>
				<div class="system__wrap">
					<div class="section_content__title_wrap">
						<h3 class="section_content_title">＜初回限定　お試しコース＞</h3>
					</div>
					<div class="section_content__item">
						<div class="system__description">
							<div class="system__description_wrap">
								<div class="system__description_title">飲み放題</div>
								<div class="system__description_item">
									60分　3000円<br>
									ハウスウイスキー、焼酎、<span>カラオケ付き</span><br>
									(延長60分3,000円) <br>
									90分　5000円
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="system__wrap">
					<div class="section_content__title_wrap">
						<h3 class="section_content_title">＜貸し切りコース＞</h3>
					</div>
					<div class="section_content__item">
						<p class="system__description">料金は応相談（6名様〜）</p>

					</div>
				</div>
				<div class="system__wrap system_drink">
					<div class="section_content__title_wrap">
						<h3 class="section_content_title">＜ドリンク＞</h3>
					</div>
					<div class="section_content__item">
						<div class="drink_area">
							<div class="drink_area__wrap">
								<div class="drink_category">
									<div class="drink_category__title">ウィスキー</div>
									<dl class="drink_content">
										<dt class="drink_title">山崎ノンエイジ</dt>
										<dd class="drink_price">17,000円</dd>
										<dt class="drink_title">竹鶴ノンエイジ</dt>
										<dd class="drink_price">12,000円</dd>
										<dt class="drink_title">シーバスリーガル12年</dt>
										<dd class="drink_price">9,000円</dd>
										<dt class="drink_title">IWハーパー</dt>
										<dd class="drink_price">8,000円</dd>
										<dt class="drink_title">スーパーニッカ</dt>
										<dd class="drink_price">8,000円</dd>
										<dt class="drink_title">サントリー角</dt>
										<dd class="drink_price">5,000円</dd>
									</dl>
								</div>
								<div class="drink_category">
									<div class="drink_category__title">焼酎</div>
									<dl class="drink_content">
										<dt class="drink_title">吉四六（麦）</dt>
										<dd class="drink_price">7,000円</dd>
										<dt class="drink_title">古秘　（芋）</dt>
										<dd class="drink_price">6,000円</dd>
										<dt class="drink_title">鳥飼　（米）</dt>
										<dd class="drink_price">8,000円</dd>
									</dl>
								</div>
							</div>
							<div class="drink_area__wrap">
								<div class="drink_category">
									<div class="drink_category__title">ワイン</div>
									<dl class="drink_content">
										<dt class="drink_title">ワインボトル（大）</dt>
										<dd class="drink_price">6,000円〜</dd>
										<dt class="drink_title">ワインボトル（小）</dt>
										<dd class="drink_price">4,000円〜</dd>
									</dl>
								</div>
								<div class="drink_category">
									<div class="drink_category__title">ビール</div>
									<dl class="drink_content">
										<dt class="drink_title">瓶ビール小（スーパードライ）</dt>
										<dd class="drink_price">1,000円</dd>
									</dl>
								</div>
								<div class="drink_category clearfix">
									<div class="drink_category__title">ソフトドリンク</div>
									<dl class="drink_content">
										<dt class="drink_title">ウーロン茶</dt>
										<dd class="drink_price">500円</dd>
										<dt class="drink_title">緑茶</dt>
										<dd class="drink_price">500円</dd>
										<dt class="drink_title">コーラ</dt>
										<dd class="drink_price">500円</dd>
										<dt class="drink_title">トマトジュース</dt>
										<dd class="drink_price">500円</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="food_area">
							<div class="food_wrap">
								<ul class="food">
									<li class="food_title">＜お料理　全品500円＞</li>
									<li class="food_menu">日替わり料理</li>
									<li class="food_menu">チーズ盛り合わせ</li>
									<li class="food_menu">ミックスナッツ</li>
									<li class="food_menu">フルーツ</li>
								</ul>
								<!--
<div class="food_img__wrap"><img class="food_img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/counter.jpg" alt="店内カウンターの写真" /></div>
-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- イベント -->
		<section id="event">
			<div class="section_area">
				<div class="section_title__wrap">
					<div class="section_border"></div>
					<h2 class="section_title">イベント</h2>
				</div>
				<div class="section_event__item">
					<p class="section_content__item__message">ラインでイベントご連絡しますので、ご登録ください。
						ご登録方法はこちら。</p>

					<ul class="event_area">
						<li class="event__item">
							●雨の日スペシャル<br>
							　雨の中のご来店に感謝して、ボトル半額！</li>
						<li class="event__item">●お誕生日月にご来店でワインミニボトルをプレゼント</li>
						<li class="event__item">●ラッキーセブン<br>
							　7本目のボトルはプレゼントしちゃいます。</li>
						<li class="event__item">●11月10日は「ゆう」の日。<br>
							　11月10日は「ゆう」の開店記念日です。 <br>
							　この日は120分飲み放題5,000円<span class="event__span">（税別）。<br>
							</span>　（土日の場合は前日とします）</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- アクセス-->
		<section id="access">
			<div class="section_area">
				<div class="section_title__wrap">
					<div class="section_border"></div>
					<h2 class="section_title">アクセス</h2>
				</div>
				<div class="section_access__item">
					<div class="google_map"><iframe src="https://maps.google.co.jp/maps?output=embed&amp;q=東京都文京区湯島3-37-10太田ビル2F" width="98.64%"></iframe></div>
					<p class="access_content">
						電話番号<br>
						03-6803-2207<span class="tel">※お電話ください。</span>
					</p>
					<p class="access_content">住所<br>
						〒113-0034 <br>
						東京都文京区湯島3-37-10 <span class="address">太田ビル2F</span>
					</p>
					<ul class="near_station">
						<li class="near_station_title">最寄り駅</li>
						<li class="near_station_wrap">
							<dl class="near_station__item">
								<dt class="near_station__route">・東京メトロ　銀座線</dt>
								<dd class="near_station__name">上野広小路駅　徒歩３分</dd>
								<dt class="near_station__route">・東京メトロ　日比谷線</dt>
								<dd class="near_station__name">御徒町駅　　　徒歩５分</dd>
								<dt class="near_station__route">・東京メトロ　千代田線</dt>
								<dd class="near_station__name">湯島駅　　　　徒歩３分</dd>
								<dt class="near_station__route">・JR山手線</dt>
								<dd class="near_station__name">御徒町駅　　　徒歩５分</dd>
								<dt class="near_station__route">・都営大江戸線</dt>
								<dd class="near_station__name">新御徒町駅　　徒歩５分</dd>
							</dl>
						</li>
					</ul>
					<div class="access_map__wrap"><img class="access_map" src="https://www.yushima-snack-you.com/wp-content/uploads/2020/09/yu002_25.png" alt="御徒町駅からの地図" /></div>
					<div class="access_img__area">
						<div class="access_img__wrap">
							<img class="access_img" src="https://www.yushima-snack-you.com/wp-content/uploads/2020/09/yu002_29.png" alt="写真" />
							<p class="access_img__description">曲がり角<br>
								（地図左手より）</p>
						</div>
						<div class="access_img__wrap">
							<img class="access_img" src="https://www.yushima-snack-you.com/wp-content/uploads/2020/09/yu002_31.png" alt="写真" />
							<p class="access_img__description">お店は2F</p>
						</div>
						<div class="access_img__wrap">
							<img class="access_img" src="https://www.yushima-snack-you.com/wp-content/uploads/2020/09/yu002_34.png" alt="写真" />
							<p class="access_img__description">曲がり角<br>
								（地図右手より）</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- お知らせ -->
		<section id="notice">
			<div class="section_area">
				<div class="section_title__wrap">
					<div class="section_border"></div>
					<h2 class="section_title">お知らせ</h2>
				</div>
				<div class="section_notice__item">
					<p class="notice__message">
						●新型コロナウィルス感染対策（2020年8月1日）<br>
						皆様に安心していただくために以下を実施しています。<br>
						１．「東京都の感染防止徹底宣言ステッカー」を掲示済み。<br>
						２．時間を決めて店内喚起<br>
						３．アルコール消毒<br>
						４．アクリル板設置で飛沫対策<br>
						５．マイクにフェイスシールドを付けて飛沫防止<br>
						６．設備のスプレー消毒
					</p>
					<p class="notice__message">
						しばらくの間、人数制限させて頂いております。<br>
						お電話にて予約頂けると嬉しいです。
					</p>
				</div>
			</div>
		</section>
	</main>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/lp001.js"></script>
</body>

</html>
