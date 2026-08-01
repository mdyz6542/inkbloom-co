#!/bin/sh
set -e

PORT="${PORT:-8080}"
sed -i "s/__PORT__/$PORT/" /etc/nginx/nginx.conf

php artisan config:clear
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"
