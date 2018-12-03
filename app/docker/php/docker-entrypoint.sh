#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

if [ "$1" = 'php-fpm' ] || [ "$1" = 'bin/console' ]; then
	mkdir -p var/cache var/log
	setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX var
	setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX var

	composer install --prefer-dist --no-progress --no-suggest --no-interaction

	>&2 echo "Waiting for MySQL to be ready..."
	while ! mysqladmin ping -u root -proot --silent; do
        sleep 1
    done

    bin/console doctrine:schema:update --force --no-interaction
fi

exec docker-php-entrypoint "$@"
