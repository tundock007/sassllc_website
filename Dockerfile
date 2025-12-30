FROM wordpress:6.4-php8.2-apache

# Disable WordPress auto-updates
ENV AUTOMATIC_UPDATER_DISABLED=true
ENV WP_AUTO_UPDATE_CORE=false

# Copy custom theme
COPY wp-content/themes/sassllc-theme /usr/src/wordpress/wp-content/themes/sassllc-theme

# Copy plugins directory
COPY wp-content/plugins /usr/src/wordpress/wp-content/plugins

# Copy password reset script (DELETE AFTER USE)
COPY reset-password.php /usr/src/wordpress/reset-password.php

# Create startup script to fix MPM conflict at runtime
RUN echo '#!/bin/bash\n\
set -e\n\
# Disable all MPM modules first, then enable only prefork\n\
a2dismod mpm_event mpm_worker 2>/dev/null || true\n\
a2enmod mpm_prefork 2>/dev/null || true\n\
# Run original entrypoint\n\
exec docker-entrypoint.sh "$@"' > /usr/local/bin/start.sh && chmod +x /usr/local/bin/start.sh

ENTRYPOINT ["/usr/local/bin/start.sh"]
CMD ["apache2-foreground"]
