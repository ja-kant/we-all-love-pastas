## Тестовый проект на вакансию веб-разработчика в компанию Goodline
Данный проект представляет *сильно* упрощенный аналог сервиса [pastebin.com](http://pastebin.com "pastebin.com"), написанный на Laravel 6. 
### Установка
Командная строка

    git clone https://github.com/ja-kant/we-all-love-pastas.git ~/<weAllLovePastas>
	cd ~/<weAllLovePastas>
	composer install
	npm install
	cp .env.example .env
	php artisan key:generate

MySQL:

    CREATE DATABASE `gl_pastebin` /*!40100 COLLATE 'utf8_unicode_ci' */

Задать в файле .env значения для следующих полей:

    DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

Командная строка

    php artisan migrate:fresh --seed

Для демонстрационных целей возможно использовать тестовый сервер PHP
Для этого необходимо запустить команду
    
    php artisan serve

Тестовое приложение для авторизации VK нацелено на адрес http://localhost:8000

------------
На все вопросы и замечания касательно данного проекта я готов ответить по электронной почте [artwork3d@gmail.com](mailto:artwork3d@gmail.com "artwork3d@gmail.com")
