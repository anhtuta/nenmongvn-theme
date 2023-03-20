<?php get_header(); ?>

<div class="content">
  <div class="main-content">
    <div class="archive-title">
      <?php
      if (is_tag()) {
        echo 'Post tagged: ' . single_tag_title('', false); // dùng echo nên phải truyền false, vì nó sẽ return giá trị
      } elseif (is_category()) {
        echo 'Post categorized: ' . single_cat_title('', false);
      } elseif (is_day()) {
        echo 'Daily archives: ' . get_the_time('l, F, j, Y');
      } elseif (is_month()) {
        echo 'Monthly archives: ' . get_the_time('F Y');
      } elseif (is_year()) {
        echo 'Yearly archives: ' . get_the_time('Y');
      }
      ?>
    </div>

    <?php
    if (is_tag() || is_category()) {
    ?>
      <div class="archive-description">
        <?php echo term_description() ?>
      </div>
    <?php
    }
    ?>

    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
        // Lấy nội dung file content-$format.php chèn vào đây, ex: content-link.php, content-video.php...
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