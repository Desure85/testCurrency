#!/bin/sh
if [ -n "$DYNO" ]  && [ -n "$ENV" ]; then
    cd src
    composer install
fi
