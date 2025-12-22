<?php
/**
 * Template Name: Business Registration Services
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
</style>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <h1>Business Registration Services</h1>
        <p>Start Your Business the Right Way - Complete business registration services for entrepreneurs and business owners. We handle all the paperwork so you can focus on building your business.</p>
    </div>
</section>

<!-- Service Details -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="services-grid">
            <div class="service-card">
                <h4>🏛️ Business Formation</h4>
                <ul>
                    <li>LLC formation</li>
                    <li>Corporation (C-Corp / S-Corp)</li>
                    <li>Partnership registration</li>
                    <li>Sole proprietorship setup</li>
                    <li>Nonprofit organization formation</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📝 State & Federal Registration</h4>
                <ul>
                    <li>EIN application</li>
                    <li>State tax ID registration</li>
                    <li>Sales & use tax registration</li>
                    <li>Unemployment insurance registration</li>
                    <li>Workers' compensation registration</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📜 Licensing & Permits</h4>
                <ul>
                    <li>General business licenses</li>
                    <li>Home-based business permits</li>
                    <li>Zoning permits</li>
                    <li>Occupancy permits</li>
                    <li>Industry-specific licenses</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>✅ Compliance & Annual Filings</h4>
                <ul>
                    <li>Annual report filing</li>
                    <li>Operating agreement creation</li>
                    <li>Corporate bylaws drafting</li>
                    <li>Meeting minutes preparation</li>
                    <li>Compliance calendar management</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🏷️ DBA / Trade Name Services</h4>
                <ul>
                    <li>DBA (Doing Business As) registration</li>
                    <li>Trade name renewals</li>
                    <li>Name availability checks</li>
                    <li>Name reservation services</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>📄 Document Preparation</h4>
                <ul>
                    <li>Articles of Organization</li>
                    <li>Articles of Incorporation</li>
                    <li>Amendments and name changes</li>
                    <li>Dissolution filings</li>
                    <li>Reinstatement filings</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>💼 Business Structure Consulting</h4>
                <ul>
                    <li>Entity type selection guidance</li>
                    <li>Tax implications analysis</li>
                    <li>Liability protection planning</li>
                    <li>Startup compliance guidance</li>
                </ul>
            </div>
            
            <div class="service-card">
                <h4>🎖️ Specialty Registrations</h4>
                <ul>
                    <li>Minority-owned business certification</li>
                    <li>Woman-owned business certification</li>
                    <li>Veteran-owned business certification</li>
                    <li>SAM.gov registration</li>
                    <li>DUNS/UEI number assistance</li>
                </ul>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); padding: 2rem; border-radius: 12px; color: white; text-align: center;">
            <h3 style="color: white;">Ready to Start Your Business?</h3>
            <p style="color: rgba(255,255,255,0.9);">We'll guide you through every step of the business registration process.</p>
            <a href="<?php echo home_url('/contact'); ?>" class="btn" style="margin-top: 1rem; background: white; color: var(--primary-color);">
                Schedule Free Consultation
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
