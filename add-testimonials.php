<?php
/**
 * Script to add testimonials to the database
 * 
 * INSTRUCTIONS:
 * 1. Upload this file to your WordPress root directory (where wp-config.php is)
 * 2. Visit: https://your-site.com/add-testimonials.php
 * 3. The testimonials will be added automatically
 * 4. Delete this file after use
 */

// Load WordPress
require_once(dirname(__FILE__) . '/wp-load.php');

// Testimonials to add
$testimonials = [
    [
        'name' => 'Damola Adeyemo',
        'role' => 'Freelance Computer Engineer',
        'content' => 'SASLLC is a wonderful company that has helped me so much with taxes and book keeping. The staff was very accommodating and made sure all my issues got resolved, I highly recommend this for everyone having tax and book keeping related issues.',
        'rating' => 5,
        'email' => 'damola@example.com'
    ],
    [
        'name' => 'Crystal Mcrorey',
        'role' => 'Client',
        'content' => 'Mary was amazing!! She is very knowledgeable, efficient, patient and answered all of my questions and requests. She made the process easy and stress free and had a kind attitude. I would highly recommend using SASLLC\'s services.',
        'rating' => 5,
        'email' => 'crystal@example.com'
    ],
    [
        'name' => 'Susan',
        'role' => 'Client',
        'content' => 'A very efficient company that has helped me through the tax season. They always make the process easy, and are always ready to answer all my questions. I highly recommend Simplified Accounting Solutions LLC for all your tax services.',
        'rating' => 5,
        'email' => 'susan@example.com'
    ],
    [
        'name' => 'Lucille Hernandez',
        'role' => 'Client',
        'content' => 'Been using your services for 3 years now and it\'s always great. The communication is always prompt and it\'s easy to tell what documents I still need to submit on line. My tax returns always get to me quickly once everything is submitted. Thank you!',
        'rating' => 5,
        'email' => 'lucille@example.com'
    ],
    [
        'name' => 'Kareema',
        'role' => 'Client',
        'content' => 'Have been using this service and it\'s always a job well done. Great communication! Will definitely continue to use in the future.',
        'rating' => 5,
        'email' => 'kareema@example.com'
    ]
];

$added_count = 0;
$skipped_count = 0;

foreach ($testimonials as $testimonial) {
    // Check if testimonial with this name already exists
    $existing = get_posts([
        'post_type' => 'testimonial',
        'post_status' => 'any',
        'title' => $testimonial['name'],
        'numberposts' => 1
    ]);
    
    if (!empty($existing)) {
        echo "Skipped: {$testimonial['name']} (already exists)\n";
        $skipped_count++;
        continue;
    }
    
    // Get initials
    $name_parts = explode(' ', $testimonial['name']);
    $initials = '';
    foreach ($name_parts as $part) {
        if (!empty($part)) {
            $initials .= strtoupper($part[0]);
        }
    }
    
    // Create testimonial post
    $post_id = wp_insert_post([
        'post_type' => 'testimonial',
        'post_title' => $testimonial['name'],
        'post_content' => $testimonial['content'],
        'post_status' => 'publish', // Publish directly
        'post_author' => 1
    ]);
    
    if ($post_id && !is_wp_error($post_id)) {
        // Add meta data
        update_post_meta($post_id, '_testimonial_rating', $testimonial['rating']);
        update_post_meta($post_id, '_testimonial_role', $testimonial['role']);
        update_post_meta($post_id, '_testimonial_email', $testimonial['email']);
        update_post_meta($post_id, '_testimonial_initials', $initials);
        
        echo "Added: {$testimonial['name']} (ID: {$post_id})\n";
        $added_count++;
    } else {
        echo "Error adding: {$testimonial['name']}\n";
    }
}

echo "\n=== Summary ===\n";
echo "Added: {$added_count}\n";
echo "Skipped: {$skipped_count}\n";
echo "Total: " . count($testimonials) . "\n";
echo "\n<br><br><strong>SUCCESS!</strong> You can now delete this file (add-testimonials.php).<br>";
echo "View testimonials in WordPress Admin: <a href='/wp-admin/edit.php?post_type=testimonial'>Testimonials</a><br>";
echo "View homepage: <a href='/'>Homepage</a>";
?>
