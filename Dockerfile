FROM php:8.2-apache

# Install ekstensi mysqli, pdo, pdo_mysql, DAN openssl/ssl pendukungnya
RUN apt-get update && apt-get install -y libssl-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli

COPY . /var/www/html/
