<?php
/**
 * Template Name: IRS Resolution Services
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
        <h1>IRS Resolution Services</h1>
        <p>Expert Tax Problem Resolution - Facing IRS tax problems? Our comprehensive resolution services help you resolve tax issues, stop collections, and protect your assets. We handle everything from notice responses to complex debt negotiations.</p>
    </div>
</section>

<!-- Service Details -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="services-grid">
            <div class="service-card">
                <h4>📧 IRS Notice Response</h4>
                <ul>
                    <li>Review and explain IRS letters</li>
                    <li>Draft professional responses</li>
                    <li>Direct IRS communication</li>
                    <li>Timeline management</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Installment Agreements</h4>
                <ul>
                    <li>Set up monthly payment plans</li>
                    <li>Negotiate affordable terms</li>
                    <li>Reinstate defaulted agreements</li>
                    <li>Long-term payment options</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🤝 Offer in Compromise</h4>
                <ul>
                    <li>Determine eligibility</li>
                    <li>Prepare OIC applications</li>
                    <li>Financial documentation</li>
                    <li>Settlement negotiation</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>⚠️ Penalty Abatement</h4>
                <ul>
                    <li>First-time penalty relief</li>
                    <li>Reasonable cause abatement</li>
                    <li>Documentation preparation</li>
                    <li>IRS penalty negotiation</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🚫 Wage Garnishment Release</h4>
                <ul>
                    <li>Emergency levy release</li>
                    <li>Bank levy release</li>
                    <li>Payment alternatives</li>
                    <li>Future levy prevention</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🏠 Tax Lien Assistance</h4>
                <ul>
                    <li>Lien withdrawal requests</li>
                    <li>Lien subordination</li>
                    <li>Lien release support</li>
                    <li>Credit repair assistance</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Back Tax Filing</h4>
                <ul>
                    <li>Prepare unfiled returns</li>
                    <li>Correct filed returns</li>
                    <li>Income reconstruction</li>
                    <li>Full compliance restoration</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Innocent Spouse Relief</h4>
                <ul>
                    <li>Eligibility evaluation</li>
                    <li>Relief request preparation</li>
                    <li>Form 8857 submission</li>
                    <li>Review process support</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>Audit Representation</h4>
                <ul>
                    <li>Audit notice response</li>
                    <li>Documentation preparation</li>
                    <li>IRS auditor communication</li>
                    <li>Appeals representation</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>⏸️ Currently Not Collectible</h4>
                <ul>
                    <li>Eligibility determination</li>
                    <li>Hardship documentation</li>
                    <li>CNC status requests</li>
                    <li>Annual review assistance</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>IRS Transcript Review</h4>
                <ul>
                    <li>Pull IRS transcripts</li>
                    <li>Analyze account history</li>
                    <li>Identify issues & balances</li>
                    <li>Create resolution plan</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>State Tax Resolution</h4>
                <ul>
                    <li>State tax notice response</li>
                    <li>State payment plans</li>
                    <li>State lien & levy resolution</li>
                    <li>Multi-state coordination</li>
                </ul>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background: #FEF2F2; border: 2px solid #EF4444; padding: 2rem; border-radius: 12px; text-align: center;">
            <h3 style="color: #DC2626;">⚠️ Received an IRS Notice?</h3>
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
            <h3 style="color: white;">Why Choose Our IRS Resolution Services:</h3>
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

<?php get_footer(); ?>
