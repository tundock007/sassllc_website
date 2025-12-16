FROM wordpress:latest

# Fix Apache MPM conflict - disable event MPM, keep prefork
RUN a2dismod mpm_event && a2enmod mpm_prefork

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# WordPress runs on port 80 internally
EXPOSE 80

# Use default WordPress entrypoint
CMD ["apache2-foreground"]
