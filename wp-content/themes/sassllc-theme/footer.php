</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <h3><?php echo sassllc_get_company_info('name'); ?></h3>
                <p><?php echo sassllc_get_company_info('tagline'); ?></p>
                <p style="margin-top: 1rem;">
                    Providing professional accounting, tax preparation, and financial services to individuals and businesses.
                </p>
            </div>
            
            <div class="footer-column">
                <h4>Services</h4>
                <ul>
                    <li><a href="<?php echo home_url('/services'); ?>#accounting">Accounting</a></li>
                    <li><a href="<?php echo home_url('/services'); ?>#tax-prep">Tax Preparation</a></li>
                    <li><a href="<?php echo home_url('/services'); ?>#tax-planning">Tax Planning</a></li>
                    <li><a href="<?php echo home_url('/services'); ?>#audit-defense">Audit Defense</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="<?php echo home_url('/about'); ?>">About Us</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h4>Contact</h4>
                <ul>
                    <li><?php echo sassllc_get_company_info('phone'); ?></li>
                    <li><?php echo sassllc_get_company_info('email'); ?></li>
                    <li><?php echo sassllc_get_company_info('location'); ?></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo sassllc_get_company_info('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
