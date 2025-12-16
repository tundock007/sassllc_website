# WordPress on Railway

Deploy WordPress with MySQL on Railway.

## Quick Deploy

### Step 1: Create a Railway Project

1. Go to [Railway](https://railway.app/) and sign up/login
2. Click **"New Project"**
3. Select **"Deploy from GitHub repo"**
4. Connect this repository

### Step 2: Add a MySQL Database

1. In your Railway project, click **"+ New"**
2. Select **"Database"** → **"Add MySQL"**
3. Railway will automatically provision a MySQL database

### Step 3: Configure Environment Variables

Railway will auto-populate database variables if you use their MySQL service. Add these variables to your WordPress service:

Click on your WordPress service → **Variables** tab → **Add Variable**:

```
WORDPRESS_DB_HOST=${{MySQL.MYSQL_HOST}}:${{MySQL.MYSQL_PORT}}
WORDPRESS_DB_USER=${{MySQL.MYSQL_USER}}
WORDPRESS_DB_PASSWORD=${{MySQL.MYSQL_PASSWORD}}
WORDPRESS_DB_NAME=${{MySQL.MYSQL_DATABASE}}
```

Or copy values from your MySQL service:

| Variable | Description |
|----------|-------------|
| `WORDPRESS_DB_HOST` | MySQL host (e.g., `containers-us-west-xxx.railway.app:port`) |
| `WORDPRESS_DB_USER` | MySQL username |
| `WORDPRESS_DB_PASSWORD` | MySQL password |
| `WORDPRESS_DB_NAME` | MySQL database name |

### Step 4: Generate a Domain

1. Click on your WordPress service
2. Go to **Settings** → **Networking**
3. Click **"Generate Domain"** to get a `.railway.app` URL
4. Or add a custom domain

### Step 5: Access Your Site

Visit your generated URL to complete the WordPress installation wizard!

## Environment Variables Reference

| Variable | Required | Description |
|----------|----------|-------------|
| `WORDPRESS_DB_HOST` | Yes | MySQL database host |
| `WORDPRESS_DB_USER` | Yes | MySQL username |
| `WORDPRESS_DB_PASSWORD` | Yes | MySQL password |
| `WORDPRESS_DB_NAME` | Yes | MySQL database name |
| `WORDPRESS_TABLE_PREFIX` | No | Table prefix (default: `wp_`) |
| `WORDPRESS_DEBUG` | No | Enable debug mode (default: `false`) |

## Custom Domain Setup

1. In Railway, go to your service **Settings** → **Networking**
2. Click **"+ Custom Domain"**
3. Enter your domain (e.g., `yourdomain.com`)
4. Add the CNAME record to your DNS provider
5. Wait for SSL certificate provisioning

## Troubleshooting

### Database Connection Issues
- Ensure all `WORDPRESS_DB_*` variables are set correctly
- Check that MySQL service is running
- Verify the host includes the port number

### Site Not Loading
- Check the deployment logs in Railway
- Ensure a domain is generated/configured
- Verify the PORT variable is being used correctly

## Local Development

```bash
# Copy environment example
cp .env.example .env

# Fill in your local MySQL credentials in .env

# Build and run with Docker
docker build -t wordpress-railway .
docker run -p 8080:80 --env-file .env wordpress-railway
```

## License

WordPress is open source software under the GPLv2 license.
