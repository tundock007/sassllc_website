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
        <p>Comprehensive financial solutions for individuals and businesses. From business formation and registration to accounting and complex tax strategies, we've got you covered.</p>
    </div>
</section>

<!-- Accounting Services -->
<section id="accounting" style="padding: 4rem 0;">
    <div class="container">
        <div class="section-header">
            <h2>📚 Accounting Services</h2>
            <h3 style="color: var(--primary-color); font-weight: 500;">Complete Financial Management for Your Business</h3>
            <p>Accurate accounting is the foundation of every successful business. Our comprehensive accounting services ensure your financial records are always up-to-date, organized, and provide the insights you need for strategic decision-making.</p>
        </div>
        
        <div class="services-grid" style="margin-top: 3rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <div class="service-card">
                <h4>📊 Account Management Services</h4>
                <ul style="margin-top: 1rem;">
                    <li>Expense categorization</li>
                    <li>Bank & credit card reconciliation</li>
                    <li>Monthly financial maintenance</li>
                    <li>Accounts payable management</li>
                    <li>Accounts receivable management</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📈 Financial Reporting</h4>
                <ul style="margin-top: 1rem;">
                    <li>Monthly financial statements</li>
                    <li>Quarterly financial statements</li>
                    <li>Custom management reports</li>
                    <li>Cash flow statements</li>
                    <li>Budget vs. actual reports</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>💰 Payroll Processing</h4>
                <ul style="margin-top: 1rem;">
                    <li>Weekly, bi-weekly, or monthly payroll</li>
                    <li>Direct deposit setup</li>
                    <li>Payroll tax calculations</li>
                    <li>W-2 and 1099 preparation</li>
                    <li>Quarterly payroll tax filings</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🔧 General Ledger Cleanup</h4>
                <ul style="margin-top: 1rem;">
                    <li>Historical financial cleanup</li>
                    <li>Error correction</li>
                    <li>Account reclassification</li>
                    <li>Bringing books up to date</li>
                    <li>Multi-year catch-up services</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>💻 Software Setup & Training</h4>
                <ul style="margin-top: 1rem;">
                    <li>QuickBooks setup & customization</li>
                    <li>Chart of accounts creation</li>
                    <li>Software training sessions</li>
                    <li>Ongoing support</li>
                    <li>Data migration assistance</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🏢 Fixed Asset Tracking</h4>
                <ul style="margin-top: 1rem;">
                    <li>Asset listing and tracking</li>
                    <li>Depreciation schedules</li>
                    <li>Asset disposal tracking</li>
                    <li>Tax depreciation planning</li>
                    <li>Book vs. tax depreciation</li>
                </ul>
            </div>
        </div>
        
        <div class="service-split" style="margin-top: 3rem; align-items: center;">
            <div class="service-box">
                <h4>Industries We Serve:</h4>
                <ul style="list-style: none; margin-top: 1rem;">
                    <li style="padding: 0.5rem 0;">• Professional Services</li>
                    <li style="padding: 0.5rem 0;">• Retail & E-commerce</li>
                    <li style="padding: 0.5rem 0;">• Restaurants & Hospitality</li>
                    <li style="padding: 0.5rem 0;">• Construction & Contractors</li>
                    <li style="padding: 0.5rem 0;">• Real Estate & Property Management</li>
                    <li style="padding: 0.5rem 0;">• Healthcare & Medical Practices</li>
                    <li style="padding: 0.5rem 0;">• Nonprofits & Organizations</li>
                    <li style="padding: 0.5rem 0;">• Startups & Entrepreneurs</li>
                </ul>
            </div>
            <div class="service-box">
                <h4>Software We Support:</h4>
                <div style="margin-top: 1rem; display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;">
                    <span>✓ QuickBooks Online</span>
                    <span>✓ QuickBooks Desktop</span>
                    <span>✓ Xero</span>
                    <span>✓ FreshBooks</span>
                    <span>✓ Wave</span>
                    <span>✓ Sage</span>
                </div>
                <p style="margin-top: 1rem; font-style: italic; color: var(--text-secondary);">And other major accounting platforms</p>
            </div>
        </div>
    </div>
</section>

<!-- Tax Preparation Services -->
<section id="tax-prep" style="padding: 4rem 0; background: var(--background-alt);">
    <div class="container">
        <div class="section-header">
            <h2>📋 Tax Preparation Services</h2>
            <h3 style="color: var(--primary-color); font-weight: 500;">Maximize Refunds. Minimize Liability.</h3>
            <p>Comprehensive tax preparation services for individuals and businesses. We ensure accuracy, maximize your tax savings, and keep you compliant with all federal and state requirements.</p>
        </div>
        
        <div class="services-grid" style="margin-top: 3rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <div class="service-card">
                <h4>📄 Individual Tax Preparation</h4>
                <ul style="margin-top: 1rem;">
                    <li>Federal & state income tax returns</li>
                    <li>Local tax filings</li>
                    <li>Amended returns (1040-X)</li>
                    <li>Prior-year return preparation</li>
                    <li>ITIN application assistance</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🏢 Business Tax Preparation</h4>
                <ul style="margin-top: 1rem;">
                    <li>Sole proprietorship (Schedule C)</li>
                    <li>Partnership returns (Form 1065)</li>
                    <li>S-Corporation (Form 1120-S)</li>
                    <li>C-Corporation (Form 1120)</li>
                    <li>Nonprofit filings (Form 990)</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>💼 Payroll Tax Services</h4>
                <ul style="margin-top: 1rem;">
                    <li>Quarterly filings (Form 941)</li>
                    <li>Annual filings (Form 940)</li>
                    <li>W-2 and 1099 preparation</li>
                    <li>State payroll tax returns</li>
                    <li>Payroll tax reconciliation</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📊 Tax Planning & Advisory</h4>
                <ul style="margin-top: 1rem;">
                    <li>Year-round tax planning</li>
                    <li>Estimated tax calculations</li>
                    <li>Tax-saving strategies</li>
                    <li>Entity structure analysis</li>
                    <li>Retirement planning</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🔗 Accounting-Integrated Services</h4>
                <ul style="margin-top: 1rem;">
                    <li>Tax-ready financial statements</li>
                    <li>Books cleanup for tax filing</li>
                    <li>Sales tax compliance</li>
                    <li>Multi-state nexus analysis</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🛡️ IRS & State Tax Resolution</h4>
                <ul style="margin-top: 1rem;">
                    <li>IRS notice response</li>
                    <li>Payment plan setup</li>
                    <li>Penalty abatement</li>
                    <li>Offer-in-compromise prep</li>
                    <li>Audit support</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>⚡ Specialty Tax Services</h4>
                <ul style="margin-top: 1rem;">
                    <li>Gig worker / freelancer taxes</li>
                    <li>Trucking & transportation</li>
                    <li>Multi-state tax filings</li>
                    <li>Real estate investors</li>
                    <li>Cryptocurrency reporting</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📝 Document & Compliance</h4>
                <ul style="margin-top: 1rem;">
                    <li>Estimated tax vouchers</li>
                    <li>Extensions (4868 / 7004)</li>
                    <li>Tax document organization</li>
                    <li>Tax return review</li>
                </ul>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background: white; padding: 2rem; border-radius: 12px;">
            <h4 style="text-align: center; margin-bottom: 1.5rem;">Tax Credits & Deductions We Help You Claim:</h4>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                <span style="padding: 0.5rem;">✓ Earned Income Tax Credit (EITC)</span>
                <span style="padding: 0.5rem;">✓ Child Tax Credit</span>
                <span style="padding: 0.5rem;">✓ Education Credits</span>
                <span style="padding: 0.5rem;">✓ Home Office Deduction</span>
                <span style="padding: 0.5rem;">✓ Retirement Contribution Credits</span>
                <span style="padding: 0.5rem;">✓ Health Insurance Premium Credit</span>
                <span style="padding: 0.5rem;">✓ Qualified Business Income (199A)</span>
                <span style="padding: 0.5rem;">✓ R&D Tax Credits</span>
                <span style="padding: 0.5rem;">✓ Energy Efficiency Credits</span>
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

<!-- IRS Resolution Services -->
<section id="irs-resolution" style="padding: 5rem 0; background: var(--background-alt);">
    <div class="container">
        <div class="section-header">
            <h2>🛡️ IRS Resolution Services</h2>
            <h3 style="color: var(--primary-color); font-weight: 500;">Expert Tax Problem Resolution</h3>
            <p>Facing IRS tax problems? Our comprehensive resolution services help you resolve tax issues, stop collections, and protect your assets. We handle everything from notice responses to complex debt negotiations.</p>
        </div>
        
        <div class="services-grid" style="margin-top: 3rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <div class="service-card">
                <h4>📧 IRS Notice Response</h4>
                <ul style="margin-top: 1rem;">
                    <li>Review and explain IRS letters</li>
                    <li>Draft professional responses</li>
                    <li>Direct IRS communication</li>
                    <li>Timeline management</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>💳 Installment Agreements</h4>
                <ul style="margin-top: 1rem;">
                    <li>Set up monthly payment plans</li>
                    <li>Negotiate affordable terms</li>
                    <li>Reinstate defaulted agreements</li>
                    <li>Long-term payment options</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🤝 Offer in Compromise</h4>
                <ul style="margin-top: 1rem;">
                    <li>Determine eligibility</li>
                    <li>Prepare OIC applications</li>
                    <li>Financial documentation</li>
                    <li>Settlement negotiation</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>⚠️ Penalty Abatement</h4>
                <ul style="margin-top: 1rem;">
                    <li>First-time penalty relief</li>
                    <li>Reasonable cause abatement</li>
                    <li>Documentation preparation</li>
                    <li>IRS penalty negotiation</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🚫 Wage Garnishment Release</h4>
                <ul style="margin-top: 1rem;">
                    <li>Emergency levy release</li>
                    <li>Bank levy release</li>
                    <li>Payment alternatives</li>
                    <li>Future levy prevention</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🏠 Tax Lien Assistance</h4>
                <ul style="margin-top: 1rem;">
                    <li>Lien withdrawal requests</li>
                    <li>Lien subordination</li>
                    <li>Lien release support</li>
                    <li>Credit repair assistance</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📋 Back Tax Filing</h4>
                <ul style="margin-top: 1rem;">
                    <li>Prepare unfiled returns</li>
                    <li>Correct filed returns</li>
                    <li>Income reconstruction</li>
                    <li>Full compliance restoration</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>👥 Innocent Spouse Relief</h4>
                <ul style="margin-top: 1rem;">
                    <li>Eligibility evaluation</li>
                    <li>Relief request preparation</li>
                    <li>Form 8857 submission</li>
                    <li>Review process support</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🔍 Audit Representation</h4>
                <ul style="margin-top: 1rem;">
                    <li>Audit notice response</li>
                    <li>Documentation preparation</li>
                    <li>IRS auditor communication</li>
                    <li>Appeals representation</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>⏸️ Currently Not Collectible</h4>
                <ul style="margin-top: 1rem;">
                    <li>Eligibility determination</li>
                    <li>Hardship documentation</li>
                    <li>CNC status requests</li>
                    <li>Annual review assistance</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📊 IRS Transcript Review</h4>
                <ul style="margin-top: 1rem;">
                    <li>Pull IRS transcripts</li>
                    <li>Analyze account history</li>
                    <li>Identify issues & balances</li>
                    <li>Create resolution plan</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🏛️ State Tax Resolution</h4>
                <ul style="margin-top: 1rem;">
                    <li>State tax notice response</li>
                    <li>State payment plans</li>
                    <li>State lien & levy resolution</li>
                    <li>Multi-state coordination</li>
                </ul>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background: #FEF2F2; border: 2px solid #EF4444; padding: 2rem; border-radius: 12px; text-align: center;">
            <h4 style="color: #DC2626;">⚠️ Received an IRS Notice?</h4>
            <p style="color: #7F1D1D; margin-top: 0.5rem;">Time is critical when dealing with IRS problems. Don't wait – contact us immediately for urgent assistance.</p>
            <div style="margin-top: 1.5rem;">
                <a href="tel:<?php echo sassllc_get_company_info('phone'); ?>" class="btn btn-primary" style="background: #DC2626; border-color: #DC2626; margin-right: 1rem;">
                    Emergency Call: <?php echo sassllc_get_company_info('phone'); ?>
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn" style="background: white; color: #DC2626; border: 2px solid #DC2626;">
                    Schedule Consultation
                </a>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); padding: 2rem; border-radius: 12px; color: white;">
            <h4 style="color: white;">Why Choose Our IRS Resolution Services:</h4>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
                <div>
                    <strong style="color: white;">✓ Direct IRS Communication</strong>
                    <p style="color: rgba(255,255,255,0.9); font-size: 0.9rem; margin-top: 0.25rem;">We handle all communication with the IRS on your behalf</p>
                </div>
                <div>
                    <strong style="color: white;">✓ Proven Track Record</strong>
                    <p style="color: rgba(255,255,255,0.9); font-size: 0.9rem; margin-top: 0.25rem;">Successfully resolved thousands of complex tax cases</p>
                </div>
                <div>
                    <strong style="color: white;">✓ Comprehensive Solutions</strong>
                    <p style="color: rgba(255,255,255,0.9); font-size: 0.9rem; margin-top: 0.25rem;">Handle all types of federal and state tax problems</p>
                </div>
                <div>
                    <strong style="color: white;">✓ Fast Response</strong>
                    <p style="color: rgba(255,255,255,0.9); font-size: 0.9rem; margin-top: 0.25rem;">Immediate action to stop IRS collection activities</p>
                </div>
            </div>
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
                <h4>All Accounting Services</h4>
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
