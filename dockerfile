# Use the official PHP image as a base image
FROM php:8.2-apache
# install mysqli extension 
RUN apt update && apt upgrade -y
# install pdo_mysql extension 
RUN docker-php-ext-install pdo_mysql
# enable mysqli extension 
ENV MA_SUPER_VARIABLE=truc
# rewrite url 
RUN a2enmod rewrite
# set the document root
COPY . /var/www/html
# Enable .htaccess overrides
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
