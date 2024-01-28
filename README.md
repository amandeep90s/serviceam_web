<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Installation

cp .env.example .env

composer install

mkdir -p storage/license

sudo chmod -R 777 storage/

sudo chown -R www-data storage/

sudo chgrp -R www-data storage/

## Key Generate

php artisan key:generate

## Redis Installation

sudo apt update

sudo apt install redis-server

sudo nano /etc/redis/redis.conf

Change **supervised no** to **supervised systemd**

*Save and exit the editor*

sudo systemctl restart redis.service

## Base URL

Set Base URL of the api server in env

e.g: http://localhost:8001

## Local Config

### In server the file will be automatically created. No need to follow the following step

In the storage/license folder add a file with a name of the host with extension(127.0.0.1.json). Inside that file create
a json object with a key named accessKey and set a value for it, it should match the accessKey for that company in
server.

{"accessKey": "123456"}

