# Docker, PHP, NGINX, POO


## Docker

Open in root project ( ex: cd My/project)<br /><br />

### cd to the location where you cloned the project

cd /var/www/html/project<br /><br />

### Start the containers

```
docker-compose up -d
```
### See existing containers

```
docker ps -a
```

### Open the container, with name poo-php-fpm

```
docker exec -it poo-php-fpm /bin/sh
```

## Install dependencies
composer install

## Run application

 You can run the php code using the following command: 
 > php file_name.php

 ## Run Tests
 > ./vendor/bin/phpunit tests