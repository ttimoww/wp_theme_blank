<?php
/*------------------------------------*\
	Custom CSS and JS files
\*------------------------------------*/

function theme_scripts(){
    wp_enqueue_style('bundle', get_template_directory_uri() . '/dist/css/bundle.css', false, '1.1', 'all' );
    wp_enqueue_script('bundle', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), '1.1', true);
}

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

add_theme_support( 'post-thumbnails' );
register_nav_menus(
    array(
      'main_menu' => __( 'Main Menu'),
      'secondary_menu' => __( 'Secondary Menu'),
    )
); 

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

// Add page slug to body class
function add_slug_to_body_class($classes){
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove Admin bar
function remove_admin_bar(){
    return false;
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

add_action('wp_enqueue_scripts', 'theme_scripts');
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

?>
