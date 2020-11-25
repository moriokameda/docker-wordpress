<footer class="footer">
    <p class="followus">FOLLOW US</p>
    <div class='sns clearfix'>
        <a href='https://twitter.com/cbdism1' class='twitter_icon'><i class="fab fa-twitter"></i></a>
        <a href='https://www.instagram.com/cbdism1/' class='instagram_icon'><i class="fab fa-instagram"></i></a>
    </div>
    <ul class="nav">
        <li><a href="/index.php/about-cbd">CBDについて</a></li>
        <li><a href="/index.php/privacy">プライバシーポリシー</a></li>
        <li><a href="/index.php/legal">特定商取引法に基づく表記</a></li>
    </ul>
    <small>&copy;CBDism</small>
</footer>

<div class='fixed-menu'>
    <a href="#page_top">
        <i class="fas fa-arrow-up"></i>
    </a>
</div>

<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
        crossorigin="anonymous"></script>

<!-- Swiper.js -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/swiper/js/swiper.min.js"></script>

<script>
    // スライダー
    var swiper = new Swiper('.slider-category', {
        slidesPerView: 3.3,
        spaceBetween: 20,
        slidesPerGroup: 1,
        // loop: true,
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
        },
    });

    var swiper = new Swiper('.slider-ranking', {
        slidesPerView: 3.3,
        spaceBetween: 20,
        slidesPerGroup: 1,
        // loop: true,
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
            992: {
                slidesPerView: 6,
                spaceBetween: 15,
            },
        },
    });

    jQuery(function () {
        // アコーディオンメニューボタンの上下のアイコン
        jQuery('.sl-btn').click(function () {
            if (jQuery(".cross").hasClass('d-none')) {
                jQuery(".cross").removeClass("d-none");
                jQuery(".sl").addClass("d-none");
            } else {
                jQuery(".cross").addClass("d-none");
                jQuery(".sl").removeClass("d-none");
            }
        })
        jQuery('.amb-c').click(function () {
            if (jQuery(".am-c-u").hasClass('d-none')) {
                jQuery(".am-c-u").removeClass("d-none");
                jQuery(".am-c-d").addClass("d-none");
            } else {
                jQuery(".am-c-u").addClass("d-none");
                jQuery(".am-c-d").removeClass("d-none");
            }
        })
        jQuery('.amb-r').click(function () {
            if (jQuery(".am-r-u").hasClass('d-none')) {
                jQuery(".am-r-u").removeClass("d-none");
                jQuery(".am-r-d").addClass("d-none");
            } else {
                jQuery(".am-r-u").addClass("d-none");
                jQuery(".am-r-d").removeClass("d-none");
            }
        });

        jQuery('a[href^="#"]' + 'a:not(".not-scroll")').click(function () {
            var speed = 200;
            var href = jQuery(this).attr("href");
            var target = jQuery(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top;
            jQuery("html, body").animate({scrollTop: position}, speed, "swing");
            return false;
        });

        // レビュー投稿画面
        jQuery('.review_btn .rounded-pill').click(function () {
            jQuery('.review_form').fadeIn();
        });
        jQuery('.review_cancel-btn, #closeModal').click(function () {
            jQuery('.review_form').fadeOut();
        });
        jQuery(':radio').change(
            function () {
                jQuery('.choice').text(this.value + ' stars');
            }
        );

        // レビューAjax処理
        var ajax_url = "https://cbdism.info/wp-admin/admin-ajax.php";
        var post_id = jQuery("#post_id").val();
        // レビュー一覧取得処理
        jQuery.ajax({
            type: "GET",
            url: ajax_url,
            data: {
                action: 'get_review',
                post_id: post_id
            },

        }).then(function (response) {
            console.log(response);
            var nickname = response.review_author;
            var rate_value = parseInt(response.review_rating);
            var review_comment = response.review_comment;
        }).catch(function (err) {
            console.log(err);
        });

        // レビュー投稿処理
        jQuery(".review_submit_area").click(function () {
            var nickname = jQuery("#nickname").val();
            var rate_value = jQuery(".stars [name=star]:checked").val();
            var review_comment = jQuery('.review_comment').val();
            var post_id = jQuery('#post_id').val();
            jQuery.ajax({
                type: 'POST',
                url: ajax_url,
                data: {
                    'action': 'regist_review',
                    'nickname': nickname,
                    'post_id': post_id,
                    'rate_value': rate_value,
                    'review_comment': review_comment
                }
            }).then(function (response) {
                console.log(response);
                jQuery('.review_post_alert').fadeIn();
            }).catch(function (err) {
                console.log(err);
                window.alert(err);
            });
        });

        jQuery('.close-btn').click(function () {
            jQuery('.review_post_alert').fadeOut();
            jQuery('.review_form').fadeOut();
            window.location.href = '<?php echo get_the_permalink();?>';
        });

    });

</script>
<?php wp_footer(); ?>
</body>
</html>
