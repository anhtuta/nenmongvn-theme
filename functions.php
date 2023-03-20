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

if (!function_exists('nenmongvn_thumbnail')) {
  function nenmongvn_thumbnail($size)
  {
    // Ko hiển thị thumbnail trong trang single, và chỉ post nào có mới hiển thị
    if (!is_single() && has_post_thumbnail() && !post_password_required() && has_post_format('image')) {
    ?>
      <figure class="post-thumbnail"><?php the_post_thumbnail($size) ?></figure>
    <?php
    }
  }
}

if (!function_exists('nenmongvn_entry_header')) {
  function nenmongvn_entry_header()
  {
    if (is_single()) {
    ?>
      <h1 class="entry-title">
        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
          <?php the_title() ?>
        </a>
      </h1>
    <?php
    } else {
    ?>
      <h2 class="entry-title">
        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
          <?php the_title() ?>
        </a>
      </h2>
    <?php
    }
  }
}

if (!function_exists('nenmongvn_entry_meta')) {
  function nenmongvn_entry_meta()
  {
    if (!is_page()) {
    ?>
      <div class="entry-meta">
        <span class="author">Posted by <?php the_author() ?></span>
        <span class="date">
          <!-- nếu ko truyền format, nó sẽ lấy format từ WP-admin setting  -->
          <?php the_modified_date('d/m/Y H:i') ?>
        </span>
      </div>
<?php
    }
  }
}

// https://youtu.be/x6JMqLL312Q
if (!function_exists('nenmongvn_entry_content')) {
  function nenmongvn_entry_content()
  {
    if (!is_single() && !is_page()) {
      the_excerpt();
    } else {
      the_content();

      // pagination in single, có lẽ cần thêm comment <!-- nextpage --> ở nội dung post,
      // xem thêm youtube, hiện tại t chưa dùng
      $link_pages = array(
        'before' => __('<p>Page: ', 'tuzakutextdomain'),
        'after' => '</p>',
        'nextpagelink' => __('Next Page', 'tuzakutextdomain'),
        'previouspagelink' => __('Previous Page', 'tuzakutextdomain')
      );
      wp_link_pages($link_pages);
    }
  }
}

if (!function_exists('nenmongvn_read_more')) {
  function nenmongvn_read_more()
  {
    return '<a href="' . get_permalink(get_the_ID()) . '">...[Read more]</a>';
  }
}
add_filter('excerpt_more', 'nenmongvn_read_more');

if (!function_exists('nenmongvn_entry_tag')) {
  function nenmongvn_entry_tag()
  {
    if (has_tag()) {
      echo '<div class="entry-tag">';
      echo 'Tags: ' . get_the_tag_list('', ', ');
      echo '</div>';
    }
  }
}
