#!/bin/bash
 cd src
 COMPOSER_MEMORY_LIMIT=-1 composer install
 php yii migrate
 php yii currency/check
