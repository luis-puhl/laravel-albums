
# The beguining

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


```sh
docker run --rm --interactive --tty --volume $PWD:/app --user $(id -u):$(id -g) composer create-project --prefer-dist laravel/laravel laravel
```
