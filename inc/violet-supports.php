<?php
/*Violet tags*/
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_image_size('violet-featured', 730, 340, true);
add_image_size('violet-portfolio-image', 362, 407, true);
add_image_size('violet-thumbnail', 250, 300, true);
add_theme_support('html5', array(
  'search-form',
  'comment-form',
  'comment-list',
  'gallery',
  'caption'
));
add_editor_style(array(
  'assets/css/editor-style.css',
  violet_fonts_url()
));
add_theme_support('post-formats', array(
  'aside',
  'image',
  'video',
  'quote',
  'link',
  'gallery',
  'status',
  'audio',
  'chat',
));
add_theme_support('automatic-feed-links');

function violet_header_customiz() {
  $violet_header = array(
    'default-image' => '',
    'random-default' => false,
    'width' => 40,
    'height' => 40,
    'flex-height' => false,
    'flex-width' => false,
    'default-text-color' => 'red',
    'header-text' => false,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
  );
  return $violet_header;
}

add_theme_support('custom-header', violet_header_customiz());

$violet_background = array(
  'default-color' => '#fff',
);
add_theme_support('custom-background', $violet_background);