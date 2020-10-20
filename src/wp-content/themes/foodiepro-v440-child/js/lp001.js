'use strict';
function isSmartPhone() {
  if (window.matchMedia && window.matchMedia('(max-device-width: 768px)').matches) {
    return true;
  } else {
    return false;
  }
}
function toggleNav() {
  var body = document.body;
  var hamburger = document.getElementById('js-hamburger');
  var blackBg = document.getElementById('js-black-bg');
  var nav_area = jQuery('.header_nav');
  var section = jQuery("section");

  hamburger.addEventListener('click', function() {
    body.classList.toggle('nav-open');
    if (body.classList.contains('nav-open')) {
      nav_area.css('display', 'block');
    } else {
      nav_area.css('display','none');
    }
  });
  blackBg.addEventListener('click', function() {
    body.classList.remove('nav-open');
    section.css('display','block');
  });
}

$(function (){
  var body = jQuery('body');
  var $win = $(window);
  var $main = jQuery('main');
  var $nav = jQuery('nav');
  var $sp_area = jQuery('.sp_button');
  var nav_height = $nav.outerHeight()
  var nav_pos = $nav.offset().top
  var $hamburger = jQuery('#js-hamburger');
  var hamburger_height = $hamburger.outerHeight();
  var hamburger_pos = $hamburger.offset().top;
  var fixed_class = 'is_fixed';
  var fixed_class_sp = 'is_fixed_sp';
  var $nav_list_item = jQuery('.nav_list_item');
  var $nav_list_item__href = jQuery('.nav_list_item__href br');
  if (isSmartPhone()) {
    $nav_list_item__href.remove();
  }

  $win.on('load scroll', function() {
    var value = jQuery(this).scrollTop();
    if (value > nav_pos) {
      if (!isSmartPhone()) {
        $nav.addClass(fixed_class);
        $main.css('margin-top', nav_height);
      } else {
        $sp_area.fadeIn();
      }
    } else {
      if (!isSmartPhone()) {
        $nav.removeClass(fixed_class);
        $main.css('margin-top', 0);
      }else {
        $sp_area.fadeOut();
      }
    }
  });
  if (isSmartPhone()) {
    $nav_list_item.on("click", function () {
      body.removeClass("nav-open");
      $nav.css('display', 'none');
    })
  }




});

toggleNav();
