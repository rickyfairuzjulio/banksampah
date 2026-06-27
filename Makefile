# Makefile for common project tasks
.PHONY: build optimize migrate seed storage test all

build:
	npm install
	npm run build

optimize:
	php artisan config:cache
	php artisan route:cache
	php artisan view:cache
	php artisan optimize

migrate:
	php artisan migrate --force

seed:
	php artisan db:seed --class=DatabaseSeeder --force

storage:
	php artisan storage:link

test:
	php artisan test

all: build optimize migrate seed storage
	@echo "Project prepared."