#!/bin/bash

docker-compose exec backend composer update

docker-compose exec backend chmod 777 web/assert/ -R 

docker-compose exec backend chmod 777 runtime/ -R 
