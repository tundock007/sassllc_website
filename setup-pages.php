<?php
/**
 * Direct database script to create service pages
 * Visit: your-site/setup-pages.php
 */

// Database credentials from environment
$host = getenv('WORDPRESS_DB_HOST') ?: 'localhost';
$user = getenv('WORDPRESS_DB_USER') ?: 'root';
$pass = getenv('WORDPRESS_DB_PASSWORD') ?: '';
$db = getenv('WORDPRESS_DB_NAME') ?: 'wordpress';

// Connect to database
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo '<!DOCTYPE html><html><head><title>Setup Service Pages</title></head><body>';
echo '<h1>Creating Service Pages</h1><ul>';

// Get Services parent page ID
$result = $conn->query("SELECT ID FROM wp_posts WHERE post_name = 'services' AND post_type = 'page' LIMIT 1");
if (!$result || $result->num_rows == 0) {
    die('<li style="color:red;">Error: Services page not found</li></ul></body></html>');
}
$parent_id = $result->fetch_assoc()['ID'];

// Pages to create
$pages = [
    ['title' => 'Business Registration', 'slug' => 'business-registration', 'template' => 'page-business-registration.php'],
    ['title' => 'Accounting & Bookkeeping', 'slug' => 'accounting-bookkeeping', 'template' => 'page-accounting-bookkeeping.php'],
    ['title' => 'Tax Preparation', 'slug' => 'tax-preparation', 'template' => 'page-tax-preparation.php'],
    ['title' => 'IRS Resolution', 'slug' => 'irs-resolution', 'template' => 'page-irs-resolution.php']
];

foreach ($pages as $page) {
    // Check if page exists
    $check = $conn->query("SELECT ID FROM wp_posts WHERE post_name = '{$page['slug']}' AND post_type = 'page'");
    
    if ($check && $check->num_rows > 0) {
        $existing_id = $check->fetch_assoc()['ID'];
        echo "<li><strong>{$page['title']}</strong>: Already exists (ID: {$existing_id})</li>";
        continue;
    }
    
    // Insert page
    $sql = "INSERT INTO wp_posts (
        post_author, post_date, post_date_gmt, post_content, post_title, 
        post_status, post_name, post_parent, post_type, comment_status, ping_status
    ) VALUES (
        1, NOW(), UTC_TIMESTAMP(), '', '{$page['title']}',
        'publish', '{$page['slug']}', {$parent_id}, 'page', 'closed', 'closed'
    )";
    
    if ($conn->query($sql)) {
        $page_id = $conn->insert_id;
        
        // Set template
        $conn->query("INSERT INTO wp_postmeta (post_id, meta_key, meta_value) 
                     VALUES ({$page_id}, '_wp_page_template', '{$page['template']}')");
        
        echo "<li><strong>{$page['title']}</strong>: Created successfully (ID: {$page_id})</li>";
    } else {
        echo "<li><strong>{$page['title']}</strong>: Error - " . $conn->error . "</li>";
    }
}

$conn->close();

echo '</ul>';
echo '<p><strong>✓ Done!</strong> Your service pages are now live.</p>';
echo '<p><a href="/services">View Services Page</a> | <a href="/services/business-registration">Test Business Registration</a></p>';
echo '<p style="color:red;"><strong>IMPORTANT:</strong> Delete this file (setup-pages.php) now for security!</p>';
echo '</body></html>';
?>
