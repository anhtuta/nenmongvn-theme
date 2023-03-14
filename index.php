<?php get_header(); ?>

<h2>Hello world, this is index.php</h2>

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
      nenmongvn_pagination();
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