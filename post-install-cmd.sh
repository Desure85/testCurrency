#!/bin/sh
if [ -n "$DYNO" ]  && [ -n "$ENV" ]; then
    cd src
    COMPOSER_MEMORY_LIMIT=-1 composer install
fi
