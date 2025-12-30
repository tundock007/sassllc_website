<?php
/**
 * Template Name: Home Page
 * Front Page Template
 */

get_header();
?>

<style>
/* Modern Hero Enhancements */
.hero-modern {
    padding: 10rem 0 8rem;
    text-align: center;
    background: linear-gradient(135deg, #0F172A 0%, #1E293B 50%, #0F172A 100%);
    position: relative;
    overflow: hidden;
    color: white;
}

.hero-modern::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle at 30% 50%, rgba(14, 165, 233, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(14, 165, 233, 0.1) 0%, transparent 40%);
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-2%, 2%) rotate(1deg); }
}

.hero-modern::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 150px;
    background: linear-gradient(180deg, transparent, white);
}

.hero-modern .container {
    position: relative;
    z-index: 2;
}

.hero-modern .hero-badge {
    background: rgba(14, 165, 233, 0.2);
    border: 1px solid rgba(14, 165, 233, 0.4);
    color: #38BDF8;
}

.hero-modern h1 {
    font-size: 4.5rem;
    color: white;
    margin-bottom: 1.5rem;
    background: none;
    -webkit-text-fill-color: white;
}

.hero-modern h1 .highlight {
    background: linear-gradient(135deg, #0EA5E9, #38BDF8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-modern p {
    color: rgba(255,255,255,0.8);
    font-size: 1.25rem;
    max-width: 700px;
    margin: 0 auto 3rem;
}

.hero-modern .btn-primary {
    background: #0EA5E9;
    border-color: #0EA5E9;
}

.hero-modern .btn-primary:hover {
    background: #38BDF8;
    border-color: #38BDF8;
}

.hero-modern .btn-secondary {
    background: transparent;
    border-color: rgba(255,255,255,0.3);
    color: white;
}

.hero-modern .btn-secondary:hover {
    background: rgba(255,255,255,0.1);
    border-color: white;
}

/* Stats Section */
.stats-section {
    padding: 5rem 0;
    background: white;
    margin-top: -80px;
    position: relative;
    z-index: 10;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    max-width: 800px;
    margin: 0 auto;
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 25px 80px rgba(0,0,0,0.1);
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 3rem;
    font-weight: 800;
    color: #0EA5E9;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #64748B;
    font-size: 0.95rem;
    font-weight: 500;
}

/* Modern Features */
.features-modern {
    padding: 6rem 0;
    background: #F8FAFC;
}

.feature-card-modern {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    border: none;
    box-shadow: 0 4px 20px rgba(0,0,0,0.04);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.feature-card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #0EA5E9, #38BDF8);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.feature-card-modern:hover::before {
    transform: scaleX(1);
}

.feature-card-modern:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.1);
}

.feature-icon-modern {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #E0F2FE, #BAE6FD);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin-bottom: 1.5rem;
}

/* Services Modern */
.services-modern {
    padding: 7rem 0;
    background: white;
}

.service-card-modern {
    background: linear-gradient(135deg, #F8FAFC 0%, #F1F5F9 100%);
    padding: 3rem;
    border-radius: 24px;
    transition: all 0.4s ease;
    border: 1px solid #E2E8F0;
    height: 100%;
}

.service-card-modern:hover {
    background: white;
    box-shadow: 0 30px 80px rgba(0,0,0,0.08);
    border-color: transparent;
    transform: translateY(-5px);
}

.service-card-modern h3 {
    font-size: 1.35rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.service-card-modern h3 span {
    font-size: 1.5rem;
}

/* CTA Modern */
.cta-modern {
    padding: 8rem 0;
    background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
    position: relative;
    overflow: hidden;
}

.cta-modern::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 60%;
    height: 100%;
    background: radial-gradient(ellipse at right, rgba(14, 165, 233, 0.2) 0%, transparent 70%);
}

.cta-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.cta-modern h2 {
    font-size: 3rem;
    color: white;
    margin-bottom: 1.5rem;
}

.cta-modern p {
    color: rgba(255,255,255,0.8);
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto 2.5rem;
}

.cta-modern .btn {
    padding: 1.25rem 3rem;
    font-size: 1.1rem;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-modern {
        padding: 6rem 0 5rem;
    }
    
    .hero-modern h1 { 
        font-size: 2rem;
        line-height: 1.2;
    }
    
    .hero-modern p {
        font-size: 1rem;
        padding: 0 1rem;
    }
    
    .stats-section {
        margin-top: -50px;
        padding: 3rem 0;
    }
    
    .stats-grid { 
        grid-template-columns: repeat(3, 1fr);
        padding: 2rem 1.5rem;
        gap: 1rem;
    }
    
    .stat-number { 
        font-size: 1.5rem; 
    }
    
    .stat-label {
        font-size: 0.75rem;
    }
    
    .features-modern {
        padding: 4rem 0;
    }
    
    .feature-card-modern {
        padding: 2rem;
    }
    
    .feature-icon-modern {
        width: 56px;
        height: 56px;
        font-size: 1.5rem;
    }
    
    .services-modern {
        padding: 4rem 0;
    }
    
    .service-card-modern {
        padding: 2rem;
    }
    
    .service-card-modern h3 {
        font-size: 1.15rem;
    }
    
    .cta-modern {
        padding: 4rem 0;
    }
    
    .cta-modern h2 { 
        font-size: 1.75rem; 
    }
    
    .cta-modern p {
        font-size: 1rem;
        padding: 0 1rem;
    }
    
    .cta-modern .btn {
        padding: 1rem 2rem;
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .hero-modern h1 {
        font-size: 1.75rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .stat-item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .stat-label {
        font-size: 0.9rem;
        text-align: left;
    }
}
</style>

<!-- Hero Section -->
<section class="hero-modern">
    <div class="container">
        <span class="hero-badge"><?php echo sassllc_get_company_info('tagline'); ?></span>
        
        <h1>
            Expert Accounting Services<br>
            For Your <span class="highlight">Success</span>
        </h1>
        
        <p>
            Simplified Accounting Solutions delivers professional accounting, tax preparation, and IRS representation services. We handle the numbers so you can focus on what matters most.
        </p>
        
        <div class="hero-buttons">
            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">Get Free Consultation →</a>
            <a href="<?php echo home_url('/services'); ?>" class="btn btn-secondary">Explore Services →</a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">15+</div>
                <div class="stat-label">Years Experience</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">EA</div>
                <div class="stat-label">IRS Enrolled Agent</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Client Focused</div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="features-modern">
    <div class="container">
        <div class="section-header">
            <h2>Why Clients Trust Us</h2>
            <p>Experience the difference that professional, personalized accounting services can make.</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card-modern">
                <div class="feature-icon-modern">💼</div>
                <h3>Certified Expertise</h3>
                <p>Our qualified accounting professionals bring decades of combined experience in tax preparation, financial reporting, and IRS representation.</p>
            </div>
            
            <div class="feature-card-modern">
                <div class="feature-icon-modern">👥</div>
                <h3>Personalized Service</h3>
                <p>We take the time to understand your unique financial situation and provide tailored solutions that fit your individual or business needs.</p>
            </div>
            
            <div class="feature-card-modern">
                <div class="feature-icon-modern">✓</div>
                <h3>Accuracy Guaranteed</h3>
                <p>We stand behind our work with meticulous attention to detail, ensuring your financials are accurate and compliant with current tax laws.</p>
            </div>
            
            <div class="feature-card-modern">
                <div class="feature-icon-modern">🛡️</div>
                <h3>Year-Round Support</h3>
                <p>Tax season doesn't end in April. We provide ongoing support and guidance throughout the year to keep you financially healthy.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-modern">
    <div class="container">
        <div class="section-header">
            <h2>Our Professional Services</h2>
            <p>Comprehensive financial solutions for individuals and businesses.</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card-modern">
                <h3><span>📚</span> Accounting Services</h3>
                <p>Maintain accurate financial records with our comprehensive accounting solutions. We handle accounts payable, accounts receivable, bank reconciliation, and financial statement preparation.</p>
                <ul>
                    <li>Accounts Payable & Receivable</li>
                    <li>Bank Reconciliation</li>
                    <li>Financial Statements</li>
                    <li>Payroll Processing</li>
                </ul>
            </div>
            
            <div class="service-card-modern">
                <h3><span>📋</span> Tax Preparation</h3>
                <p>Individual and business tax preparation services designed to maximize your refund and minimize your tax liability.</p>
                <ul>
                    <li>Individual Tax Returns (1040)</li>
                    <li>Business Tax Returns</li>
                    <li>State & Local Returns</li>
                    <li>Amended Returns</li>
                </ul>
            </div>
            
            <div class="service-card-modern">
                <h3><span>📈</span> Tax Planning</h3>
                <p>Proactive tax planning strategies to help you make informed financial decisions throughout the year.</p>
                <ul>
                    <li>Year-Round Tax Projections</li>
                    <li>Entity Structure Optimization</li>
                    <li>Retirement Planning</li>
                    <li>Capital Gains Planning</li>
                </ul>
            </div>
            
            <div class="service-card-modern">
                <h3><span>🛡️</span> IRS Audit Defense</h3>
                <p>Facing an IRS audit? Our experienced professionals will represent you before the IRS and protect your interests.</p>
                <ul>
                    <li>Audit Representation</li>
                    <li>Offer in Compromise</li>
                    <li>Penalty Abatement</li>
                    <li>Levy & Lien Release</li>
                </ul>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 4rem;">
            <a href="<?php echo home_url('/services'); ?>" class="btn btn-accent">View All Services →</a>
        </div>
    </div>
</section>

<!-- Credentials Section -->
<section class="credentials" style="padding: 5rem 0;">
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
                <span>IRS Enrolled Agent</span>
            </div>
            <div class="credential-item">
                <div class="icon">💻</div>
                <span>QuickBooks ProAdvisor</span>
            </div>
            <div class="credential-item">
                <div class="icon">⭐</div>
                <span>15+ Years Experience</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-modern">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Simplify Your Finances?</h2>
            <p>Schedule a free consultation today and discover how we can help you achieve financial peace of mind.</p>
            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-accent">Schedule Free Consultation →</a>
        </div>
    </div>
</section>

<!-- Contact Bar -->
<section style="background: #F8FAFC; padding: 4rem 0;">
    <div class="container" style="text-align: center;">
        <p style="font-size: 1.1rem; margin-bottom: 1rem; color: #64748B;">Have questions? We're here to help.</p>
        <p style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem;">
            <a href="tel:<?php echo sassllc_get_company_info('phone'); ?>" style="color: #0F172A;"><?php echo sassllc_get_company_info('phone'); ?></a>
        </p>
        <p style="color: #64748B;"><?php echo sassllc_get_company_info('location'); ?></p>
    </div>
</section>

<?php get_footer(); ?>
