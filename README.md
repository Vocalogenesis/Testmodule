# Testmodule
Модуль для тестирования обучающихся. Курсовая работа.

## Требования
- laravel@8.*
- composer@2.*
- laravel/ui@^3.2
```
composer require laravel/ui
```
## Установка
В composer.json проекта добавить
```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/Vocalogenesis/Testmodule.git"
    }
] 
```
Далее
```
composer require vocalogenesis/testmodule
php artisan ui:auth
php artisan ui bootstrap
npm i
npm run dev (2 раза если новый проект)
php artisan vendor:publish (выбираем TestmoduleServiceProvider)
php artisan migrate
php artisan testmodule:install
```

Модуль будет доступен по <домен>/tests для авторизованного пользователя.

## Если ошибки..................

- PHP Fatal error:  Allowed memory size of ??? bytes exhausted
_php.ini_
```
php_value memory_limit -1
```
- SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table users add unique users_email_unique(email))
Удалить таблицу users, в App/Providers/AppServiceProviders вставить 
use Illuminate\Support\Facades\Schema;
```php
public function boot()
{
    Schema::defaultStringLength(191);
}
```
