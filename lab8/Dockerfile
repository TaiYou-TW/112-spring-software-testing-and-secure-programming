FROM php:8.1-apache

RUN docker-php-ext-install -j$(nproc) mysqli

EXPOSE 80

CMD ["apache2-foreground"]
