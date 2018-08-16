
# The beginning

It all started by coping code. It always does.

```sh
tree
.
├── docker
│   ├── composer
│   │   └── Dockerfile
│   ├── nginx
│   │   ├── conf.d
│   │   │   └── upstream.conf
│   │   ├── Dockerfile
│   │   ├── nginx.conf
│   │   ├── nginx.source.conf
│   │   └── sites-available
│   │       └── default.conf
│   ├── php-fpm
│   │   ├── Dockerfile
│   │   └── php.ini
│   └── php-worker
│       ├── Dockerfile
│       ├── supervisord.conf
│       └── supervisord.d
│           └── laravel-worker.conf
├── laravel (not here yet)
│   ├── app
[...]
├── docker-compose.yml
└── README.md
```

# Composer Create Project

```sh
docker run --rm --interactive --tty --volume $PWD:/app --user $(id -u):$(id -g) composer create-project --prefer-dist laravel/laravel laravel
```

# First run

```sh
alias dc-lar='export UID=$UID; export GID=$GID; docker-compose'
dc-lar up -d
dc-lar run node
# npm run prod
```

# Scaffold Authentication

```sh
dc-lar exec php-fpm php artisan make:auth
dc-lar exec php-fpm php artisan migrate
```

# Translating app

```sh
dc-lar run composer require mcamara/laravel-localization
# And a bunch of changes, so `up`s and `down`s
```

# Testing a deploy

```sh
git clone base-laravel new-proc
cd new-proc
alias dc-lar='export UID=$UID; export GID=$GID; docker-compose'
dc-lar up -d
# fail, no .env, docker can't up the database
cp laravel/.env.example laravel/.env
dc-lar up -d
# runs, but browser shows error, no key was set
dc-lar exec php-fpm php artisan key:generate
dc-lar down
dc-lar up -d
dc-lar exec php-fpm php artisan migrate

# clean git working tree
```
