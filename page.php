<?php

/**
 * Hiển thị nội dung cho từng page
 * Hiện tại clone từ single.php
 */

?>
<?php get_header(); ?>

<div class="content">
  <div class="main-content">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
        // Lấy nội dung file content-$format.php chèn vào đây,
        // nếu post hiện tại ko có format, nó sẽ lấy file content.php
        get_template_part('content', get_post_format());
      }
    } else {
      // Chèn file content-none.php vào đây
      get_template_part('content', 'none');
    }
    ?>
  </div>
  <div class="sidebar">
    <?php get_sidebar() ?>
  </div>
</div>

<?php get_footer() ?>