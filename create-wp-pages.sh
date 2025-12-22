#!/bin/bash
# Script to create WordPress pages via Railway MySQL
# Usage: ./create-wp-pages.sh

echo "Creating WordPress service pages..."

# Check if mysql client is installed
if ! command -v mysql &> /dev/null; then
    echo "Error: mysql client is not installed."
    echo "Install it with: brew install mysql-client"
    echo "Then add to PATH: export PATH=\"/opt/homebrew/opt/mysql-client/bin:\$PATH\""
    exit 1
fi

# Get Railway MySQL connection string
MYSQL_URL=$(railway variables --service MySQL | grep MYSQL_URL | cut -d'=' -f2-)

if [ -z "$MYSQL_URL" ]; then
    echo "Error: Could not get MySQL connection URL from Railway"
    echo "Make sure you're linked to the right project: railway link"
    exit 1
fi

echo "Connecting to Railway MySQL..."

# Execute the SQL using the full connection URL
mysql "$MYSQL_URL" < create-service-pages.sql

if [ $? -eq 0 ]; then
    echo "✓ Pages created successfully!"
    echo "Visit your site to see the new service pages."
else
    echo "✗ Error creating pages"
    exit 1
fi

# Cleanup
rm /tmp/railway-vars.txt
