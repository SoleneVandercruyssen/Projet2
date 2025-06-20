FROM php:8.3.20-apache
RUN apt update && apt upgrade -y
RUN docker-php-ext-install pdo_mysql
ENV MA_SUPER_VARIABLE=truc