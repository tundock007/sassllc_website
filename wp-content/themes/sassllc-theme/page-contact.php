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
                
                <?php sassllc_contact_form_messages(); ?>
                
                <form class="contact-form" action="" method="POST">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <input type="text" name="first_name" placeholder="First Name *" required>
                        <input type="text" name="last_name" placeholder="Last Name *" required>
                    </div>
                    
                    <input type="email" name="email" placeholder="Email Address *" required>
                    
                    <input type="tel" name="phone" placeholder="Phone Number">
                    
                    <select name="subject">
                        <option value="">Select a Subject</option>
                        <option value="general">General Inquiry</option>
                        <option value="tax-prep">Tax Preparation</option>
                        <option value="accounting">Accounting Services</option>
                        <option value="tax-planning">Tax Planning</option>
                        <option value="audit">IRS Audit Help</option>
                        <option value="other">Other</option>
                    </select>
                    
                    <textarea name="message" placeholder="Your Message *" required></textarea>
                    
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Preferred Contact Method</label>
                        <div style="display: flex; gap: 2rem;">
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="radio" name="contact_method" value="email" checked> Email
                            </label>
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="radio" name="contact_method" value="phone"> Phone
                            </label>
                        </div>
                    </div>
                    
                    <input type="hidden" name="contact_form_submit" value="1">
                    
                    <button type="submit" class="btn btn-purple" style="width: 100%;">Send Message</button>
                    
                    <p style="font-size: 0.875rem; color: var(--text-light); margin-top: 1rem; text-align: center;">
                        We typically respond within 24 business hours.
                    </p>
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
