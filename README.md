# tz
Тестовое задание

API-приложение на Laravel 12 и PHP 8.4 для работы с организациями и операциями между ними.

# Используемая среда
* Laravel 12
* PHP 8.4
* MySQL 5.6

# Установка

1. Клонирование репозитория в локальную папку:

git clone https://github.com/Fabris1973/tz

cd tz

2. Установка зависимостей:

composer install
npm install

3.Настройка окружения:

cp .env.example .env
php artisan key:generate

4.Настройка базы данных в .env.

DB_DATABASE=[имя вашей базы данных]
DB_USERNAME=[имя пользователя]
DB_PASSWORD=[пароль к БД]

5. Запуск миграций:

php artisan migrate --seed


# Ссылки для тестирования

1. Статистика по организациям:

/api/organizations/statistics   

3. С фильтрацией по датам:

/api/organizations/statistics?date_from=2023-01-01&date_to=2023-12-31

3. По конкретным организациям:

/api/organizations/statistics?organizations[]=1&organizations[]=2

4. Комбинированная фильтрация:

/api/organizations/statistics?date_from=2023-06-01&organizations[]=5

5. Вывод структуры по организациям:

/api/organizations

6. Вывод структуры по операциям:

/api/operations
