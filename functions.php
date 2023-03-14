<?php

/**
 * File này sẽ được gọi mỗi lần load page (mọi page)
 */

define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');

// Add file /core/init.php
require_once(CORE . '/init.php');

// Setting width for pages
if (!isset($content_width)) {
  $content_width = 620;
}

// Define theme's function
if (!function_exists('nenmongvn_setup')) {
  function nenmongvn_setup()
  {
    // Thiết lập text domain
    $language_folder = THEME_URL . '/languages';
    load_theme_textdomain('tuzakutextdomain', $language_folder);

    // Thêm link RSS lên thẻ <head></head>
    add_theme_support('automatic-feed-links');

    // Thêm post thumbnail, có cái này mới thêm được feature image cho post
    add_theme_support('post-thumbnails');

    // Post format
    add_theme_support('post-formats', array('image', 'video', 'gallery', 'quote', 'link'));

    // Thêm title tag
    add_theme_support('title-tag');

    // Thêm custom background
    $default_background = array('default-color' => '#fc0');
    add_theme_support('custom-background', $default_background);

    // Thêm menu
    register_nav_menu('primary-menu', __('Menu Chính', 'tuzakutextdomain'));

    // Tạo sidebar
    $sidebar = array(
      'name' => __('Main Sidebar', 'tuzakutextdomain'),
      'id' => 'main-sidebar',
      'description' => __('Default Sidebar', 'tuzakutextdomain'),
      'class' => 'main-sidebar',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'
    );
    register_sidebar($sidebar);
  }
  add_action('init', 'nenmongvn_setup');
}

if (!function_exists('nenmongvn_header')) {
  // Viết HTML vào lẫn với PHP như này ghét vc!
  function nenmongvn_header()
  {
?>
    <div class="site-name">
      <?php
      if (is_home()) {
        printf(
          '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
          get_bloginfo('url'),
          get_bloginfo('description'),
          get_bloginfo('sitename')
        );
      } else {
        printf(
          '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
          get_bloginfo('url'),
          get_bloginfo('description'),
          get_bloginfo('sitename')
        );
      }
      ?>
    </div>
    <div class="site-description">
      <?php bloginfo('description') ?>
    </div>
    <?php
  }
}


if (!function_exists('nenmongvn_menu')) {
  function nenmongvn_menu($menu)
  {
    $menu = array(
      'theme_location' => $menu,
      'container' => 'nav',
      'container_class' => $menu
    );
    wp_nav_menu($menu);
  }
}

if (!function_exists('nenmongvn_pagination')) {
  function nenmongvn_pagination()
  {
    if ($GLOBALS['wp_query']->max_num_pages < 2) {
      return ''; // Ko phân trang khi số lượng page < 2
    } else {
    ?>
      <nav class="navigation" role="navigation">
        <?php if (get_previous_posts_link()) { ?>
          <div class="prev"><?php previous_posts_link(__('Newer Posts', 'tuzakutextdomain')) ?></div>
        <?php } ?>
        <?php if (get_next_posts_link()) { ?>
          <div class="next"><?php next_posts_link(__('Older Posts', 'tuzakutextdomain')) ?></div>
        <?php } ?>
      </nav>
<?php
    }
  }
}
