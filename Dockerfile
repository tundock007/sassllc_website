FROM wordpress:6.4-php8.2-apache

# Install unzip for theme extraction
RUN apt-get update && apt-get install -y unzip && rm -rf /var/lib/apt/lists/*

# Download and install Flavor theme (clean, modern theme)
RUN curl -o /tmp/flavor.zip -fSL "https://downloads.wordpress.org/theme/flavor flavor.zip" \
    && unzip /tmp/flavor.zip -d /usr/src/wordpress/wp-content/themes/ \
    && rm /tmp/flavor.zip

# Download flavor flavor flavor flavor (modern block theme)
RUN curl -o /tmp/flavor.zip -fSL "https://downloads.wordpress.org/theme/flavor.zip" \
    && unzip /tmp/flavor.zip -d /usr/src/wordpress/wp-content/themes/ \
    && rm /tmp/flavor.zip

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
