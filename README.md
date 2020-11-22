# Docker, PHP, NGINX, POO


## Docker

Open in root project ( ex: cd My/project)<br /><br />

### cd to the location where you cloned the project

cd /var/www/html/project<br /><br />

### Start the containers

```
docker-compose up -d
```
<br />
### Open the container

```
docker-compose exec poo-php-fpm bash
```

## Install dependencies
composer install

## Run application

 You can run the php code using the following command: 
 > php file_name.php

 ## Run Tests
 > ./vendor/bin/phpunit tests