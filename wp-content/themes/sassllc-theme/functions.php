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
            $to = get_option('admin_email'); // WordPress admin email
            $email_subject = 'New Contact Form Submission from ' . $first_name . ' ' . $last_name;
            
            $email_body = "New contact form submission from your website:\n\n";
            $email_body .= "Name: {$first_name} {$last_name}\n";
            $email_body .= "Email: {$email}\n";
            $email_body .= "Phone: {$phone}\n";
            $email_body .= "Subject: {$subject}\n";
            $email_body .= "Preferred Contact: {$contact_method}\n\n";
            $email_body .= "Message:\n{$message}\n\n";
            $email_body .= "---\n";
            $email_body .= "Submitted on: " . current_time('mysql') . "\n";
            $email_body .= "From IP: " . $_SERVER['REMOTE_ADDR'];
            
            $headers = array(
                'Content-Type: text/plain; charset=UTF-8',
                'From: ' . get_bloginfo('name') . ' <noreply@' . $_SERVER['HTTP_HOST'] . '>',
                'Reply-To: ' . $email
            );
            
            // Send email
            if (wp_mail($to, $email_subject, $email_body, $headers)) {
                // Success - redirect to prevent resubmission
                wp_redirect(add_query_arg('contact_sent', '1', wp_get_referer()));
                exit;
            } else {
                // Email failed
                wp_redirect(add_query_arg('contact_error', '1', wp_get_referer()));
                exit;
            }
        } else {
            // Validation errors
            wp_redirect(add_query_arg('contact_error', '1', wp_get_referer()));
            exit;
        }
    }
}
add_action('init', 'sassllc_handle_contact_form');

// Display contact form messages
function sassllc_contact_form_messages() {
    if (isset($_GET['contact_sent'])) {
        echo '<div class="contact-message success" style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #c3e6cb;">
                <strong>Thank you!</strong> Your message has been sent successfully. We\'ll get back to you within 24 hours.
              </div>';
    }
    
    if (isset($_GET['contact_error'])) {
        echo '<div class="contact-message error" style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #f5c6cb;">
                <strong>Error:</strong> There was a problem sending your message. Please try again or contact us directly.
              </div>';
    }
}
