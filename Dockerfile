FROM php:8.0-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql

FROM mysql
ENV MYSQL_ROOT_PASSWORD password
ENV MYSQL_DATABASE robohome

COPY ./dump.sql /docker-entrypoint-initdb.d/
