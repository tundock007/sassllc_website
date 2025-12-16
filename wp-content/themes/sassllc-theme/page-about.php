<?php
/**
 * Template Name: About Page
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero about-hero" style="padding: 4rem 0;">
    <div class="container">
        <h1>About Simplified Accounting Solutions</h1>
        <p>Dedicated to simplifying your financial life. We believe everyone deserves access to quality accounting services without the complexity.</p>
    </div>
</section>

<!-- Our Story -->
<section style="padding: 5rem 0;">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <h2>Our Story</h2>
            <p style="font-size: 1.125rem; line-height: 1.8;">
                Simplified Accounting Solutions, LLC was founded with a simple mission: to make professional accounting services accessible, understandable, and stress-free for individuals and businesses alike.
            </p>
            <p style="font-size: 1.125rem; line-height: 1.8;">
                We understand that dealing with finances can be overwhelming. Tax codes change constantly, IRS regulations seem deliberately confusing, and managing your books can feel like a full-time job. That's where we come in.
            </p>
            <p style="font-size: 1.125rem; line-height: 1.8;">
                Our team of experienced accounting professionals takes the burden off your shoulders. We translate complex financial matters into plain language, handle the paperwork, and ensure you stay compliant while maximizing your financial potential.
            </p>
            <p style="font-size: 1.125rem; line-height: 1.8;">
                Whether you're an individual trying to navigate tax season, a small business owner focused on growth, or someone facing an IRS audit, we're here to be your trusted financial partner.
            </p>
        </div>
    </div>
</section>

<!-- Mission -->
<section class="mission-box" style="margin: 0;">
    <div class="container">
        <h2>Our Mission</h2>
        <p>
            To simplify accounting for our clients by providing accurate, reliable, and personalized financial services that empower them to make informed decisions and achieve financial peace of mind.
        </p>
    </div>
</section>

<!-- Our Values -->
<section style="padding: 5rem 0; background: var(--background-alt);">
    <div class="container">
        <div class="section-header">
            <h2>Our Core Values</h2>
        </div>
        
        <div class="values-grid">
            <div class="value-card">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🤝</div>
                <h3>Integrity</h3>
                <p>We operate with complete transparency and honesty. Your financial information is handled with the utmost confidentiality and ethical standards.</p>
            </div>
            
            <div class="value-card">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🎯</div>
                <h3>Accuracy</h3>
                <p>We are meticulous in our work. Every number is verified, every form is reviewed, and every filing is double-checked for accuracy.</p>
            </div>
            
            <div class="value-card">
                <div style="font-size: 3rem; margin-bottom: 1rem;">💬</div>
                <h3>Accessibility</h3>
                <p>Accounting shouldn't be intimidating. We explain financial concepts in plain language and are always available to answer your questions.</p>
            </div>
            
            <div class="value-card">
                <div style="font-size: 3rem; margin-bottom: 1rem;">❤️</div>
                <h3>Client-Focused</h3>
                <p>Your success is our success. We take the time to understand your unique situation and provide solutions tailored to your specific needs.</p>
            </div>
            
            <div class="value-card">
                <div style="font-size: 3rem; margin-bottom: 1rem;">📚</div>
                <h3>Continuous Learning</h3>
                <p>Tax laws and regulations evolve constantly. Our team stays current with continuing education to provide you with the most up-to-date guidance.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section style="padding: 5rem 0;">
    <div class="container">
        <div class="section-header">
            <h2>Why Clients Choose Us</h2>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">👨‍💼</div>
                <h3>Experienced Professionals</h3>
                <p>Our team brings years of experience in tax preparation, bookkeeping, and IRS representation. We've seen it all and know how to handle complex situations.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">📅</div>
                <h3>Year-Round Availability</h3>
                <p>Unlike seasonal tax preparers, we're here for you all year long. Have a question in July? Need advice in October? We're just a phone call away.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">💻</div>
                <h3>Technology-Driven</h3>
                <p>We leverage the latest accounting software and secure client portals to make working with us convenient and efficient.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🤝</div>
                <h3>Personalized Attention</h3>
                <p>You're not just a number to us. We take the time to build relationships with our clients and understand their unique financial goals.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">💲</div>
                <h3>Transparent Pricing</h3>
                <p>No surprises. We provide clear, upfront pricing so you know exactly what to expect.</p>
            </div>
        </div>
    </div>
</section>

<!-- Credentials -->
<section style="padding: 5rem 0; background: var(--background-alt);">
    <div class="container">
        <div class="section-header">
            <h2>Our Credentials & Affiliations</h2>
        </div>
        
        <div class="credentials-grid">
            <div class="credential-item">
                <div class="icon">📜</div>
                <span>Licensed Accounting Professionals</span>
            </div>
            <div class="credential-item">
                <div class="icon">🏛️</div>
                <span>IRS Enrolled Agents (EA)</span>
            </div>
            <div class="credential-item">
                <div class="icon">💻</div>
                <span>QuickBooks Certified ProAdvisor</span>
            </div>
            <div class="credential-item">
                <div class="icon">🎓</div>
                <span>CPE Compliant</span>
            </div>
            <div class="credential-item">
                <div class="icon">✅</div>
                <span>Fully Licensed & Insured</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Let's Work Together</h2>
        <p>Ready to experience the Simplified Accounting Solutions difference? Schedule a complimentary consultation to discuss how we can help you achieve your financial goals.</p>
        <div style="margin-top: 2rem;">
            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">Schedule Your Free Consultation</a>
        </div>
        <p style="margin-top: 2rem; color: rgba(255,255,255,0.8);">
            <strong>Phone:</strong> <?php echo sassllc_get_company_info('phone'); ?><br>
            <strong>Email:</strong> <?php echo sassllc_get_company_info('email'); ?><br>
            <strong>Location:</strong> <?php echo sassllc_get_company_info('location'); ?>
        </p>
    </div>
</section>

<?php get_footer(); ?>
