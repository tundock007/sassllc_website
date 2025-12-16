<?php
/**
 * Template Name: Services Page
 */

get_header();
?>

<style>
/* Services Page Mobile Styles */
.service-split {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    align-items: start;
}

.service-split-reverse {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    align-items: start;
}

.service-split-reverse > div:first-child {
    order: 1;
}

.service-split-reverse > div:last-child {
    order: 2;
}

.service-box {
    background: var(--background-alt);
    padding: 2rem;
    border-radius: 16px;
}

.service-box-dark {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    padding: 2rem;
    border-radius: 16px;
    color: white;
}

.service-box-dark h3,
.service-box-dark h4 {
    color: white;
}

.tax-two-col {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.tax-credits-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.full-service-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

.full-service-item {
    text-align: center;
    padding: 1.5rem;
}

.full-service-item .icon {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.checklist {
    list-style: none;
    margin-top: 1.5rem;
}

.checklist li {
    padding: 0.5rem 0;
    padding-left: 1.75rem;
    position: relative;
}

.checklist li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--accent-color);
    font-weight: bold;
}

.checklist-white li::before {
    color: white;
}

@media (max-width: 768px) {
    .service-split,
    .service-split-reverse {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .service-split-reverse > div:first-child {
        order: 2;
    }
    
    .service-split-reverse > div:last-child {
        order: 1;
    }
    
    .tax-two-col {
        grid-template-columns: 1fr;
    }
    
    .tax-credits-grid {
        grid-template-columns: 1fr;
        gap: 0.5rem;
    }
    
    .full-service-grid {
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    
    .service-box,
    .service-box-dark {
        padding: 1.5rem;
    }
    
    .full-service-item {
        padding: 1rem;
    }
    
    .full-service-item h4 {
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .full-service-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Hero Section -->
<section class="hero" style="padding: 4rem 0;">
    <div class="container">
        <h1>Professional Accounting Services</h1>
        <p>Comprehensive financial solutions for individuals and businesses. From day-to-day bookkeeping to complex tax strategies, we've got you covered.</p>
    </div>
</section>

<!-- Bookkeeping Services -->
<section id="bookkeeping" style="padding: 4rem 0;">
    <div class="container">
        <div class="service-split">
            <div>
                <h2>📚 Bookkeeping Services</h2>
                <h3 style="color: var(--primary-color); font-weight: 500;">Keep Your Books in Order</h3>
                <p>Accurate bookkeeping is the foundation of every successful business. Our professional bookkeeping services ensure your financial records are always up-to-date, organized, and ready for tax season.</p>
                
                <ul class="checklist">
                    <li><strong>Accounts Payable Management</strong> – Track and manage vendor payments</li>
                    <li><strong>Accounts Receivable Management</strong> – Invoice processing and payment tracking</li>
                    <li><strong>Bank Reconciliation</strong> – Monthly reconciliation for accuracy</li>
                    <li><strong>Financial Statement Preparation</strong> – P&L and balance sheets</li>
                    <li><strong>Payroll Processing</strong> – Employee payroll and tax filings</li>
                </ul>
            </div>
            <div class="service-box">
                <h4>Industries We Serve:</h4>
                <ul style="list-style: none; margin-top: 1rem;">
                    <li style="padding: 0.5rem 0;">• Professional Services</li>
                    <li style="padding: 0.5rem 0;">• Retail & E-commerce</li>
                    <li style="padding: 0.5rem 0;">• Restaurants & Hospitality</li>
                    <li style="padding: 0.5rem 0;">• Construction & Contractors</li>
                    <li style="padding: 0.5rem 0;">• Real Estate</li>
                    <li style="padding: 0.5rem 0;">• Nonprofits</li>
                    <li style="padding: 0.5rem 0;">• Startups & Entrepreneurs</li>
                </ul>
                <h4 style="margin-top: 1.5rem;">Software We Support:</h4>
                <p style="margin-top: 0.5rem;">QuickBooks, Xero, FreshBooks, Wave, Sage</p>
            </div>
        </div>
    </div>
</section>

<!-- Tax Preparation -->
<section id="tax-prep" style="padding: 4rem 0; background: var(--background-alt);">
    <div class="container">
        <div class="section-header">
            <h2>📋 Tax Preparation & Filing</h2>
            <h3 style="color: var(--primary-color); font-weight: 500;">Maximize Refunds. Minimize Liability.</h3>
            <p>Whether you're an individual, sole proprietor, or business owner, our tax preparation services ensure accuracy and maximize your tax savings.</p>
        </div>
        
        <div class="tax-two-col" style="margin-top: 2.5rem;">
            <div class="service-card">
                <h4>Individual Tax Services</h4>
                <ul>
                    <li>Form 1040 Personal Income Tax Returns</li>
                    <li>Schedule A Itemized Deductions</li>
                    <li>Schedule C Self-Employment Income</li>
                    <li>Schedule D Capital Gains & Losses</li>
                    <li>Schedule E Rental & Royalty Income</li>
                    <li>State and Local Tax Returns</li>
                    <li>Prior Year & Amended Returns</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Business Tax Services</h4>
                <ul>
                    <li>Form 1120 C-Corporation Returns</li>
                    <li>Form 1120-S S-Corporation Returns</li>
                    <li>Form 1065 Partnership Returns</li>
                    <li>Form 990 Nonprofit Returns</li>
                    <li>Quarterly Estimated Tax Calculations</li>
                    <li>Sales Tax Filings</li>
                    <li>Multi-State Tax Returns</li>
                </ul>
            </div>
        </div>
        
        <div style="margin-top: 2.5rem; background: white; padding: 1.5rem; border-radius: 12px;">
            <h4>Tax Credits We Help You Claim:</h4>
            <div class="tax-credits-grid" style="margin-top: 1rem;">
                <span>✓ Earned Income Tax Credit (EITC)</span>
                <span>✓ Child Tax Credit</span>
                <span>✓ Education Credits</span>
                <span>✓ Home Office Deduction</span>
                <span>✓ Retirement Contribution Credits</span>
                <span>✓ Health Insurance Premium Credit</span>
            </div>
        </div>
    </div>
</section>

<!-- Tax Planning -->
<section id="tax-planning" style="padding: 4rem 0;">
    <div class="container">
        <div class="service-split-reverse">
            <div class="service-box-dark">
                <h3>Who Benefits Most:</h3>
                <ul class="checklist checklist-white" style="margin-top: 1rem;">
                    <li style="border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 0.75rem;">Business owners & self-employed professionals</li>
                    <li style="border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 0.75rem;">High-income earners</li>
                    <li style="border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 0.75rem;">Real estate investors</li>
                    <li style="border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 0.75rem;">Those approaching retirement</li>
                    <li>Anyone with complex financial situations</li>
                </ul>
            </div>
            <div>
                <h2>📈 Tax Planning & Strategy</h2>
                <h3 style="color: var(--primary-color); font-weight: 500;">Plan Today. Save Tomorrow.</h3>
                <p>Effective tax planning goes beyond filing your annual return. Our proactive approach helps you make strategic financial decisions throughout the year.</p>
                
                <ul class="checklist">
                    <li><strong>Year-Round Tax Projections</strong> – Estimate liability and adjust withholdings</li>
                    <li><strong>Entity Structure Optimization</strong> – LLC, S-Corp, or C-Corp analysis</li>
                    <li><strong>Retirement Planning Strategies</strong> – Maximize tax-advantaged accounts</li>
                    <li><strong>Income Timing Strategies</strong> – Defer income or accelerate deductions</li>
                    <li><strong>Capital Gains Planning</strong> – Strategic timing of asset sales</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Audit Defense -->
<section id="audit-defense" style="padding: 5rem 0; background: var(--background-alt);">
    <div class="container">
        <div class="section-header">
            <h2>🛡️ IRS Audit Representation</h2>
            <h3 style="color: var(--primary-color); font-weight: 500;"><?php echo sassllc_get_company_info('tagline'); ?></h3>
            <p>Receiving a notice from the IRS can be stressful and intimidating. You don't have to face it alone. Our experienced team provides professional representation before the IRS to protect your rights.</p>
        </div>
        
        <div class="services-grid" style="margin-top: 3rem;">
            <div class="service-card">
                <h4>Audit Defense Services</h4>
                <ul>
                    <li>IRS Correspondence Audits</li>
                    <li>Office & Field Audit Representation</li>
                    <li>Appeals Representation</li>
                    <li>We communicate directly with the IRS</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Tax Resolution</h4>
                <ul>
                    <li>Offer in Compromise (OIC)</li>
                    <li>Installment Agreement Negotiation</li>
                    <li>Penalty Abatement Requests</li>
                    <li>Innocent Spouse Relief</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Levy & Lien Services</h4>
                <ul>
                    <li>Wage Garnishment Release</li>
                    <li>Bank Levy Release</li>
                    <li>Property Lien Release</li>
                    <li>Unfiled Tax Return Filing</li>
                </ul>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background: #FEF2F2; border: 2px solid #EF4444; padding: 2rem; border-radius: 12px; text-align: center;">
            <h4 style="color: #DC2626;">Received an IRS Notice?</h4>
            <p style="color: #7F1D1D;">Time is of the essence. Contact us immediately for urgent assistance.</p>
            <a href="tel:<?php echo sassllc_get_company_info('phone'); ?>" class="btn btn-primary" style="margin-top: 1rem; background: #DC2626; border-color: #DC2626;">
                Call Now: <?php echo sassllc_get_company_info('phone'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Full Service Accounting -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="section-header">
            <h2>💼 Full-Service Accounting</h2>
            <h3 style="color: var(--primary-color); font-weight: 500;">Complete Financial Management</h3>
            <p>For businesses that need comprehensive financial oversight, our full-service accounting solutions provide everything from daily transaction recording to CFO-level strategic guidance.</p>
        </div>
        
        <div class="full-service-grid" style="margin-top: 2.5rem;">
            <div class="full-service-item">
                <div class="icon">📊</div>
                <h4>All Bookkeeping Services</h4>
            </div>
            <div class="full-service-item">
                <div class="icon">📈</div>
                <h4>Monthly Financial Reporting</h4>
            </div>
            <div class="full-service-item">
                <div class="icon">💰</div>
                <h4>Cash Flow Analysis</h4>
            </div>
            <div class="full-service-item">
                <div class="icon">📋</div>
                <h4>Budget & Variance Analysis</h4>
            </div>
            <div class="full-service-item">
                <div class="icon">💳</div>
                <h4>Payroll Services</h4>
            </div>
            <div class="full-service-item">
                <div class="icon">👔</div>
                <h4>CFO Advisory Services</h4>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Get Started?</h2>
        <p>Schedule a free consultation to discuss your accounting needs. We'll review your situation and recommend the services that best fit your goals.</p>
        <div style="margin-top: 2rem;">
            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">Schedule Free Consultation</a>
            <p style="margin-top: 1rem; color: rgba(255,255,255,0.8);">
                Or call us directly: <a href="tel:<?php echo sassllc_get_company_info('phone'); ?>" style="color: white; font-weight: 600;"><?php echo sassllc_get_company_info('phone'); ?></a>
            </p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
