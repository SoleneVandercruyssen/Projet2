FROM php:8.2-apache
RUN apt update && apt upgrade -y
RUN docker-php-ext-install pdo_mysql
ENV MA_SUPER_VARIABLE=truc
# rewrite url 
RUN a2enmod rewrite
