#!/bin/bash

docker-compose exec backend composer global require "fxp/composer-asset-plugin:^1.4.1"

docker-compose exec backend composer create-project --prefer-dist yiisoft/yii2-app-basic .