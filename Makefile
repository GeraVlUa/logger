ifeq ($(SKIP_DOCKER), true)
    DC :=
    PHP :=
else
    DC := docker-compose exec
    PHP := $(DC) php
endif

build:
	@docker-compose build --no-cache

start:
	@docker-compose up -d

stop:
	@docker-compose down

restart: stop start

composer-install:
	@$(PHP) composer install

composer-update:
	@$(PHP) composer update --prefer-dist

ssh:
	@$(PHP) bash
