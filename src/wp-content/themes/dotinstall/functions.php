<?php

add_theme_support('menus');

register_sidebar(
  array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

add_theme_support('post-thumbnails');

function shotecode_tw() {
  return '<a href="https://twiter.com/taguchi">@testを</a>をフォローしてね！';
}

add_shortcode('tw', 'shotecode_tw');
