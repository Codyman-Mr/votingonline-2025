# Tumia PHP 8.2 na Apache
FROM php:8.2-apache

# Install PHP extensions zinazohitajika
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory ndani ya container
WORKDIR /var/www/html

# Copy Yii2 project files kwenda container
COPY . /var/www/html

# Set frontend as default public folder (you can also use backend/web if needed)
RUN rm -rf /var/www/html/html
RUN ln -s /var/www/html/frontend/web /var/www/html/html

# Apache config: Change DocumentRoot to point to frontend/web
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/frontend/web|' /etc/apache2/sites-available/000-default.conf

# Apache config: Allow .htaccess and override
RUN echo '<Directory /var/www/html/frontend/web>\n\
    AllowOverride All\n\
</Directory>' >> /etc/apache2/apache2.conf

# Set permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expose Apache HTTP port
EXPOSE 80
