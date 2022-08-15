FROM php:8.0-fpm-buster
LABEL maintainer "Juri Matsuda <matsuda.juri@gmail.com>"
COPY ./docker/php/php.ini /usr/local/etc/php/

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

#Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# Node.js 14系(LTS)をインストール
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# yarnをインストール
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list
RUN apt-get update && apt-get install yarn

RUN apt-get update && apt-get install -y \
git \
zip \
unzip \
vim \
libicu-dev \
zlib1g-dev \
libzip-dev

RUN docker-php-ext-install pdo_mysql intl zip bcmath
RUN rm -rf /var/lib/apt/lists/*

#RUN pecl install xdebug \
#    && docker-php-ext-enable xdebug

WORKDIR /var/www/

RUN composer global require "laravel/installer"
