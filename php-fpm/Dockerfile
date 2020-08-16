FROM php:7.2-fpm

WORKDIR /app

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        libpq-dev \
        libxml2-dev \
        nano \
        openssl \
        unzip \
        git \
        libssl-dev \
        nano \
        curl \
        libpng-dev \
        libfreetype6-dev \
        libxpm-dev \
        libjpeg62-turbo-dev \
        ffmpeg \
        libmagickwand-dev --no-install-recommends \
        libmemcached-dev && \
    docker-php-ext-configure gd --with-xpm-dir=/usr/include/ --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-configure exif --enable-exif && \
    docker-php-ext-install pdo_mysql zip mbstring gd tokenizer soap intl exif && \
    pecl install mongodb imagick && \
    docker-php-ext-enable mongodb imagick

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

## install xdebug
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

RUN echo 'alias sf="php app/console"' >> ~/.bashrc

EXPOSE 9000

CMD ["php-fpm"]
