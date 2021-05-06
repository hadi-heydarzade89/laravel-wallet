# Initialize project

- docker-compose up -d
- docker exec app composer update -vvv
- docker exec -it app bash
- cp .env.example .env && exit
- docker exec -it db bash
- mysql -uroot -p123456789
- create database wallet;
- exit
- exit

``
php artisan migrate:fresh --seed
`` 

all password users are **password**
