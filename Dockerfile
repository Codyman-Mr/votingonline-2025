FROM php:8.2-apache

# Enable Apache mod_rewrite (important for Yii2)
RUN a2enmod rewrite

# Set DocumentRoot to frontend/web
ENV APACHE_DOCUMENT_ROOT /var/www/html/frontend/web

# Update Apache config to reflect new DocumentRoot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}/../!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy source code
COPY . /var/www/html

# Set permissions (optional but good for Yii2)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
