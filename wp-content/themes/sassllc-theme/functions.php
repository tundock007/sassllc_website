<?php
/**
 * Theme Functions
 */

// SMTP Email Configuration
function sassllc_configure_smtp_mailer($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->Port = 587;
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->SMTPAuth = true;
    
    // Replace 'YOUR_GMAIL_APP_PASSWORD' with actual Gmail app password
    $phpmailer->Username = 'simpleacctsolutions@gmail.com'; // Your Gmail address
    $phpmailer->Password = 'czxp wais aadp xzbw'; // Gmail app password
    
    $phpmailer->From = 'simpleacctsolutions@gmail.com';
    $phpmailer->FromName = get_bloginfo('name') . ' Contact Form';
}
add_action('phpmailer_init', 'sassllc_configure_smtp_mailer');

// Override wp_mail from address
function sassllc_mail_from($email) {
    return 'simpleacctsolutions@gmail.com';
}
add_filter('wp_mail_from', 'sassllc_mail_from');

function sassllc_mail_from_name($name) {
    return get_bloginfo('name') . ' Contact Form';
}
add_filter('wp_mail_from_name', 'sassllc_mail_from_name');

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

// Register custom post type for contact form submissions
function sassllc_register_contact_submissions() {
    register_post_type('contact_submission', array(
        'labels' => array(
            'name' => 'Contact Submissions',
            'singular_name' => 'Contact Submission',
            'menu_name' => 'Contact Forms',
            'all_items' => 'All Submissions',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-email',
        'capability_type' => 'post',
        'supports' => array('title', 'editor'),
        'menu_position' => 25,
    ));
}
add_action('init', 'sassllc_register_contact_submissions');

// Register custom post type for testimonials
function sassllc_register_testimonials() {
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'menu_name' => 'Testimonials',
            'all_items' => 'All Testimonials',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
            'view_item' => 'View Testimonial',
            'search_items' => 'Search Testimonials',
            'not_found' => 'No testimonials found',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-star-filled',
        'capability_type' => 'post',
        'supports' => array('title', 'editor'),
        'menu_position' => 26,
        'has_archive' => false,
    ));
}
add_action('init', 'sassllc_register_testimonials');

// Add meta boxes for testimonial fields
function sassllc_testimonial_meta_boxes() {
    add_meta_box(
        'testimonial_details',
        'Testimonial Details',
        'sassllc_testimonial_meta_box_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sassllc_testimonial_meta_boxes');

// Meta box callback
function sassllc_testimonial_meta_box_callback($post) {
    wp_nonce_field('sassllc_testimonial_meta_box', 'sassllc_testimonial_meta_box_nonce');
    
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    $role = get_post_meta($post->ID, '_testimonial_role', true);
    $email = get_post_meta($post->ID, '_testimonial_email', true);
    $initials = get_post_meta($post->ID, '_testimonial_initials', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="testimonial_rating">Rating</label></th>
            <td>
                <select name="testimonial_rating" id="testimonial_rating">
                    <?php for ($i = 5; $i >= 1; $i--) : ?>
                        <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>>
                            <?php echo str_repeat('★', $i); ?> (<?php echo $i; ?> stars)
                        </option>
                    <?php endfor; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="testimonial_role">Client Role/Business Type</label></th>
            <td>
                <input type="text" name="testimonial_role" id="testimonial_role" 
                       value="<?php echo esc_attr($role); ?>" class="regular-text">
                <p class="description">e.g., Small Business Owner, Entrepreneur</p>
            </td>
        </tr>
        <tr>
            <th><label for="testimonial_email">Client Email</label></th>
            <td>
                <input type="email" name="testimonial_email" id="testimonial_email" 
                       value="<?php echo esc_attr($email); ?>" class="regular-text" readonly>
                <p class="description">For internal reference only (not displayed publicly)</p>
            </td>
        </tr>
        <tr>
            <th><label for="testimonial_initials">Display Initials</label></th>
            <td>
                <input type="text" name="testimonial_initials" id="testimonial_initials" 
                       value="<?php echo esc_attr($initials); ?>" maxlength="2" style="width: 60px; text-transform: uppercase;">
                <p class="description">1-2 letter initial to display in avatar circle</p>
            </td>
        </tr>
    </table>
    <?php
}

// Save meta box data
function sassllc_save_testimonial_meta_box($post_id) {
    if (!isset($_POST['sassllc_testimonial_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['sassllc_testimonial_meta_box_nonce'], 'sassllc_testimonial_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['testimonial_rating'])) {
        update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
    }
    if (isset($_POST['testimonial_role'])) {
        update_post_meta($post_id, '_testimonial_role', sanitize_text_field($_POST['testimonial_role']));
    }
    if (isset($_POST['testimonial_initials'])) {
        update_post_meta($post_id, '_testimonial_initials', strtoupper(sanitize_text_field($_POST['testimonial_initials'])));
    }
}
add_action('save_post_testimonial', 'sassllc_save_testimonial_meta_box');

// Add custom columns to testimonials list
function sassllc_testimonial_columns($columns) {
    $new_columns = array(
        'cb' => $columns['cb'],
        'title' => 'Client Name',
        'testimonial_rating' => 'Rating',
        'testimonial_role' => 'Role',
        'testimonial_content' => 'Review',
        'date' => 'Date Submitted'
    );
    return $new_columns;
}
add_filter('manage_testimonial_posts_columns', 'sassllc_testimonial_columns');

// Populate custom columns
function sassllc_testimonial_column_content($column, $post_id) {
    switch ($column) {
        case 'testimonial_rating':
            $rating = get_post_meta($post_id, '_testimonial_rating', true);
            echo str_repeat('★', intval($rating));
            break;
        case 'testimonial_role':
            $role = get_post_meta($post_id, '_testimonial_role', true);
            echo $role ? esc_html($role) : '—';
            break;
        case 'testimonial_content':
            $content = get_post_field('post_content', $post_id);
            echo wp_trim_words($content, 15);
            break;
    }
}
add_action('manage_testimonial_posts_custom_column', 'sassllc_testimonial_column_content', 10, 2);

// Add admin notice for pending testimonials
function sassllc_testimonial_admin_notice() {
    $pending_count = wp_count_posts('testimonial')->pending;
    if ($pending_count > 0) {
        ?>
        <div class="notice notice-info">
            <p>
                <strong><?php echo $pending_count; ?> new testimonial<?php echo $pending_count > 1 ? 's' : ''; ?> pending review.</strong>
                <a href="<?php echo admin_url('edit.php?post_type=testimonial&post_status=pending'); ?>">Review now</a>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'sassllc_testimonial_admin_notice');

// Clean up Contact Form 7 if it's in the database but files don't exist
function sassllc_cleanup_missing_plugins() {
    $active_plugins = get_option('active_plugins');
    if ($active_plugins) {
        $plugin_files_exist = array();
        foreach ($active_plugins as $plugin) {
            if (file_exists(WP_PLUGIN_DIR . '/' . $plugin)) {
                $plugin_files_exist[] = $plugin;
            }
        }
        if (count($plugin_files_exist) !== count($active_plugins)) {
            update_option('active_plugins', $plugin_files_exist);
        }
    }
}
add_action('admin_init', 'sassllc_cleanup_missing_plugins');

// Enqueue Scripts and Styles
function sassllc_enqueue_scripts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('sassllc-style', get_stylesheet_uri(), array(), '1.1.' . time());
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
        'email' => 'sasllc@simplifiedacctsolutions.com',
        'location' => 'Waldorf, MD',
        'address' => 'Waldorf, MD',
    );
    
    if ($key && isset($info[$key])) {
        return $info[$key];
    }
    
    return $info;
}

// Contact Form Handler
function sassllc_handle_contact_form() {
    if ($_POST && isset($_POST['contact_form_submit'])) {
        // Sanitize form data
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        $contact_method = sanitize_text_field($_POST['contact_method']);
        
        // Validate required fields
        $errors = array();
        if (empty($first_name)) $errors[] = 'First name is required.';
        if (empty($last_name)) $errors[] = 'Last name is required.';
        if (empty($email) || !is_email($email)) $errors[] = 'Valid email address is required.';
        if (empty($message)) $errors[] = 'Message is required.';
        
        if (empty($errors)) {
            // Prepare email
            $admin_email = get_option('admin_email');
            if (empty($admin_email)) {
                $admin_email = 'tundock007@gmail.com'; // Fallback email
            }
            
            $email_subject = 'New Contact Form Submission - ' . get_bloginfo('name');
            
            $email_body = "New contact form submission:\n\n";
            $email_body .= "Name: {$first_name} {$last_name}\n";
            $email_body .= "Email: {$email}\n";
            $email_body .= "Phone: {$phone}\n";
            $email_body .= "Subject: {$subject}\n";
            $email_body .= "Preferred Contact: {$contact_method}\n\n";
            $email_body .= "Message:\n{$message}\n\n";
            $email_body .= "---\n";
            $email_body .= "Submitted: " . current_time('F j, Y g:i A T') . "\n";
            
            // Set email headers
            $headers = array();
            $headers[] = 'Content-Type: text/html; charset=UTF-8';
            $headers[] = 'From: ' . get_bloginfo('name') . ' <noreply@' . parse_url(home_url(), PHP_URL_HOST) . '>';
            $headers[] = 'Reply-To: ' . $first_name . ' ' . $last_name . ' <' . $email . '>';
            
            // Try to send email with better error handling
            $mail_sent = wp_mail($admin_email, $email_subject, nl2br($email_body), $headers);
            
            if ($mail_sent) {
                // Also try to store in database as backup
                global $wpdb;
                $table_name = $wpdb->prefix . 'contact_submissions';
                
                // Create table if it doesn't exist
                $charset_collate = $wpdb->get_charset_collate();
                $sql = "CREATE TABLE IF NOT EXISTS $table_name (
                    id int(11) NOT NULL AUTO_INCREMENT,
                    first_name varchar(100) NOT NULL,
                    last_name varchar(100) NOT NULL,
                    email varchar(255) NOT NULL,
                    phone varchar(50),
                    subject varchar(255),
                    message text NOT NULL,
                    contact_method varchar(20),
                    submitted_at datetime DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) $charset_collate;";
                
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                dbDelta($sql);
                
                // Insert submission
                $wpdb->insert(
                    $table_name,
                    array(
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'phone' => $phone,
                        'subject' => $subject,
                        'message' => $message,
                        'contact_method' => $contact_method
                    )
                );
                
                wp_redirect(add_query_arg('contact_sent', '1', wp_get_referer()));
                exit;
            } else {
                // Email failed - still store in database
                global $wpdb;
                $table_name = $wpdb->prefix . 'contact_submissions';
                
                $charset_collate = $wpdb->get_charset_collate();
                $sql = "CREATE TABLE IF NOT EXISTS $table_name (
                    id int(11) NOT NULL AUTO_INCREMENT,
                    first_name varchar(100) NOT NULL,
                    last_name varchar(100) NOT NULL,
                    email varchar(255) NOT NULL,
                    phone varchar(50),
                    subject varchar(255),
                    message text NOT NULL,
                    contact_method varchar(20),
                    submitted_at datetime DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                ) $charset_collate;";
                
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                dbDelta($sql);
                
                $wpdb->insert(
                    $table_name,
                    array(
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'phone' => $phone,
                        'subject' => $subject,
                        'message' => $message,
                        'contact_method' => $contact_method
                    )
                );
                
                // Still show success to user even if email failed
                wp_redirect(add_query_arg('contact_sent', '1', wp_get_referer()));
                exit;
            }
        } else {
            wp_redirect(add_query_arg('contact_error', 'validation', wp_get_referer()));
            exit;
        }
    }
}
add_action('init', 'sassllc_handle_contact_form');

// Display contact form messages
function sassllc_contact_form_messages() {
    if (isset($_GET['contact_sent'])) {
        echo '<div class="contact-message success" style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #c3e6cb;">
                <strong>✅ Thank you!</strong> Your message has been received successfully. We\'ll get back to you within 24 hours.
              </div>';
    }
    
    if (isset($_GET['contact_error'])) {
        if ($_GET['contact_error'] === 'validation') {
            echo '<div class="contact-message error" style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #f5c6cb;">
                    <strong>⚠️ Validation Error:</strong> Please check that all required fields are filled out correctly.
                  </div>';
        } else {
            echo '<div class="contact-message error" style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #f5c6cb;">
                    <strong>❌ Error:</strong> There was a technical issue. Your message has been saved and we\'ll contact you soon.
                  </div>';
        }
    }
}

// Admin menu for viewing contact submissions
function sassllc_add_contact_admin_menu() {
    add_menu_page(
        'Contact Submissions',
        'Contact Forms',
        'manage_options',
        'contact-submissions',
        'sassllc_contact_submissions_page',
        'dashicons-email-alt',
        30
    );
}
add_action('admin_menu', 'sassllc_add_contact_admin_menu');

function sassllc_contact_submissions_page() {
    // Query WordPress posts with contact_submission post type
    $submissions = get_posts(array(
        'post_type' => 'contact_submission',
        'post_status' => 'private',
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    
    echo '<div class="wrap">';
    echo '<h1>Contact Form Submissions</h1>';
    
    if (empty($submissions)) {
        echo '<p>No contact submissions found.</p>';
    } else {
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr>';
        echo '<th>Date</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Contact Method</th>';
        echo '</tr></thead>';
        echo '<tbody>';
        
        foreach ($submissions as $submission) {
            $contact_name = get_post_meta($submission->ID, 'contact_name', true);
            $contact_email = get_post_meta($submission->ID, 'contact_email', true);
            $contact_phone = get_post_meta($submission->ID, 'contact_phone', true);
            $contact_subject = get_post_meta($submission->ID, 'contact_subject', true);
            $contact_message = get_post_meta($submission->ID, 'contact_message', true);
            
            echo '<tr>';
            echo '<td>' . date('M j, Y g:i A', strtotime($submission->post_date)) . '</td>';
            echo '<td>' . esc_html($contact_name) . '</td>';
            echo '<td><a href="mailto:' . esc_attr($contact_email) . '">' . esc_html($contact_email) . '</a></td>';
            echo '<td>' . esc_html($contact_subject) . '</td>';
            echo '<td>' . wp_trim_words(esc_html($contact_message), 10) . '</td>';
            echo '<td>email</td>';
            echo '</tr>';
        }
        
        echo '</tbody></table>';
    }
    echo '</div>';
}

// Temporary admin user creation (remove after use)
function create_temp_admin_user() {
    $username = 'admin_temp';
    $password = 'TempAdmin2025!';
    $email = 'tundock007@gmail.com';
    
    if (!username_exists($username) && !email_exists($email)) {
        $user_id = wp_create_user($username, $password, $email);
        
        if (!is_wp_error($user_id)) {
            $user = new WP_User($user_id);
            $user->set_role('administrator');
        }
    }
}
// Uncomment the line below, save, visit your site once, then comment it back out
// add_action('init', 'create_temp_admin_user');
