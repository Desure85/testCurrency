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
        libxml2-dev \
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

RUN docker-php-ext-install gd zip \
    opcache \
    pdo_mysql \
    pdo_pgsql\
    bcmath \
    intl

RUN pecl install -o redis \
    apcu \
    mongodb \
    imagick \
    memcached \
    msgpack \
    pcov \
    rdkafka && \
    rm -rf /tmp/pear


ENV COMPOSER_ALLOW_SUPERUSER=1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "phpstan/phpstan" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "composer/semver:^1.4" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "squizlabs/php_codesniffer" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "phpmd/phpmd" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "symplify/easy-coding-standard" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "rector/rector" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "vimeo/psalm" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "phpmetrics/phpmetrics" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "wapmorgan/php-code-fixer" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "bmitch/churn-php" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "dephpend/dephpend" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "povils/phpmnd" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "phpunit/phpunit:^9" \
 && composer global require --prefer-dist --no-interaction --optimize-autoloader --apcu-autoloader "nunomaduro/phpinsights"

RUN wget -P /root/.composer/vendor/bin https://phar.phpunit.de/phploc.phar
RUN wget -P /root/.composer/vendor/bin https://phar.phpunit.de/phpcpd.phar
ENV PATH "$PATH:/root/.composer/vendor/bin"
RUN mkdir /var/log/php-fpm && ln -sf /dev/stdout /var/log/php-fpm/access.log && ln -sf /dev/stderr /var/log/php-fpm/error.log
CMD ["php-fpm"]

