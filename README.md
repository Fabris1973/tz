Тестовое задание

API-приложение на Laravel 12 и PHP 8.4 для работы с организациями и операциями между ними.

Используемая среда
Laravel 12
PHP 8.4
MySQL 5.6
Установка
Клонирование репозитория в локальную папку:
git clone https://github.com/Fabris1973/tz

cd tz

Установка зависимостей:
composer install

npm install

3.Настройка окружения:

cp .env.example .env

php artisan key:generate

4.Настройка базы данных в .env.

DB_DATABASE=[имя вашей базы данных]

DB_USERNAME=[имя пользователя]

DB_PASSWORD=[пароль к БД]

Запуск миграций:
php artisan migrate --seed

Ссылки для тестирования
Статистика по организациям:
/api/organizations/statistics

С фильтрацией по датам:
/api/organizations/statistics?date_from=2023-01-01&date_to=2023-12-31

По конкретным организациям:
/api/organizations/statistics?organizations[]=1&organizations[]=2

Комбинированная фильтрация:
/api/organizations/statistics?date_from=2023-06-01&organizations[]=5

Вывод структуры по организациям:
/api/organizations

Вывод структуры по операциям:
/api/operations
