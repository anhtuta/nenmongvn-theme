<?php

/**
 * Dùng để hiển thị post có format = image
 */
?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <div class="entry-thumbnail">
    <?php nenmongvn_thumbnail('large') ?>
  </div>
  <div class="entry-header">
    <?php nenmongvn_entry_header() ?>
    <?php
    $attachment = get_children(array('post_parent' => $post->ID));
    $attachment_number = count($attachment);
    echo 'This image post contains ' . $attachment_number . ' photos';
    ?>
  </div>
  <div class="entry-content">
    <?php nenmongvn_entry_content() ?>
    <?php is_single() ? nenmongvn_entry_tag() : '' ?>
  </div>
</article>