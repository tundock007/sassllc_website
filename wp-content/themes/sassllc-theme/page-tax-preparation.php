<?php
/**
 * Template Name: Tax Preparation Services
 */

get_header();
?>

<style>
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.service-card {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.service-card h4 {
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.service-card ul {
    list-style: none;
    padding: 0;
}

.service-card ul li {
    padding: 0.5rem 0;
    border-bottom: 1px solid var(--border-color);
}

.service-card ul li:last-child {
    border-bottom: none;
}
</style>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <h1>Tax Preparation Services</h1>
        <p>Maximize Refunds. Minimize Liability. - Comprehensive tax preparation for individuals and businesses. We ensure accuracy, maximize your tax savings, and keep you compliant with all federal and state requirements.</p>
    </div>
</section>

<!-- Service Details -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="services-grid">
            <div class="service-card">
                <h4>📄 Individual Tax Preparation</h4>
                <ul>
                    <li>Federal & state income tax returns</li>
                    <li>Local tax filings</li>
                    <li>Amended returns (1040-X)</li>
                    <li>Prior-year return preparation</li>
                    <li>ITIN application assistance</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🏢 Business Tax Preparation</h4>
                <ul>
                    <li>Sole proprietorship (Schedule C)</li>
                    <li>Partnership returns (Form 1065)</li>
                    <li>S-Corporation (Form 1120-S)</li>
                    <li>C-Corporation (Form 1120)</li>
                    <li>Nonprofit filings (Form 990)</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>💼 Payroll Tax Services</h4>
                <ul>
                    <li>Quarterly filings (Form 941)</li>
                    <li>Annual filings (Form 940)</li>
                    <li>W-2 and 1099 preparation</li>
                    <li>State payroll tax returns</li>
                    <li>Payroll tax reconciliation</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📊 Tax Planning & Advisory</h4>
                <ul>
                    <li>Year-round tax planning</li>
                    <li>Estimated tax calculations</li>
                    <li>Tax-saving strategies</li>
                    <li>Entity structure analysis</li>
                    <li>Retirement planning</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🔗 Accounting-Integrated Services</h4>
                <ul>
                    <li>Tax-ready financial statements</li>
                    <li>Books cleanup for tax filing</li>
                    <li>Sales tax compliance</li>
                    <li>Multi-state nexus analysis</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🛡️ IRS & State Tax Resolution</h4>
                <ul>
                    <li>IRS notice response</li>
                    <li>Payment plan setup</li>
                    <li>Penalty abatement</li>
                    <li>Offer-in-compromise prep</li>
                    <li>Audit support</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>⚡ Specialty Tax Services</h4>
                <ul>
                    <li>Gig worker / freelancer taxes</li>
                    <li>Trucking & transportation</li>
                    <li>Multi-state tax filings</li>
                    <li>Real estate investors</li>
                    <li>Cryptocurrency reporting</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📝 Document & Compliance</h4>
                <ul>
                    <li>Estimated tax vouchers</li>
                    <li>Extensions (4868 / 7004)</li>
                    <li>Tax document organization</li>
                    <li>Tax return review</li>
                </ul>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <h3 style="text-align: center; margin-bottom: 1.5rem;">Tax Credits & Deductions We Help You Claim:</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                <span>✓ Earned Income Tax Credit (EITC)</span>
                <span>✓ Child Tax Credit</span>
                <span>✓ Education Credits</span>
                <span>✓ Home Office Deduction</span>
                <span>✓ Retirement Contribution Credits</span>
                <span>✓ Health Insurance Premium Credit</span>
                <span>✓ Qualified Business Income (199A)</span>
                <span>✓ R&D Tax Credits</span>
                <span>✓ Energy Efficiency Credits</span>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); padding: 2rem; border-radius: 12px; color: white; text-align: center;">
            <h3 style="color: white;">Ready to Maximize Your Tax Refund?</h3>
            <p style="color: rgba(255,255,255,0.9);">Schedule a free consultation to discuss your tax preparation needs.</p>
            <a href="<?php echo home_url('/contact'); ?>" class="btn" style="margin-top: 1rem; background: white; color: var(--primary-color);">
                Schedule Free Consultation
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
