#!/bin/bash
set -e

cd /var/www; php artisan config:cache
env >> /var/www/.env
php artisan storage:link
php-fpm7.4 -D
nginx -g "daemon off;"
