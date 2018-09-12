#!/bin/bash

cd /var/www;

if [ ! -r /var/www/vendor ]; then
	composer update;
fi

php artisan migrate
php artisan db:seed
