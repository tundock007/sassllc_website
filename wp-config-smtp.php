<?php
/**
 * SMTP Configuration for WordPress
 * Include this in wp-config.php to enable SMTP email sending
 */

// SMTP Configuration
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');
define('SMTP_AUTH', true);
define('SMTP_USERNAME', 'your-email@gmail.com'); // Replace with your Gmail address
define('SMTP_PASSWORD', 'your-app-password'); // Replace with Gmail App Password

// Configure PHPMailer to use SMTP
function configure_smtp_mailer($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = SMTP_HOST;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->SMTPAuth = SMTP_AUTH;
    $phpmailer->Username = SMTP_USERNAME;
    $phpmailer->Password = SMTP_PASSWORD;
    $phpmailer->From = SMTP_USERNAME;
    $phpmailer->FromName = get_bloginfo('name');
}
add_action('phpmailer_init', 'configure_smtp_mailer');

// Override wp_mail from address
function custom_mail_from($email) {
    return SMTP_USERNAME;
}
add_filter('wp_mail_from', 'custom_mail_from');

function custom_mail_from_name($name) {
    return get_bloginfo('name');
}
add_filter('wp_mail_from_name', 'custom_mail_from_name');
?>