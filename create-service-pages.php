<?php
/**
 * One-time script to create service child pages
 * Access via: your-site.up.railway.app/create-service-pages.php
 * DELETE THIS FILE after running it once!
 */

// Load WordPress
require_once(__DIR__ . '/wp-load.php');

echo '<!DOCTYPE html><html><head><title>Create Service Pages</title></head><body>';
echo '<h1>Creating Service Pages</h1>';

// Check if WordPress loaded
if (!function_exists('wp_insert_post')) {
    die('<p style="color:red;">Error: WordPress did not load properly.</p></body></html>');
}

// Get the Services parent page ID
$services_page = get_page_by_path('services');
if (!$services_page) {
    die('Error: Services page not found. Please create the Services page first.');
}
$parent_id = $services_page->ID;

// Define the pages to create
$pages = array(
    array(
        'title' => 'Business Registration',
        'slug' => 'business-registration',
        'template' => 'page-business-registration.php'
    ),
    array(
        'title' => 'Accounting & Bookkeeping',
        'slug' => 'accounting-bookkeeping',
        'template' => 'page-accounting-bookkeeping.php'
    ),
    array(
        'title' => 'Tax Preparation',
        'slug' => 'tax-preparation',
        'template' => 'page-tax-preparation.php'
    ),
    array(
        'title' => 'IRS Resolution',
        'slug' => 'irs-resolution',
        'template' => 'page-irs-resolution.php'
    )
);

echo '<h1>Creating Service Pages</h1>';
echo '<ul>';

foreach ($pages as $page_data) {
    // Check if page already exists
    $existing_page = get_page_by_path('services/' . $page_data['slug']);
    
    if ($existing_page) {
        echo '<li><strong>' . $page_data['title'] . '</strong>: Already exists (ID: ' . $existing_page->ID . ')</li>';
        continue;
    }
    
    // Create the page
    $page_id = wp_insert_post(array(
        'post_title' => $page_data['title'],
        'post_name' => $page_data['slug'],
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => $parent_id,
        'post_content' => '', // Content comes from template
    ));
    
    if ($page_id && !is_wp_error($page_id)) {
        // Assign the page template
        update_post_meta($page_id, '_wp_page_template', $page_data['template']);
        echo '<li><strong>' . $page_data['title'] . '</strong>: Created successfully (ID: ' . $page_id . ')</li>';
    } else {
        echo '<li><strong>' . $page_data['title'] . '</strong>: Error creating page</li>';
    }
}

echo '</ul>';
echo '<p><strong>Done!</strong> Please delete this file (create-service-pages.php) for security.</p>';
echo '<p><a href="' . home_url('/services') . '">View Services Page</a></p>';
echo '</body></html>';
?>
