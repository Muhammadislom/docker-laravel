#!/bin/bash

pwd
if [ ! -f "/app/public/index.php" ];
then
  php docker/php-fpm/core/app.php
  echo "Installed )"
else
  echo "laravel is already installed"
fi

exec "$@";