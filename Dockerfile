FROM wordpress:latest

# Install additional PHP extensions if needed
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Create a startup script to handle Railway's dynamic PORT
RUN echo '#!/bin/bash\n\
sed -i "s/80/${PORT:-80}/g" /etc/apache2/sites-available/000-default.conf\n\
sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/ports.conf\n\
exec docker-entrypoint.sh apache2-foreground' > /usr/local/bin/railway-start.sh \
    && chmod +x /usr/local/bin/railway-start.sh

# Expose the port
EXPOSE 80

# Use custom startup script
CMD ["/usr/local/bin/railway-start.sh"]
