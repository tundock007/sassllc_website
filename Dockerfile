FROM wordpress:latest

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# WordPress runs on port 80 internally
EXPOSE 80

# Use default WordPress entrypoint
CMD ["apache2-foreground"]
