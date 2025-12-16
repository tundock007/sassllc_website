<?php
/**
 * Theme Functions
 */

// Theme Setup
function sassllc_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'sassllc'),
        'footer' => __('Footer Menu', 'sassllc'),
    ));
}
add_action('after_setup_theme', 'sassllc_theme_setup');

// Enqueue Scripts and Styles
function sassllc_enqueue_scripts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('sassllc-style', get_stylesheet_uri(), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'sassllc_enqueue_scripts');

// Create pages on theme activation
function sassllc_create_pages() {
    $pages = array(
        'home' => array(
            'title' => 'Home',
            'template' => 'front-page.php'
        ),
        'services' => array(
            'title' => 'Services',
            'template' => 'page-services.php'
        ),
        'about' => array(
            'title' => 'About Us',
            'template' => 'page-about.php'
        ),
        'contact' => array(
            'title' => 'Contact',
            'template' => 'page-contact.php'
        )
    );
    
    foreach ($pages as $slug => $page) {
        $existing = get_page_by_path($slug);
        if (!$existing) {
            $page_id = wp_insert_post(array(
                'post_title' => $page['title'],
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => ''
            ));
            
            if ($page_id && isset($page['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }
        }
    }
    
    // Set homepage
    $home_page = get_page_by_path('home');
    if ($home_page) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_page->ID);
    }
}
add_action('after_switch_theme', 'sassllc_create_pages');

// Company Info
function sassllc_get_company_info($key = '') {
    $info = array(
        'name' => 'Simplified Accounting Solutions, LLC',
        'short_name' => 'SASS LLC',
        'tagline' => 'Your Voice at the IRS',
        'phone' => '(301) 804-8333',
        'email' => 'info@sassllc.com',
        'location' => 'Waldorf, MD',
        'address' => 'Waldorf, MD',
    );
    
    if ($key && isset($info[$key])) {
        return $info[$key];
    }
    
    return $info;
}
