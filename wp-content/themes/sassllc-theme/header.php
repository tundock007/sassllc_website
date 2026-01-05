<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <a href="<?php echo home_url(); ?>" class="site-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/logo.jpg" alt="Simplified Accounting Solutions, LLC" class="logo-image">
        </a>
        
        <button class="mobile-menu-toggle" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <nav class="main-nav">
            <ul>
                <li><a href="<?php echo home_url(); ?>" <?php if(is_front_page()) echo 'class="active"'; ?>>Home</a></li>
                <li class="has-dropdown">
                    <a href="<?php echo home_url('/services'); ?>" <?php if(is_page(array('services', 'business-registration', 'accounting-bookkeeping', 'tax-preparation', 'irs-resolution'))) echo 'class="active"'; ?>>Services ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo home_url('/services/business-registration'); ?>">Business Registration</a></li>
                        <li><a href="<?php echo home_url('/services/accounting-bookkeeping'); ?>">Accounting Services</a></li>
                        <li><a href="<?php echo home_url('/services/tax-preparation'); ?>">Tax Preparation</a></li>
                        <li><a href="<?php echo home_url('/services/irs-resolution'); ?>">IRS Resolution</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo home_url('/about'); ?>" <?php if(is_page('about')) echo 'class="active"'; ?>>About Us</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>" <?php if(is_page('contact')) echo 'class="active"'; ?>>Contact</a></li>
                <li><a href="<?php echo home_url('/blog'); ?>" <?php if(is_page('blog') || is_single() || is_category() || is_archive()) echo 'class="active"'; ?>>Blog</a></li>
            </ul>
        </nav>
        
        <div class="header-cta">
            <a href="tel:<?php echo sassllc_get_company_info('phone'); ?>" class="btn btn-primary">
                <?php echo sassllc_get_company_info('phone'); ?>
            </a>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.querySelector('.mobile-menu-toggle');
    const nav = document.querySelector('.main-nav');
    const header = document.querySelector('.site-header');
    
    toggle.addEventListener('click', function() {
        nav.classList.toggle('active');
        toggle.classList.toggle('active');
    });
    
    // Close menu when clicking a link
    document.querySelectorAll('.main-nav a').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('active');
            toggle.classList.remove('active');
        });
    });
    
    // Dropdown functionality
    const dropdownTriggers = document.querySelectorAll('.has-dropdown > a');
    dropdownTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                this.parentElement.classList.toggle('dropdown-open');
            }
        });
    });
});
</script>

<main class="site-main">
