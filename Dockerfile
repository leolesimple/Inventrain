FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mysqli zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --chown=www-data:www-data . /var/www/html/

COPY docker/security.conf /etc/apache2/conf-available/security.conf

RUN chmod -R 755 /var/www/html \
    && a2ensite 000-default \
    && a2enconf security

RUN a2enmod headers

RUN { \
    echo "display_errors = Off"; \
    echo "log_errors = On"; \
    echo "error_reporting = E_ALL"; \
    } > /usr/local/etc/php/conf.d/prod-errors.ini

EXPOSE 80
