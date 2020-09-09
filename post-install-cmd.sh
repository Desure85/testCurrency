#!/bin/bash
 cd src
 COMPOSER_MEMORY_LIMIT=-1 composer install
 php yii migrate --interactive=0
 php yii currency/check
