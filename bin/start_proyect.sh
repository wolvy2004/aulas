#! /bin/bash

docker run --rm -v "/home/eduardo/desarrollos/aulas/frontend:/aulas" -w "/aulas" -it node:17.8.0-alpine3.14 sh -c "npm install -g @vue/cli && vue create ."

