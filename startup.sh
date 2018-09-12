#!/bin/bash

cd /var/www;

if [ ! -r /var/www/vendor ]; then
	composer update;
fi

php artisan migrate
php artisan db:seed

bash /opt/docker/provision/entrypoint.d/05-permissions.sh
bash /opt/docker/provision/entrypoint.d/10-php-debugger.sh
bash /opt/docker/provision/entrypoint.d/20-apache-dev.sh
bash /opt/docker/provision/entrypoint.d/20-apache.sh
bash /opt/docker/provision/entrypoint.d/20-php-fpm.sh
bash /opt/docker/provision/entrypoint.d/20-php.sh
bash /opt/docker/bin/service.d/supervisor.d/10-init.sh
