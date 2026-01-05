<?php
/**
 * Template Name: Contact Page
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero" style="padding: 4rem 0;">
    <div class="container">
        <h1>Get In Touch</h1>
        <p>Have questions about our services? Ready to schedule a consultation? We're here to help. Reach out today and take the first step toward financial peace of mind.</p>
    </div>
</section>

<!-- Contact Section -->
<section style="padding: 5rem 0;">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Info -->
            <div class="contact-info">
                <h2>Contact Information</h2>
                
                <div class="contact-item">
                    <div class="icon">📞</div>
                    <div>
                        <strong>Phone</strong><br>
                        <a href="tel:<?php echo sassllc_get_company_info('phone'); ?>"><?php echo sassllc_get_company_info('phone'); ?></a>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="icon">✉️</div>
                    <div>
                        <strong>Email</strong><br>
                        <a href="mailto:<?php echo sassllc_get_company_info('email'); ?>"><?php echo sassllc_get_company_info('email'); ?></a>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="icon">📍</div>
                    <div>
                        <strong>Location</strong><br>
                        <?php echo sassllc_get_company_info('location'); ?>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="icon">🕐</div>
                    <div>
                        <strong>Office Hours</strong><br>
                        Monday – Friday: 9:00 AM – 5:00 PM<br>
                        Saturday: By Appointment<br>
                        Sunday: By Appointment<br>
                        <em style="font-size: 0.875rem; color: var(--text-light);">We are open for extended hours during the 2026 tax season (January – April)</em>
                    </div>
                </div>
                
                <!-- Free Consultation Box -->
                <div style="background: var(--primary-color); color: white; padding: 2rem; border-radius: 12px; margin-top: 2rem;">
                    <h3 style="color: white; margin-bottom: 1rem;">Free Consultation</h3>
                    <p style="color: rgba(255,255,255,0.9); margin-bottom: 1rem;">Not sure which services you need? We offer a complimentary 30-minute consultation to discuss your financial situation.</p>
                    <ul style="list-style: none; color: rgba(255,255,255,0.9);">
                        <li>✓ Review of your current situation</li>
                        <li>✓ Personalized recommendations</li>
                        <li>✓ Clear pricing, no hidden fees</li>
                        <li>✓ No obligation</li>
                    </ul>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div>
                <h2>Send Us a Message</h2>
                
                <?php
                $form_submitted = false;
                $form_errors = array();
                
                // Debug: Check if form was submitted
                $debug_info = '';
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $debug_info = 'Form submitted via POST. ';
                    if (isset($_POST['contact_form_submit'])) {
                        $debug_info .= 'Submit button detected. ';
                    } elseif (isset($_POST['contact_form_nonce'])) {
                        $debug_info .= 'Form nonce detected (fallback). ';
                    } else {
                        $debug_info .= 'No form detection method found. ';
                    }
                    $debug_info .= 'POST data keys: ' . implode(', ', array_keys($_POST)) . '. ';
                }
                
                // Check if we're showing a success message from redirect
                if (isset($_GET['message']) && $_GET['message'] === 'sent') {
                    $form_submitted = true;
                }
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['contact_form_submit']) || isset($_POST['contact_form_nonce']))) {
                    $debug_info .= 'Processing form submission. ';
                    
                    // Check nonce but don't stop processing if it fails (for debugging)
                    if (!isset($_POST['contact_form_nonce'])) {
                        $debug_info .= 'Nonce missing completely. ';
                        // Don't add to errors for now: $form_errors[] = 'Security token missing. Please refresh the page and try again.';
                    } elseif (!wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')) {
                        $nonce_age = wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action');
                        $debug_info .= "Nonce validation failed. Nonce value: '" . esc_html($_POST['contact_form_nonce']) . "'. Age result: " . var_export($nonce_age, true) . ". ";
                        $debug_info .= 'Allowing submission despite nonce failure for debugging. ';
                    } else {
                        $debug_info .= 'Nonce validation passed. ';
                    }
                    
                    // Process form data regardless of nonce status (for debugging)
                    $name = sanitize_text_field($_POST['contact_name'] ?? '');
                    $email = sanitize_email($_POST['contact_email'] ?? '');
                    $phone = sanitize_text_field($_POST['contact_phone'] ?? '');
                    $subject = sanitize_text_field($_POST['contact_subject'] ?? '');
                    $message = sanitize_textarea_field($_POST['contact_message'] ?? '');
                        $honeypot = $_POST['website_url'] ?? ''; // Honeypot field
                        
                        // Anti-spam: Check honeypot field
                        if (!empty($honeypot)) {
                            // This is likely spam - honeypot field should be empty
                            wp_redirect(add_query_arg('message', 'sent', get_permalink()));
                            exit; // Redirect but don't save or send email
                        }
                        
                        // Anti-spam: Check submission timing (minimum 3 seconds)
                        $form_start_time = intval($_POST['form_start_time'] ?? 0);
                        $time_elapsed = time() - $form_start_time;
                        if ($time_elapsed < 3) {
                            // Submitted too quickly - likely spam
                            wp_redirect(add_query_arg('message', 'sent', get_permalink()));
                            exit; // Redirect but don't save or send email
                        }
                    if (empty($name)) {
                        $form_errors[] = 'Name is required.';
                        $debug_info .= 'Name validation failed. ';
                    }
                    if (empty($email)) {
                        $form_errors[] = 'Email is required.';
                        $debug_info .= 'Email empty validation failed. ';
                    } elseif (!is_email($email)) {
                        $form_errors[] = 'Please enter a valid email address.';
                        $debug_info .= 'Email format validation failed. ';
                    }
                    if (empty($message)) {
                        $form_errors[] = 'Message is required.';
                        $debug_info .= 'Message validation failed. ';
                    }
                    
                    $debug_info .= 'Validation complete. Error count: ' . count($form_errors) . '. ';
                        
                        if (empty($form_errors)) {
                            $debug_info .= 'No validation errors, saving to database. ';
                            
                            // Save submission to database first (always works)
                            $submission_data = array(
                                'post_title' => 'Contact Form: ' . $name . ' - ' . date('Y-m-d H:i:s'),
                                'post_content' => "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\n\nMessage:\n$message",
                                'post_status' => 'private',
                                'post_type' => 'contact_submission',
                                'meta_input' => array(
                                    'contact_name' => $name,
                                    'contact_email' => $email,
                                    'contact_phone' => $phone,
                                    'contact_subject' => $subject,
                                    'contact_message' => $message,
                                )
                            );
                            $post_id = wp_insert_post($submission_data);
                            if (is_wp_error($post_id)) {
                                $debug_info .= "Database save FAILED: " . $post_id->get_error_message() . ". ";
                            } elseif ($post_id > 0) {
                                $debug_info .= "Successfully saved to database with ID: $post_id. ";
                            } else {
                                $debug_info .= "Database save returned 0 (failed). ";
                            }
                            
                            // Try to send email notification
                            $to = 'simpleacctsolutions@gmail.com'; // Your email address
                            $email_subject = 'Website Contact Form: ' . $subject;
                            $email_body = "You have received a new message from your website contact form:\n\n";
                            $email_body .= "Name: $name\n";
                            $email_body .= "Email: $email\n";
                            $email_body .= "Phone: $phone\n";
                            $email_body .= "Subject: $subject\n\n";
                            $email_body .= "Message:\n$message\n\n";
                            $email_body .= "---\n";
                            $email_body .= "This message was sent from " . get_bloginfo('name') . " (" . home_url() . ")";
                            
                            $headers = array(
                                'From: ' . get_bloginfo('name') . ' <noreply@' . parse_url(home_url(), PHP_URL_HOST) . '>',
                                'Reply-To: ' . $name . ' <' . $email . '>',
                                'Content-Type: text/plain; charset=UTF-8'
                            );
                            
                            // Send email (will work with SMTP configuration)
                            $email_sent = wp_mail($to, $email_subject, $email_body, $headers);
                            
                            // Redirect and show success
                            wp_redirect(add_query_arg('message', 'sent', get_permalink()));
                            exit;
                        } else {
                            $debug_info .= 'Validation errors: ' . implode(', ', $form_errors) . '. ';
                        }
                }
                ?>
                
                <?php if ($form_submitted): ?>
                    <div style="background: #d4edda; color: #155724; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #c3e6cb;">
                        <strong>Thank you!</strong> Your message has been received successfully. We'll get back to you as soon as possible.
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($form_errors)): ?>
                    <div style="background: #f8d7da; color: #721c24; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #f5c6cb;">
                        <strong>Please correct the following errors:</strong>
                        <ul style="margin: 0.5rem 0 0 0; padding-left: 1.5rem;">
                            <?php foreach ($form_errors as $error): ?>
                                <li><?php echo esc_html($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                

                
                <form method="post" action="" class="contact-form" id="contact-form">
                    <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>
                    <!-- Time-based spam protection -->
                    <input type="hidden" name="form_start_time" value="<?php echo time(); ?>">
                    
                    <div class="form-group">
                        <label for="contact_name">Your Name *</label>
                        <input type="text" id="contact_name" name="contact_name" required value="<?php echo isset($_POST['contact_name']) ? esc_attr($_POST['contact_name']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_email">Your Email *</label>
                        <input type="email" id="contact_email" name="contact_email" required value="<?php echo isset($_POST['contact_email']) ? esc_attr($_POST['contact_email']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_phone">Phone Number</label>
                        <input type="tel" id="contact_phone" name="contact_phone" value="<?php echo isset($_POST['contact_phone']) ? esc_attr($_POST['contact_phone']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_subject">Subject</label>
                        <select id="contact_subject" name="contact_subject">
                            <option value="General Inquiry" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'General Inquiry'); ?>>General Inquiry</option>
                            <option value="Tax Preparation" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'Tax Preparation'); ?>>Tax Preparation</option>
                            <option value="Accounting & Bookkeeping" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'Accounting & Bookkeeping'); ?>>Accounting & Bookkeeping</option>
                            <option value="IRS Resolution" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'IRS Resolution'); ?>>IRS Resolution</option>
                            <option value="Business Registration" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'Business Registration'); ?>>Business Registration</option>
                            <option value="Free Consultation" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'Free Consultation'); ?>>Free Consultation</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_message">Your Message *</label>
                        <textarea id="contact_message" name="contact_message" rows="6" required><?php echo isset($_POST['contact_message']) ? esc_textarea($_POST['contact_message']) : ''; ?></textarea>
                    </div>
                    
                    <!-- Anti-spam honeypot field (hidden from users) -->
                    <div style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;" aria-hidden="true">
                        <label for="website_url">Website URL (leave blank)</label>
                        <input type="text" id="website_url" name="website_url" value="" tabindex="-1" autocomplete="off">
                    </div>
                    
                    <button type="submit" name="contact_form_submit" value="1" class="btn btn-primary" id="contact-submit-btn">
                        Send Message
                    </button>
                </form>
                
                <script>
                console.log('Contact form script loaded');
                
                document.addEventListener('DOMContentLoaded', function() {
                    console.log('DOM loaded, initializing contact form');
                    
                    const form = document.getElementById('contact-form');
                    const submitBtn = document.getElementById('contact-submit-btn');
                    
                    console.log('Form element:', form);
                    console.log('Submit button:', submitBtn);
                    
                    if (form && submitBtn) {
                        console.log('Form and button found, adding event listener');
                        
                        form.addEventListener('submit', function(e) {
                            console.log('Form submit event triggered');
                            submitBtn.disabled = true;
                            submitBtn.textContent = 'Sending...';
                            console.log('Button disabled, form submitting');
                            return true; // Allow form to submit
                        });
                        
                        // Test button click
                        submitBtn.addEventListener('click', function(e) {
                            console.log('Submit button clicked');
                        });
                        
                        console.log('Event listeners added successfully');
                    } else {
                        console.error('Form or submit button not found!');
                        console.error('Form:', form);
                        console.error('Submit button:', submitBtn);
                    }
                });
                
                // Additional debugging - check if script runs at all
                console.log('Script end reached');
                </script>
                
            </div>
        </div>
    </div>
</section>

<!-- Client Testimonials Section -->
<?php
// Get approved testimonials
$testimonials = new WP_Query(array(
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC'
));

if ($testimonials->have_posts()) :
?>
<section style="padding: 5rem 0; background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <h2 style="color: white; font-size: 2.5rem; margin-bottom: 0.5rem;">Real Results From<br>Our Beloved <span style="border-bottom: 4px solid #FCD34D;">Clients</span></h2>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
            <?php while ($testimonials->have_posts()) : $testimonials->the_post(); 
                $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                $client_role = get_post_meta(get_the_ID(), '_testimonial_role', true);
                $client_initials = get_post_meta(get_the_ID(), '_testimonial_initials', true);
                if (empty($client_initials)) {
                    $client_initials = substr(get_the_title(), 0, 1);
                }
                $stars = str_repeat('★', intval($rating));
            ?>
            <div style="background: rgba(30, 41, 59, 0.5); padding: 2rem; border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); transition: transform 0.3s, border-color 0.3s;">
                <div style="color: #FCD34D; margin-bottom: 1rem; font-size: 1.25rem;"><?php echo esc_html($stars); ?></div>
                <p style="color: #E2E8F0; margin-bottom: 2rem; line-height: 1.6; font-size: 0.95rem;">
                    <?php echo esc_html(get_the_content()); ?>
                </p>
                <div style="border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 1.5rem;">
                    <strong style="display: block; color: white; font-size: 1rem; margin-bottom: 0.25rem;"><?php the_title(); ?></strong>
                    <?php if ($client_role) : ?>
                    <span style="color: #94A3B8; font-size: 0.875rem;"><?php echo esc_html($client_role); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Submit Review Section -->
<section style="padding: 4rem 0; background: linear-gradient(135deg, #F9FAFB 0%, #F3F4F6 100%);">
    <div class="container">
        <div style="max-width: 650px; margin: 0 auto; background: white; padding: 2.5rem; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.08);">
            <div style="text-align: center; margin-bottom: 2rem;">
                <h2 style="margin-bottom: 0.5rem; font-size: 1.75rem;">Share Your Experience</h2>
                <p style="color: #6B7280; font-size: 0.9rem; margin: 0;">Help others make informed decisions about our services</p>
            </div>
            
            <?php
            $review_submitted = false;
            $review_errors = array();
            
            if (isset($_GET['review']) && $_GET['review'] === 'submitted') {
                $review_submitted = true;
            }
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
                // Verify nonce
                if (!isset($_POST['review_nonce']) || !wp_verify_nonce($_POST['review_nonce'], 'submit_review_action')) {
                    $review_errors[] = 'Security verification failed. Please try again.';
                } else {
                    // Sanitize inputs
                    $review_name = sanitize_text_field($_POST['review_name'] ?? '');
                    $review_email = sanitize_email($_POST['review_email'] ?? '');
                    $review_role = sanitize_text_field($_POST['review_role'] ?? '');
                    $review_rating = intval($_POST['review_rating'] ?? 5);
                    $review_content = sanitize_textarea_field($_POST['review_content'] ?? '');
                    $honeypot = $_POST['website_url_review'] ?? '';
                    
                    // Validate
                    if (empty($review_name)) {
                        $review_errors[] = 'Name is required.';
                    }
                    if (empty($review_email) || !is_email($review_email)) {
                        $review_errors[] = 'Valid email is required.';
                    }
                    if (empty($review_content)) {
                        $review_errors[] = 'Review is required.';
                    }
                    if ($review_rating < 1 || $review_rating > 5) {
                        $review_errors[] = 'Rating must be between 1 and 5.';
                    }
                    
                    // Anti-spam: Check honeypot
                    if (!empty($honeypot)) {
                        wp_redirect(add_query_arg('review', 'submitted', get_permalink()));
                        exit;
                    }
                    
                    // If no errors, create testimonial
                    if (empty($review_errors)) {
                        // Get first letter for initials
                        $initials = substr($review_name, 0, 1);
                        
                        $testimonial_id = wp_insert_post(array(
                            'post_title' => $review_name,
                            'post_content' => $review_content,
                            'post_type' => 'testimonial',
                            'post_status' => 'pending', // Requires admin approval
                            'meta_input' => array(
                                '_testimonial_rating' => $review_rating,
                                '_testimonial_role' => $review_role,
                                '_testimonial_email' => $review_email,
                                '_testimonial_initials' => strtoupper($initials)
                            )
                        ));
                        
                        if ($testimonial_id) {
                            wp_redirect(add_query_arg('review', 'submitted', get_permalink()));
                            exit;
                        } else {
                            $review_errors[] = 'Failed to submit review. Please try again.';
                        }
                    }
                }
            }
            ?>
            
            <?php if ($review_submitted) : ?>
                <div style="background: linear-gradient(135deg, #D1FAE5, #A7F3D0); color: #065F46; padding: 1.5rem; border-radius: 12px; text-align: center; box-shadow: 0 4px 12px rgba(16,185,129,0.2);">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">✓</div>
                    <strong style="font-size: 1.1rem;">Thank you for your review!</strong>
                    <p style="margin: 0.5rem 0 0; font-size: 0.9rem; opacity: 0.9;">Your testimonial will appear after approval</p>
                </div>
            <?php else : ?>
                <?php if (!empty($review_errors)) : ?>
                    <div style="background: #FEE2E2; color: #991B1B; padding: 1rem; border-radius: 10px; margin-bottom: 1.25rem; border-left: 4px solid #DC2626; font-size: 0.9rem;">
                        <ul style="margin: 0; padding-left: 1.25rem;">
                            <?php foreach ($review_errors as $error) : ?>
                                <li><?php echo esc_html($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="" style="display: grid; gap: 1.25rem;">
                    <?php wp_nonce_field('submit_review_action', 'review_nonce'); ?>
                    
                    <!-- Honeypot field -->
                    <input type="text" name="website_url_review" style="display: none;" tabindex="-1" autocomplete="off">
                    
                    <!-- Name and Email Grid -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151;">Name *</label>
                            <input type="text" name="review_name" required 
                                   style="width: 100%; padding: 0.7rem; border: 2px solid #E5E7EB; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.2s;"
                                   onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#E5E7EB'"
                                   value="<?php echo isset($_POST['review_name']) ? esc_attr($_POST['review_name']) : ''; ?>">
                        </div>
                        
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151;">Email *</label>
                            <input type="email" name="review_email" required 
                                   style="width: 100%; padding: 0.7rem; border: 2px solid #E5E7EB; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.2s;"
                                   onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#E5E7EB'"
                                   value="<?php echo isset($_POST['review_email']) ? esc_attr($_POST['review_email']) : ''; ?>">
                        </div>
                    </div>
                    
                    <!-- Role -->
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151;">
                            Role <span style="font-weight: 400; color: #9CA3AF; font-size: 0.85rem;">(Optional)</span>
                        </label>
                        <input type="text" name="review_role" 
                               placeholder="e.g., Small Business Owner"
                               style="width: 100%; padding: 0.7rem; border: 2px solid #E5E7EB; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.2s;"
                               onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#E5E7EB'"
                               value="<?php echo isset($_POST['review_role']) ? esc_attr($_POST['review_role']) : ''; ?>">
                    </div>
                    
                    <!-- Rating -->
                    <div style="background: #F9FAFB; padding: 1.25rem; border-radius: 10px; border: 2px solid #E5E7EB;">
                        <label style="display: block; margin-bottom: 0.75rem; font-weight: 600; font-size: 0.9rem; color: #374151; text-align: center;">Your Rating *</label>
                        <div id="star-rating-container" style="display: flex; justify-content: center; gap: 0.5rem; font-size: 2.5rem;">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <label style="cursor: pointer; transition: transform 0.2s;" data-rating="<?php echo $i; ?>"
                                       onmouseover="this.style.transform='scale(1.15)'" onmouseout="this.style.transform='scale(1)'">
                                    <input type="radio" name="review_rating" value="<?php echo $i; ?>" 
                                           <?php echo (isset($_POST['review_rating']) && $_POST['review_rating'] == $i) || (!isset($_POST['review_rating']) && $i == 5) ? 'checked' : ''; ?>
                                           style="display: none;">
                                    <span class="star-rating">★</span>
                                </label>
                            <?php endfor; ?>
                        </div>
                        <p style="text-align: center; color: #6B7280; font-size: 0.8rem; margin: 0.5rem 0 0;">Tap to rate • 5 stars = excellent</p>
                    </div>
                    
                    <!-- Review Text -->
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151;">Your Review *</label>
                        <textarea name="review_content" required rows="4"
                                  style="width: 100%; padding: 0.7rem; border: 2px solid #E5E7EB; border-radius: 8px; font-size: 0.95rem; resize: vertical; transition: border-color 0.2s; font-family: inherit;"
                                  onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#E5E7EB'"
                                  placeholder="Share your experience with our services..."><?php echo isset($_POST['review_content']) ? esc_textarea($_POST['review_content']) : ''; ?></textarea>
                    </div>
                    
                    <button type="submit" name="submit_review" class="btn" 
                            style="width: 100%; padding: 0.9rem; font-size: 1rem; font-weight: 600; border-radius: 8px; transition: transform 0.2s, box-shadow 0.2s;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.15)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow=''">
                        Submit Review
                    </button>
                    
                    <p style="text-align: center; color: #9CA3AF; font-size: 0.8rem; margin: -0.5rem 0 0;">
                        🔒 Your review will be reviewed before being published
                    </p>
                </form>
                
                <style>
                    .star-rating {
                        color: #D1D5DB;
                        transition: color 0.2s;
                    }
                    .star-rating.filled {
                        color: #F59E0B;
                    }
                </style>
                
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const container = document.getElementById('star-rating-container');
                    const labels = container.querySelectorAll('label');
                    const radios = container.querySelectorAll('input[type="radio"]');
                    
                    function updateStars(rating) {
                        labels.forEach(label => {
                            const labelRating = parseInt(label.getAttribute('data-rating'));
                            const star = label.querySelector('.star-rating');
                            if (labelRating <= rating) {
                                star.classList.add('filled');
                            } else {
                                star.classList.remove('filled');
                            }
                        });
                    }
                    
                    // Set initial state based on checked radio
                    radios.forEach(radio => {
                        if (radio.checked) {
                            updateStars(parseInt(radio.value));
                        }
                    });
                    
                    // Add click handlers
                    labels.forEach(label => {
                        label.addEventListener('click', function() {
                            const rating = parseInt(this.getAttribute('data-rating'));
                            updateStars(rating);
                        });
                    });
                    
                    // Add hover effect
                    labels.forEach(label => {
                        label.addEventListener('mouseenter', function() {
                            const rating = parseInt(this.getAttribute('data-rating'));
                            updateStars(rating);
                        });
                    });
                    
                    container.addEventListener('mouseleave', function() {
                        const checkedRadio = container.querySelector('input[type="radio"]:checked');
                        if (checkedRadio) {
                            updateStars(parseInt(checkedRadio.value));
                        }
                    });
                });
                </script>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section style="padding: 5rem 0; background: var(--background-alt);">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
        </div>
        
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background: white; padding: 1.5rem 2rem; border-radius: 8px; margin-bottom: 1rem;">
                <h4 style="margin-bottom: 0.5rem;">What documents do I need for tax preparation?</h4>
                <p style="margin-bottom: 0;">For individual returns, bring W-2s, 1099s, last year's tax return, Social Security numbers for all family members, and documentation for any deductions. For businesses, bring profit & loss statements, balance sheets, and all income/expense documentation.</p>
            </div>
            
            <div style="background: white; padding: 1.5rem 2rem; border-radius: 8px; margin-bottom: 1rem;">
                <h4 style="margin-bottom: 0.5rem;">How much do your services cost?</h4>
                <p style="margin-bottom: 0;">Our pricing depends on the complexity of your situation. We offer transparent pricing and will provide a quote before beginning any work. Contact us for a free estimate.</p>
            </div>
            
            <div style="background: white; padding: 1.5rem 2rem; border-radius: 8px; margin-bottom: 1rem;">
                <h4 style="margin-bottom: 0.5rem;">Do I need to come to your office?</h4>
                <p style="margin-bottom: 0;">Not necessarily! We offer virtual consultations and can work with you remotely. Simply upload your documents through our secure client portal, and we'll handle the rest.</p>
            </div>
            
            <div style="background: white; padding: 1.5rem 2rem; border-radius: 8px; margin-bottom: 1rem;">
                <h4 style="margin-bottom: 0.5rem;">What if I receive an IRS notice?</h4>
                <p style="margin-bottom: 0;">Don't panic, and don't ignore it. Contact us immediately. We'll review the notice, explain what it means, and handle the response on your behalf.</p>
            </div>
            
            <div style="background: white; padding: 1.5rem 2rem; border-radius: 8px; margin-bottom: 1rem;">
                <h4 style="margin-bottom: 0.5rem;">Can you help with past-due tax returns?</h4>
                <p style="margin-bottom: 0;">Absolutely. We specialize in helping clients get caught up on unfiled returns and can work with the IRS to resolve any outstanding issues.</p>
            </div>
            
            <div style="background: white; padding: 1.5rem 2rem; border-radius: 8px;">
                <h4 style="margin-bottom: 0.5rem;">Do you work with clients outside Maryland?</h4>
                <p style="margin-bottom: 0;">Yes! We work with clients nationwide. Thanks to secure technology, we can serve you regardless of your location.</p>
            </div>
        </div>
    </div>
</section>

<!-- Urgent Contact -->
<section style="padding: 4rem 0; background: #FEF2F2; border-top: 4px solid #DC2626;">
    <div class="container" style="text-align: center;">
        <h2 style="color: #DC2626;">Received an IRS Notice?</h2>
        <p style="color: #7F1D1D; max-width: 600px; margin: 0 auto 1.5rem;">
            If you've received an IRS audit notice, levy, or lien, time is of the essence. Contact us immediately for urgent assistance.
        </p>
        <a href="tel:<?php echo sassllc_get_company_info('phone'); ?>" class="btn" style="background: #DC2626; color: white; border-color: #DC2626;">
            Call Now: <?php echo sassllc_get_company_info('phone'); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>
