-- SQL script to create service child pages
-- Run this in your Railway MySQL database

-- First, get the Services page ID
SET @services_id = (SELECT ID FROM wp_posts WHERE post_name = 'services' AND post_type = 'page' LIMIT 1);

-- Insert Business Registration page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES (1, NOW(), UTC_TIMESTAMP(), '', 'Business Registration', '', 'publish', 'closed', 'closed', '', 'business-registration', '', '', NOW(), UTC_TIMESTAMP(), '', @services_id, '', 0, 'page', '', 0);

SET @business_reg_id = LAST_INSERT_ID();
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES (@business_reg_id, '_wp_page_template', 'page-business-registration.php');

-- Insert Accounting & Bookkeeping page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES (1, NOW(), UTC_TIMESTAMP(), '', 'Accounting & Bookkeeping', '', 'publish', 'closed', 'closed', '', 'accounting-bookkeeping', '', '', NOW(), UTC_TIMESTAMP(), '', @services_id, '', 0, 'page', '', 0);

SET @accounting_id = LAST_INSERT_ID();
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES (@accounting_id, '_wp_page_template', 'page-accounting-bookkeeping.php');

-- Insert Tax Preparation page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES (1, NOW(), UTC_TIMESTAMP(), '', 'Tax Preparation', '', 'publish', 'closed', 'closed', '', 'tax-preparation', '', '', NOW(), UTC_TIMESTAMP(), '', @services_id, '', 0, 'page', '', 0);

SET @tax_prep_id = LAST_INSERT_ID();
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES (@tax_prep_id, '_wp_page_template', 'page-tax-preparation.php');

-- Insert IRS Resolution page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES (1, NOW(), UTC_TIMESTAMP(), '', 'IRS Resolution', '', 'publish', 'closed', 'closed', '', 'irs-resolution', '', '', NOW(), UTC_TIMESTAMP(), '', @services_id, '', 0, 'page', '', 0);

SET @irs_res_id = LAST_INSERT_ID();
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES (@irs_res_id, '_wp_page_template', 'page-irs-resolution.php');

SELECT 'Service pages created successfully!' AS Result;
