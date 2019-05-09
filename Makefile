

refresh-dev-db: ## Refresh dev database (schema + fixtures)
	php bin/console doctrine:database:drop --force --if-exists --env=dev
	php bin/console doctrine:database:create --env=dev
	php bin/console doctrine:migrations:migrate --no-interaction --env=dev
	php bin/console doctrine:fixtures:load --verbose --no-interaction --env=dev
