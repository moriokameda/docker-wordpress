//スムーズスクロール
$(function(){
  // #で始まるa要素をクリックした場合に処理
  $('a[href^="#"]').click(function(){
    // 移動先を0px調整する。0を30にすると30px下にずらすことができる。
    var adjust = 0;
    // スクロールの速度（ミリ秒）
    var speed = 400;
    // アンカーの値取得 リンク先（href）を取得して、hrefという変数に代入
    var href= $(this).attr("href");
    // 移動先を取得 リンク先(href）のidがある要素を探して、targetに代入
    var target = $(href == "#" || href == "" ? 'html' : href);
    // 移動先を調整 idの要素の位置をoffset()で取得して、positionに代入
    var position = target.offset().top + adjust;
    // スムーススクロール linear（等速） or swing（変速）
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
});

$(function() {
	var topBtn = $('.m-back-to-top_pc');
	topBtn.hide();
	//スクロールが100に達したらボタン表示
	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			topBtn.fadeIn();
		} else {
			topBtn.fadeOut();
		}
	});
});

//スライダー
$(function(){
	var setElm = $('.loopSlider'),
	slideSpeed = 4000;

	setElm.each(function(){
		var self = $(this),
		selfWidth = self.innerWidth(),
		findUl = self.find('ul'),
		findLi = findUl.find('li'),
		listWidth = findLi.outerWidth(),
		listCount = findLi.length,
		loopWidth = listWidth * listCount;

		findUl.wrapAll('<div class="loopSliderWrap" />');
		var selfWrap = self.find('.loopSliderWrap');

		if(loopWidth > selfWidth){
			findUl.css({width:loopWidth}).clone().appendTo(selfWrap);
			selfWrap.css({width:loopWidth*2});
			function loopMove(){
				selfWrap.animate({left:'-' + (loopWidth) + 'px'},slideSpeed*listCount,'linear',function(){
					selfWrap.css({left:'0'});
					loopMove();
				});
			};
			loopMove();
		}
	});
});


//徐々にフェードイン
$(function(){
    $(window).scroll(function (){
        $('.fadein').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 400){
                $(this).css('opacity','1');
                $(this).css('transform','translateY(0)');
            }
        });
    });
});

//左からフェードイン
$(function(){
    $(window).scroll(function (){
        $('.fadeinleft').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 200){
                $(this).css('opacity','1');
                $(this).css('transform','translateY(0)');
            }
        });
    });
});



	



