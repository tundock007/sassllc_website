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
