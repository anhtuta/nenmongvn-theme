<?php

/**
 * Template Name: Contact
 */

if (have_posts()) {
  while (have_posts()) {
    the_post(); // Ko có dòng này là nó in ra vô hạn post đó, while loop never stop!
    the_content();
  }
}
