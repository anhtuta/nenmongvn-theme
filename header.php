<?php

/**
 * Hiển thị header cho từng page, nếu muốn hiển thị header cho 1 page cụ thể: (ex: shop)
 * - Hãy tạo file: header-shop.php
 * - Gọi hàm get_header('shop')
 * 
 * Note: Ko cần thẻ title nữa, nó sẽ được thêm ở nenmongvn_setup <title>Document</title>
 */
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
  <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
  <div class="container">
    <div class="logo">
      <?php nenmongvn_header() ?>
      <?php nenmongvn_menu('primary-menu') ?>
    </div>

    <!-- Thẻ đóng sẽ được viết ở file footer.php -->