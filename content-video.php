<?php

/**
 * Dùng để hiển thị post có format = video
 */
?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <div class="entry-header">
    <?php nenmongvn_entry_header() ?>
  </div>
  <div class="entry-content">
    <?php the_content() ?>
    <?php is_single() ? nenmongvn_entry_tag() : '' ?>
  </div>
</article>