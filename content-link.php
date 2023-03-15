<?php

/**
 * Dùng để hiển thị post có format = link
 */
?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <div class="entry-thumbnail">
    <?php nenmongvn_thumbnail('thumbnail') ?>
  </div>
  <div class="entry-header">
    <?php
    // Cần add custom field 'format_link_url' ở post
    $link = get_post_meta($post->ID, 'format_link_url', true);
    // Cần add custom field 'format_link_description' ở post
    $link_description = get_post_meta($post->ID, 'format_link_description', true);
    ?>
    <h2 class="entry-title">
      <a href="<?php echo $link ?>" target="_blank"><?php echo get_the_title() ?></a>
    </h2>
  </div>
  <div class="entry-content">
    <a href="<?php echo $link ?>" target="_blank"><?php echo $link_description ?></a>
    <?php is_single() ? nenmongvn_entry_tag() : '' ?>
  </div>
</article>