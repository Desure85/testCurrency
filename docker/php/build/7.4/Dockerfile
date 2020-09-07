FROM php:7.4-fpm
RUN apt-get update && apt-get install -y \
        libicu-dev \
        g++ \
        curl \
        wget \
        python \
        cron \
        zlibc \
        zlib1g \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libzip-dev \
        libz-dev \
        libmemcached-dev \
        libmemcached11 \
        libmemcachedutil2 \
        build-essential \
        libmcrypt-dev \
        libpng-dev \
        libpq-dev \
        libonig-dev \
        libpng-dev \
        libmagickwand-dev --no-install-recommends \
        sendmail \
        zlib1g-dev --no-install-recommends && \
        rm -r /var/lib/apt/lists/*

WORKDIR /tmp

RUN wget https://github.com/edenhill/librdkafka/archive/v1.1.0.tar.gz && \
    tar -xvf v1.1.0.tar.gz && \
    cd librdkafka-1.1.0 && \
    ./configure && make && make install && ldconfig && cd /tmp && \
    rm -rf librdkafka-1.1.0 v1.1.0.tar.gz

RUN docker-php-ext-configure mbstring && \
    docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-configure tokenizer && \
    docker-php-ext-configure mysqli && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ \
    --with-jpeg=/usr/include/ && \
    docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql

RUN docker-php-ext-install zip \
    opcache \
    pdo_mysql \
    pdo_pgsql\
    bcmath \
    intl \
    gd

RUN pecl install -o redis \
    apcu \
    mongodb \
    imagick \
    memcached \
    msgpack \
    pcov \
    rdkafka && \
    rm -rf /tmp/pear

COPY /ini/redis.ini /usr/local/etc/php/conf.d/
COPY /ini/rdkafka.ini /usr/local/etc/php/conf.d/
COPY /ini/apcu.ini /usr/local/etc/php/conf.d/
COPY /ini/mongodb.ini /usr/local/etc/php/conf.d/
COPY /ini/imagick.ini /usr/local/etc/php/conf.d/
COPY /ini/msgpack.ini /usr/local/etc/php/conf.d/
COPY /ini/memcached.ini /usr/local/etc/php/conf.d/
COPY /ini/pcov.ini /usr/local/etc/php/conf.d/
COPY /ini/settings.ini /usr/local/etc/php/conf.d/

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "fxp/composer-asset-plugin:~1.0"
RUN composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "hirak/prestissimo"

RUN mkdir /var/log/php-fpm && ln -sf /dev/stdout /var/log/php-fpm/access.log && ln -sf /dev/stderr /var/log/php-fpm/error.log
CMD ["php-fpm"]

