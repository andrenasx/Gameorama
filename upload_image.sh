#!/bin/bash

# Stop execution if a step fails
set -e

DOCKER_USERNAME=lbaw2133
IMAGE_NAME=lbaw2133

# Ensure that dependencies are available
composer install
php artisan clear-compiled
php artisan optimize

docker build -t $DOCKER_USERNAME/$IMAGE_NAME .
docker push $DOCKER_USERNAME/$IMAGE_NAME
