#!/bin/bash

if [ ! -d "/app/public" ];
then
  php docker/php-fpm/core/app.php
  echo "Installed )"
else
  echo "laravel is already installed"
fi

exec "$@";