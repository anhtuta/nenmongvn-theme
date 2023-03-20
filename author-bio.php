<div class="entry-footer">
  <div class="author-box">
    <div class="author-avatar">
      <?php echo get_avatar(get_the_author_meta('ID')) ?>
    </div>
    <h3>
      Written by
      <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php echo get_the_author() ?></a>
    </h3>
    <p><?php echo get_the_author_meta('description') ?></p>
  </div>
</div>