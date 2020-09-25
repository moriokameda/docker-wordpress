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

jQuery(function(){
  // アコーディオンメニューボタンの上下のアイコン
  jQuery('.sl-btn').click(function() {
    if(jQuery(".cross").hasClass('d-none')){
      jQuery(".cross").removeClass("d-none");
      jQuery(".sl").addClass("d-none");
    } else {
      jQuery(".cross").addClass("d-none");
      jQuery(".sl").removeClass("d-none");
    }
  })
  jQuery('.amb-c').click(function() {
    if(jQuery(".am-c-u").hasClass('d-none')){
      jQuery(".am-c-u").removeClass("d-none");
      jQuery(".am-c-d").addClass("d-none");
    } else {
      jQuery(".am-c-u").addClass("d-none");
      jQuery(".am-c-d").removeClass("d-none");
    }
  })
  jQuery('.amb-r').click(function() {
    if(jQuery(".am-r-u").hasClass('d-none')){
      jQuery(".am-r-u").removeClass("d-none");
      jQuery(".am-r-d").addClass("d-none");
    } else {
      jQuery(".am-r-u").addClass("d-none");
      jQuery(".am-r-d").removeClass("d-none");
    }
  })

  jQuery('a[href^="#"]'+'a:not(".not-scroll")').click(function(){
    var speed = 200;
    var href= jQuery(this).attr("href");
    var target = jQuery(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    jQuery("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
    });

});
