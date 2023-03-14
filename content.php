<?php

/**
 * Dùng để viết vòng lặp tại đây (ex: for post in allPosts...) cho các template khác sẽ dùng
 */
?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <div class="entry-thumbnail">
    <?php nenmongvn_thumbnail('thumbnail') ?>
  </div>
  <div class="entry-header">
    <?php nenmongvn_entry_header() ?>
    <?php nenmongvn_entry_meta() ?>
  </div>
  <div class="entry-content">
    <?php nenmongvn_entry_content() ?>
    <?php is_single() ? nenmongvn_entry_tag() : '' ?>
  </div>
</article>