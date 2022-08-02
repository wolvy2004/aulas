#!/bin/bash

# -- instalacion de axios
docker-compose exec frontend npm install --save axios vue-axios
# -- instalacion de Vue-Router
docker-compose exec frontend vue add router
# -- instalacion de Vuex
docker-compose exec frontend npm install vuex@next --save
# -- instalacion de Vuetify
docker-compose exec frontend vue add vuetify

