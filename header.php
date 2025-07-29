<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
  $text_color = get_field('text_color', 'option');
  $bg_color = get_field('bg_color', 'option');
  $btn_color = get_field('btn_color', 'option');
  $container_width = get_field('container_width', 'option');
?>

<style>
  :root {
      --text-color: <?= esc_attr($text_color ?: '#807045'); ?>;
      --bg-color: <?= esc_attr($bg_color ?: '#fbf7f1'); ?>;
      --btn-color: <?= esc_attr($btn_color ?: '#cc7d47'); ?>;
      --container-width: <?= esc_attr($container_width ?: '1300px'); ?>;
  }
</style>

<header>
  <div class="container flex justify-between items-center top-bar">
    <div class="logo">
    <a href="<?php echo home_url(); ?>">
      <?php 
        $header_logo = get_field('header_logo', 'option');

         // Debugging line to check the value of $header_logo

        if ($header_logo) {
            echo '<img src="' . esc_url($header_logo) . '" alt="Header logo" class="h-20">';
        } else {
            echo bloginfo('name');
        }        
      ?>
    </a>
    </div>
    <div class="hidden lg:block"><?php wp_nav_menu(['theme_location' => 'top-menu',  'container_class' => 'hoofdmenu']); ?></div>
    <div class="lg:hidden">
      <button class="menu-toggle">
        <span class="menu-icon">
            <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
              <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6H20M4 12H20M4 18H20"/>
           </svg>
        </span>
      </button>
    </div>
  </div> 
    <div class="container hidden lg:block"><?php wp_nav_menu(['theme_location' => 'category-menu', 'container_class' => 'categorie-menu']); ?></div>


   <div class="mobile-menu-sidebar">
      <div id="mobile-menu" class="mobile-menu-content">
        <?php wp_nav_menu(['theme_location' => 'top-menu', 'container_class' => 'mobile-hoofdmenu']); ?>
        <?php wp_nav_menu(['theme_location' => 'category-menu', 'container_class' => 'mobile-categorie-menu']); ?>
      </div>
      <button class="close-mobile-menu">
        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="24" height="24" fill="white"/>
          <path d="M7 17L16.8995 7.10051" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M7 7.00001L16.8995 16.8995" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
    </div>
</header>

