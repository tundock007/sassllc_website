#!/bin/bash
# Create WordPress pages via Railway exec

# Login to Railway and execute WP-CLI commands
echo "Creating service child pages..."

railway run wp post create \
  --post_type=page \
  --post_title='Business Registration' \
  --post_name='business-registration' \
  --post_status=publish \
  --post_parent=$(railway run wp post list --post_type=page --name=services --field=ID) \
  --meta_input='{"_wp_page_template":"page-business-registration.php"}' \
  --porcelain

railway run wp post create \
  --post_type=page \
  --post_title='Accounting & Bookkeeping' \
  --post_name='accounting-bookkeeping' \
  --post_status=publish \
  --post_parent=$(railway run wp post list --post_type=page --name=services --field=ID) \
  --meta_input='{"_wp_page_template":"page-accounting-bookkeeping.php"}' \
  --porcelain

railway run wp post create \
  --post_type=page \
  --post_title='Tax Preparation' \
  --post_name='tax-preparation' \
  --post_status=publish \
  --post_parent=$(railway run wp post list --post_type=page --name=services --field=ID) \
  --meta_input='{"_wp_page_template":"page-tax-preparation.php"}' \
  --porcelain

railway run wp post create \
  --post_type=page \
  --post_title='IRS Resolution' \
  --post_name='irs-resolution' \
  --post_status=publish \
  --post_parent=$(railway run wp post list --post_type=page --name=services --field=ID) \
  --meta_input='{"_wp_page_template":"page-irs-resolution.php"}' \
  --porcelain

echo "Pages created successfully!"
