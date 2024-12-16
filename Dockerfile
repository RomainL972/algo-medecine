FROM php:apache

RUN a2enmod rewrite

COPY . /var/www/html
