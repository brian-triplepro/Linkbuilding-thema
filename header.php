<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
  <div class="container flex justify-between items-center">
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
      <button class="close-mobile-menu">X</button>
    </div>
</header>

