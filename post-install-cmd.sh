#!/bin/bash
 cd src
 COMPOSER_MEMORY_LIMIT=-1 composer install
 php yii migrate --interactive=0
 php yii migrate --interactive=0 --migrationPath="@app/modules/webhookTrap/migrations"
 php yii currency/check
