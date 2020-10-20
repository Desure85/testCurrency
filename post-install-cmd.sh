#!/bin/bash
 cd src
 COMPOSER_MEMORY_LIMIT=-1 composer install
 php yii migrate --interactive
 php yii migrate --interactive --migrationPath=@app/modules/webhookTrap/migration
 php yii currency/check
