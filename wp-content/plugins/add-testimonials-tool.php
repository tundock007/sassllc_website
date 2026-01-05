<?php
/**
 * Plugin Name: Add Testimonials Tool
 * Description: One-time tool to add client testimonials. Delete this plugin after use.
 * Version: 1.0
 */

// Add admin menu
add_action('admin_menu', 'att_add_menu');
function att_add_menu() {
    add_management_page(
        'Add Testimonials',
        'Add Testimonials',
        'manage_options',
        'add-testimonials-tool',
        'att_admin_page'
    );
}

// Admin page
function att_admin_page() {
    if (isset($_POST['add_testimonials'])) {
        att_add_testimonials();
    }
    ?>
    <div class="wrap">
        <h1>Add Client Testimonials</h1>
        <p>This will add 5 client testimonials to your site.</p>
        
        <form method="post">
            <?php wp_nonce_field('add_testimonials_action', 'add_testimonials_nonce'); ?>
            <input type="submit" name="add_testimonials" class="button button-primary" value="Add Testimonials Now">
        </form>
        
        <h3>Testimonials to be added:</h3>
        <ol>
            <li><strong>Damola Adeyemo</strong> - Freelance Computer Engineer</li>
            <li><strong>Crystal Mcrorey</strong> - Client</li>
            <li><strong>Susan</strong> - Client</li>
            <li><strong>Lucille Hernandez</strong> - Client</li>
            <li><strong>Kareema</strong> - Client</li>
        </ol>
    </div>
    <?php
}

// Add testimonials function
function att_add_testimonials() {
    if (!isset($_POST['add_testimonials_nonce']) || !wp_verify_nonce($_POST['add_testimonials_nonce'], 'add_testimonials_action')) {
        wp_die('Security check failed');
    }
    
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
    
    echo '<div class="notice notice-success"><p><strong>Processing testimonials...</strong></p></div>';
    
    foreach ($testimonials as $testimonial) {
        // Check if testimonial exists
        $existing = get_posts([
            'post_type' => 'testimonial',
            'post_status' => 'any',
            'title' => $testimonial['name'],
            'numberposts' => 1
        ]);
        
        if (!empty($existing)) {
            echo '<div class="notice notice-warning"><p>Skipped: ' . esc_html($testimonial['name']) . ' (already exists)</p></div>';
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
        
        // Create testimonial
        $post_id = wp_insert_post([
            'post_type' => 'testimonial',
            'post_title' => $testimonial['name'],
            'post_content' => $testimonial['content'],
            'post_status' => 'publish',
            'post_author' => get_current_user_id()
        ]);
        
        if ($post_id && !is_wp_error($post_id)) {
            update_post_meta($post_id, '_testimonial_rating', $testimonial['rating']);
            update_post_meta($post_id, '_testimonial_role', $testimonial['role']);
            update_post_meta($post_id, '_testimonial_email', $testimonial['email']);
            update_post_meta($post_id, '_testimonial_initials', $initials);
            
            echo '<div class="notice notice-success"><p>✓ Added: ' . esc_html($testimonial['name']) . '</p></div>';
            $added_count++;
        } else {
            echo '<div class="notice notice-error"><p>✗ Error adding: ' . esc_html($testimonial['name']) . '</p></div>';
        }
    }
    
    echo '<div class="notice notice-info is-dismissible"><p><strong>Summary:</strong><br>';
    echo 'Added: ' . $added_count . '<br>';
    echo 'Skipped: ' . $skipped_count . '<br>';
    echo 'Total: ' . count($testimonials) . '</p>';
    echo '<p><a href="' . admin_url('edit.php?post_type=testimonial') . '" class="button">View Testimonials</a> ';
    echo '<a href="' . home_url() . '" class="button">View Homepage</a></p></div>';
}
