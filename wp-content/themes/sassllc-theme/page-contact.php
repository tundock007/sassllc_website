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
                        Sunday: Closed<br>
                        <em style="font-size: 0.875rem; color: var(--text-light);">Extended hours available during tax season (January – April)</em>
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
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form_submit'])) {
                    if (!isset($_POST['contact_form_nonce']) || !wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')) {
                        $form_errors[] = 'Security validation failed. Please try again.';
                    } else {
                        $name = sanitize_text_field($_POST['contact_name'] ?? '');
                        $email = sanitize_email($_POST['contact_email'] ?? '');
                        $phone = sanitize_text_field($_POST['contact_phone'] ?? '');
                        $subject = sanitize_text_field($_POST['contact_subject'] ?? '');
                        $message = sanitize_textarea_field($_POST['contact_message'] ?? '');
                        
                        if (empty($name)) $form_errors[] = 'Name is required.';
                        if (empty($email)) {
                            $form_errors[] = 'Email is required.';
                        } elseif (!is_email($email)) {
                            $form_errors[] = 'Please enter a valid email address.';
                        }
                        if (empty($message)) $form_errors[] = 'Message is required.';
                        
                        if (empty($form_errors)) {
                            $to = sassllc_get_company_info('email');
                            $email_subject = 'Contact Form: ' . $subject;
                            $email_body = "Name: $name\n";
                            $email_body .= "Email: $email\n";
                            $email_body .= "Phone: $phone\n\n";
                            $email_body .= "Message:\n$message\n";
                            
                            $headers = array(
                                'From: ' . get_bloginfo('name') . ' <wordpress@' . $_SERVER['HTTP_HOST'] . '>',
                                'Reply-To: ' . $name . ' <' . $email . '>',
                                'Content-Type: text/plain; charset=UTF-8'
                            );
                            
                            if (wp_mail($to, $email_subject, $email_body, $headers)) {
                                $form_submitted = true;
                            } else {
                                $form_errors[] = 'Failed to send message. Please try again or contact us directly.';
                            }
                        }
                    }
                }
                ?>
                
                <?php if ($form_submitted): ?>
                    <div style="background: #d4edda; color: #155724; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #c3e6cb;">
                        <strong>Thank you!</strong> Your message has been sent successfully. We'll get back to you as soon as possible.
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
                
                <form method="post" action="" class="contact-form">
                    <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>
                    
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
                    
                    <button type="submit" name="contact_form_submit" class="btn btn-primary">Send Message</button>
                </form>
                
            </div>
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
