## Installation Guide WEBDESA 
- make sure your php is more than php 8.0
- composer install 
- php artisan key:generate
- crate database mysql
- php artisan migrate 
- php artisan db:seed
- php artisan storage:link
- Setting APP_URL= in .env accourding to your hosts
## Installation Guide WEBDESA with docker
- docker-compose build app
- check .env docker-compose up -d
- docker-compose ps
- docker-compose exec app ls -l
- docker-compose exec app rm -rf vendor composer.lock
- docker-compose exec app composer install
- docker-compose exec app php artisan key:generate
- docker-compose exec app php artisan migrate
- docker-compose exec app php artisan db:seed
- rungin with http://server_domain_or_IP:8000 or docker-compose exec app php artisan serve