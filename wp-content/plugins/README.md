# Plugin Management

## How to Persist Plugins Across Deployments

Since this WordPress site is deployed via Docker on Railway, plugins installed through the WordPress admin will be lost when the container restarts unless they're added to this repository.

### Adding Plugins

**Option 1: Download and Add Manually (Recommended)**
1. Download the plugin zip file from WordPress.org
2. Extract it to `wp-content/plugins/`
3. Commit and push:
   ```bash
   git add wp-content/plugins/plugin-name
   git commit -m "Add plugin-name plugin"
   git push
   ```
4. Railway will automatically redeploy with the plugin

**Option 2: Install via WordPress Admin**
1. Install and configure the plugin in WordPress admin
2. Download the configured plugin folder from your Railway deployment
3. Add it to `wp-content/plugins/` in your repository
4. Commit and push

### Current Plugins

List your plugins here to keep track:
- Akismet Anti-spam (bundled with WordPress)
- Contact Form 7 - **Not needed** (we use a custom HTML form)

### Note

The custom contact form in the theme doesn't require any plugins. It's built into the page-contact.php template.
