# How to Add Plugins to Railway Deployment

## The Problem
Plugins installed via WordPress admin are lost when Railway rebuilds your container because they're stored in ephemeral container storage.

## The Solution
Add plugins to your Git repository so they're baked into the Docker image.

## Step-by-Step Instructions

### Method 1: Download from WordPress.org
1. Go to https://wordpress.org/plugins/
2. Find and download the plugin you need
3. Extract the zip file
4. Move the plugin folder to `wp-content/plugins/` in this repository
5. Run:
   ```bash
   git add wp-content/plugins/plugin-name
   git commit -m "Add plugin-name plugin"
   git push
   ```
6. Railway will automatically rebuild and the plugin will be available

### Method 2: Copy from Running WordPress (if already configured)
1. In your WordPress admin, go to Plugins
2. Find the plugin folder name in the list
3. Download it from your Railway deployment (you'll need FTP or database access)
4. Place it in `wp-content/plugins/` locally
5. Commit and push as above

## Currently Included Plugins
- None yet (add plugins as needed)

## Recommended Plugins to Add

### Essential:
- **Akismet Anti-spam** - Spam protection (free)
- **Wordfence Security** - Security and firewall

### Optional (if needed):
- **WP Mail SMTP** - Configure email sending (if contact form emails aren't working)
- **Yoast SEO** - SEO optimization
- **W3 Total Cache** - Performance optimization

## Note
Your custom contact form doesn't require any plugins - it's built directly into the theme and saves submissions to the database.
