FROM php:7.4-fpm

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install -y --no-install-recommends git

# Install pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Install the xdebug
RUN pecl install xdebug-2.9.0 \
    && docker-php-ext-enable xdebug

# Copy xdebug configuration
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Install the composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./app/composer*.json ./
RUN composer install

EXPOSE 9000
