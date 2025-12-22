# WordPress Page Creation Scripts

This folder contains scripts to create WordPress pages programmatically.

## Current Method: WordPress Admin (Recommended)

1. Go to https://sassllcwebsite-production.up.railway.app/wp-admin
2. Pages → Add New
3. Set title, slug, parent, and template
4. Click Publish

## Future Automation

The SQL script `create-service-pages.sql` can be used to create pages directly in the database when you have direct MySQL access. This is useful for:
- Bulk page creation
- Deployment automation
- Backup/restore scenarios

### Using the SQL Script:

**Option 1: Railway Dashboard**
1. Go to Railway → MySQL service → Query tab (if available)
2. Paste contents of `create-service-pages.sql`
3. Execute

**Option 2: Local MySQL Client** (requires Railway MySQL to be accessible)
```bash
# Add mysql to PATH first
export PATH="/opt/homebrew/opt/mysql-client/bin:$PATH"

# Run the script
./create-wp-pages.sh
```

**Option 3: Direct SQL execution** (if you have connection details)
```bash
mysql -h HOST -P PORT -u USER -pPASSWORD DATABASE < create-service-pages.sql
```

## Files

- `create-service-pages.sql` - SQL to insert pages into wp_posts and wp_postmeta
- `create-wp-pages.sh` - Bash script to automate SQL execution via Railway
- `setup-pages.php` - PHP script (place in web root, visit once, then delete)

## Templates

The page templates are in `/wp-content/themes/sassllc-theme/`:
- `page-business-registration.php`
- `page-accounting-bookkeeping.php`
- `page-tax-preparation.php`
- `page-irs-resolution.php`

These templates must exist before creating pages that use them.
