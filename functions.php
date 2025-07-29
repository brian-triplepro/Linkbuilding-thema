<?php
function tailwind_scss_theme_enqueue_styles() {
    wp_enqueue_script('tailwindcdn', 'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4', [],  null, false );
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], filemtime(get_template_directory() . '/assets/js/main.js'), true );
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond&family=Tinos&display=swap', [], null );
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', [], filemtime(get_template_directory() . '/assets/css/main.css') );
}

add_action('wp_enqueue_scripts', 'tailwind_scss_theme_enqueue_styles');

function linkbuilding_setup() {
  add_theme_support('post-thumbnails');
  register_nav_menus([
    'top-menu' => __('Hoofdmenu'),
    'category-menu' => __('Categorie Menu'),
    'footer-menu' => __('Footer Menu')
  ]);
}
add_action('after_setup_theme', 'linkbuilding_setup');

function thema_instellingen_bij_activatie() {
 
  $home = get_page_by_title('Home');
  if (!$home) {
    $home_id = wp_insert_post(array(
      'post_title'    => 'Home',
      'post_status'   => 'publish',
      'post_type'     => 'page',
    ));
  } else {
    $home_id = $home->ID;
  }

  
  $blog = get_page_by_title('Blogs');
  if (!$blog) {
    $blog_id = wp_insert_post(array(
      'post_title'    => 'Blogs',
      'post_status'   => 'publish',
      'post_type'     => 'page',
    ));
  } else {
    $blog_id = $blog->ID;
  }

  $linkpartners = get_page_by_title('Linkpartners');
  if (!$linkpartners) {
    $linkpartners_id = wp_insert_post(array(
      'post_title'    => 'Linkpartners',
      'post_status'   => 'publish',
      'post_type'     => 'page',
    ));
  } else {
    $linkpartners_id = $linkpartners->ID;
  }


  update_option('show_on_front', 'page');
  update_option('page_on_front', $home_id);
  update_option('page_for_posts', $blog_id);

  global $wp_rewrite;

    update_option('permalink_structure', '/%category%/%postname%/');
    $wp_rewrite->set_permalink_structure('/%category%/%postname%/');
    $wp_rewrite->flush_rules();

}

add_action('after_switch_theme', 'thema_instellingen_bij_activatie');

include_once get_template_directory() . '/assets/acf/acf-fields.php';

add_filter('site_transient_update_themes', function ($transient) {
    if (empty($transient->checked)) return $transient;

    $theme_slug = 'linkbuilding-thema-main';
    $theme = wp_get_theme($theme_slug);

    $github_css_url = 'https://raw.githubusercontent.com/brian-triplepro/Linkbuilding-thema/main/style.css';
    $zip_url = 'https://github.com/brian-triplepro/Linkbuilding-thema/archive/refs/heads/main.zip';

    $response = wp_remote_get($github_css_url);

    if (is_wp_error($response)) return $transient;

    $remote_css = wp_remote_retrieve_body($response);

    if (preg_match('/Version:\s*([0-9.]+)/i', $remote_css, $matches)) {
        $remote_version = trim($matches[1]);

        if (version_compare($theme->get('Version'), $remote_version, '<')) {
            $transient->response[$theme_slug] = [
                'theme'       => $theme_slug,
                'new_version' => $remote_version,
                'url'         => 'https://github.com/brian-triplepro/linkbuilding-thema', // info-pagina
                'package'     => $zip_url,
            ];
        }
    }

    return $transient;
});

add_filter('auto_update_theme', function ($should_update, $item) {
    $theme_slug = 'linkbuilding-thema-main';
    $slug = $item->slug ?? $item->theme ?? null;

    if ($slug === $theme_slug) {
        return true; 
    }

    return $should_update;
}, 10, 2);
?>
