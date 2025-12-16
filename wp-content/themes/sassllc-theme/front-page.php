<?php
/**
 * Template Name: Home Page
 * Front Page Template
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <span class="hero-badge"><?php echo sassllc_get_company_info('tagline'); ?></span>
        
        <h1>
            SIMPLIFIED ACCOUNTING SOLUTIONS, LLC WELCOMES <span class="highlight">YOU</span>
        </h1>
        
        <p>
            Simplified Accounting Solutions, LLC specializes in a variety of accounting services with outstanding support. We understand how busy you are, and with our expertise we can take care of your accounting needs quickly and effectively. We are equipped to handle the books for you, leaving you to worry less and live more.
        </p>
        
        <div class="hero-buttons">
            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">Get Started →</a>
            <a href="<?php echo home_url('/services'); ?>" class="btn btn-secondary">Learn More →</a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="features">
    <div class="container">
        <div class="section-header">
            <h2>Why Clients Trust Us</h2>
            <p>Experience the difference that professional, personalized accounting services can make.</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">💼</div>
                <h3>Certified Expertise</h3>
                <p>Our team of qualified accounting professionals brings decades of combined experience in tax preparation, financial reporting, and IRS representation.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>Personalized Service</h3>
                <p>We take the time to understand your unique financial situation and provide tailored solutions that fit your individual or business needs.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">✓</div>
                <h3>Accuracy Guaranteed</h3>
                <p>We stand behind our work with meticulous attention to detail, ensuring your financials are accurate and compliant with current tax laws.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🎧</div>
                <h3>Year-Round Support</h3>
                <p>Tax season doesn't end in April. We provide ongoing support and guidance throughout the year to keep you financially healthy.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services" style="background: var(--background-alt);">
    <div class="container">
        <div class="section-header">
            <h2>Our Professional Services</h2>
            <p>Comprehensive financial solutions for individuals and businesses.</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <h3>📚 Bookkeeping Services</h3>
                <p>Maintain accurate financial records with our comprehensive bookkeeping solutions. We handle accounts payable, accounts receivable, bank reconciliation, and financial statement preparation.</p>
                <ul>
                    <li>Accounts Payable & Receivable</li>
                    <li>Bank Reconciliation</li>
                    <li>Financial Statements</li>
                    <li>Payroll Processing</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h3>📋 Tax Preparation & Filing</h3>
                <p>Individual and business tax preparation services designed to maximize your refund and minimize your tax liability.</p>
                <ul>
                    <li>Individual Tax Returns (1040)</li>
                    <li>Business Tax Returns</li>
                    <li>State & Local Returns</li>
                    <li>Amended Returns</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h3>📈 Tax Planning & Strategy</h3>
                <p>Proactive tax planning strategies to help you make informed financial decisions throughout the year.</p>
                <ul>
                    <li>Year-Round Tax Projections</li>
                    <li>Entity Structure Optimization</li>
                    <li>Retirement Planning</li>
                    <li>Capital Gains Planning</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h3>🛡️ IRS Audit Representation</h3>
                <p>Facing an IRS audit? Don't go it alone. Our experienced professionals will represent you before the IRS.</p>
                <ul>
                    <li>Audit Representation</li>
                    <li>Offer in Compromise</li>
                    <li>Penalty Abatement</li>
                    <li>Levy & Lien Release</li>
                </ul>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 3rem;">
            <a href="<?php echo home_url('/services'); ?>" class="btn btn-purple">View All Services →</a>
        </div>
    </div>
</section>

<!-- Credentials Section -->
<section class="credentials">
    <div class="container">
        <div class="section-header">
            <h2>Our Credentials</h2>
        </div>
        
        <div class="credentials-grid">
            <div class="credential-item">
                <div class="icon">🏛️</div>
                <span>Licensed & Insured</span>
            </div>
            <div class="credential-item">
                <div class="icon">📜</div>
                <span>IRS Enrolled Agents</span>
            </div>
            <div class="credential-item">
                <div class="icon">💻</div>
                <span>QuickBooks ProAdvisor</span>
            </div>
            <div class="credential-item">
                <div class="icon">⭐</div>
                <span>15+ Years Experience</span>
            </div>
            <div class="credential-item">
                <div class="icon">👥</div>
                <span>500+ Satisfied Clients</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Simplify Your Finances?</h2>
        <p>Schedule a free consultation today and discover how Simplified Accounting Solutions can help you achieve financial peace of mind.</p>
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">Schedule Your Free Consultation</a>
    </div>
</section>

<!-- Contact Info Bar -->
<section style="background: var(--background-alt); padding: 3rem 0;">
    <div class="container" style="text-align: center;">
        <p style="font-size: 1.25rem; margin-bottom: 0.5rem;">Have questions? We're here to help.</p>
        <p style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 0.5rem;">
            <a href="tel:<?php echo sassllc_get_company_info('phone'); ?>"><?php echo sassllc_get_company_info('phone'); ?></a>
        </p>
        <p style="color: var(--text-light);"><?php echo sassllc_get_company_info('location'); ?></p>
    </div>
</section>

<?php get_footer(); ?>
