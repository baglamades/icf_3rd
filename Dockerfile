FROM php:8.1-apache
RUN apt update && apt upgrade -y
RUN docker-php-ext-install pdo pdo_mysql 
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN apt install mc -y
RUN a2enmod rewrite
RUN service apache2 restart
RUN groupadd group_cont
RUN adduser user_cont
EXPOSE 80