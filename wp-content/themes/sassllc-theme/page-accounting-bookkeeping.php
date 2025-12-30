<?php
/**
 * Template Name: Accounting Services
 */

get_header();
?>

<style>
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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

.service-box {
    background: var(--background-alt);
    padding: 2rem;
    border-radius: 16px;
    margin-top: 2rem;
}
</style>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <h1>Accounting Services</h1>
        <p>Complete Financial Management for Your Business - Accurate accounting is the foundation of every successful business. Our comprehensive services ensure your financial records are always up-to-date and organized.</p>
    </div>
</section>

<!-- Service Details -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="services-grid">
            <div class="service-card">
                <h4>Account Management Services</h4>
                <ul>
                    <li>Bank & credit card reconciliation</li>
                    <li>Monthly financial maintenance</li>
                    <li>Accounts payable management</li>
                    <li>Accounts receivable management</li>
                    <li>Transaction categorization</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Financial Reporting</h4>
                <ul>
                    <li>Monthly financial statements</li>
                    <li>Quarterly financial statements</li>
                    <li>Custom management reports</li>
                    <li>Cash flow statements</li>
                    <li>Budget vs. actual reports</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Payroll Processing</h4>
                <ul>
                    <li>Weekly, bi-weekly, or monthly payroll</li>
                    <li>Direct deposit setup</li>
                    <li>Payroll tax calculations</li>
                    <li>W-2 and 1099 preparation</li>
                    <li>Quarterly payroll tax filings</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>General Ledger Cleanup</h4>
                <ul>
                    <li>Historical financial cleanup</li>
                    <li>Error correction</li>
                    <li>Account reclassification</li>
                    <li>Bringing records up to date</li>
                    <li>Multi-year catch-up services</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Software Setup & Training</h4>
                <ul>
                    <li>QuickBooks setup & customization</li>
                    <li>Chart of accounts creation</li>
                    <li>Software training sessions</li>
                    <li>Ongoing support</li>
                    <li>Data migration assistance</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Fixed Asset Tracking</h4>
                <ul>
                    <li>Asset listing and tracking</li>
                    <li>Depreciation schedules</li>
                    <li>Asset disposal tracking</li>
                    <li>Tax depreciation planning</li>
                    <li>Book vs. tax depreciation</li>
                </ul>
            </div>
        </div>
        
        <div class="service-box">
            <h3>Industries We Serve:</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 1rem;">
                <span>• Professional Services</span>
                <span>• Retail & E-commerce</span>
                <span>• Restaurants & Hospitality</span>
                <span>• Construction & Contractors</span>
                <span>• Real Estate & Property Management</span>
                <span>• Healthcare & Medical Practices</span>
                <span>• Nonprofits & Organizations</span>
                <span>• Startups & Entrepreneurs</span>
            </div>
            <h4 style="margin-top: 2rem;">Software We Support:</h4>
            <p style="margin-top: 0.5rem;">QuickBooks Online, QuickBooks Desktop, Xero, FreshBooks, Wave, Sage, and other major accounting platforms</p>
        </div>
        
        <div style="margin-top: 3rem; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); padding: 2rem; border-radius: 12px; color: white; text-align: center;">
            <h3 style="color: white;">Ready to Get Your Finances in Order?</h3>
            <p style="color: rgba(255,255,255,0.9);">Let us handle your accounting while you focus on growing your business.</p>
            <a href="<?php echo home_url('/contact'); ?>" class="btn" style="margin-top: 1rem; background: white; color: var(--primary-color);">
                Schedule Free Consultation
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
