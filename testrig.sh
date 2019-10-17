#!/usr/bin/env bash

set -e

 [ -f ".env.testing" ] || $(echo Please make an .env.testing file and run: php artisan key:generate --env=testing; exit 1)
export $(cat .env.testing | grep -v ^# | xargs);

echo Starting services
docker-compose up -d
echo Host: 127.0.0.1
until docker-compose exec -T mysql mysql -h 127.0.0.1 -u $DB_USERNAME -p$DB_PASSWORD -D $DB_DATABASE --silent -e "show databases;"
do
  echo "Waiting for database connection..."
  sleep 5
done

echo Installing dependencies
#.scripts/npm.sh install
.scripts/composer.sh install

echo Seeding database
rm -f bootstrap/cache/*.php
docker-compose exec -T app php artisan key:generate --env=testing && echo Key Generated Successfully
docker-compose exec -T app php artisan migrate --env=testing && echo Database migrated
docker-compose exec -T app php artisan db:seed --env=testing && echo Database seeded
