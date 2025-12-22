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
                <li><a href="<?php echo home_url('/services'); ?>" <?php if(is_page('services')) echo 'class="active"'; ?>>Services</a></li>
                <li><a href="<?php echo home_url('/about'); ?>" <?php if(is_page('about')) echo 'class="active"'; ?>>About Us</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>" <?php if(is_page('contact')) echo 'class="active"'; ?>>Contact</a></li>
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
});
</script>

<main class="site-main">
