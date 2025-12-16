FROM wordpress:latest

# Install additional PHP extensions if needed
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Configure Apache to use PORT environment variable (Railway uses dynamic ports)
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Expose the port (Railway will provide PORT env variable)
EXPOSE ${PORT}

# Use the default WordPress entrypoint
CMD ["apache2-foreground"]
