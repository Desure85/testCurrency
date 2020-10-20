#!/bin/bash
 cd src
 COMPOSER_MEMORY_LIMIT=-1 composer install
 php -y yii migrate --interactive
 php -y yii migrate --interactive --migrationPath="@app/modules/webhookTrap/migrations"
 php yii currency/check
