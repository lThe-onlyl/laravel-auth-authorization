# Laravel Auth & Authorization

Учебный проект на Laravel, демонстрирующий механизмы аутентификации, авторизации и ролевой модели пользователей.

## Реализовано

- Регистрация и авторизация пользователей с Laravel Breeze
- Аутентификация пользователей
- Ролевая модель `user` / `admin`
- Поле `is_admin` в таблице `users`
- `UserPolicy` для проверки прав пользователя
- Авторизация доступа к списку пользователей
- Защищённый маршрут `/users`
- Проверка доступа для неавторизованных пользователей, обычных пользователей и администраторов

## Технологии

- PHP
- Laravel
- Laravel Breeze
- MySQL
- Blade
- Vite
- JavaScript
- CSS

## Установка

Клонировать репозиторий:

```bash
git clone https://github.com/lThe-onlyl/laravel-auth-authorization.git
cd laravel-auth-authorization
```

Установить зависимости:

```bash
composer install
npm install
```

Создать файл `.env`:

```bash
cp .env.example .env
```

Сгенерировать ключ приложения:

```bash
php artisan key:generate
```

Настроить подключение к MySQL в `.env`.

Создать таблицы базы данных:

```bash
php artisan migrate
```

Собрать frontend:

```bash
npm run build
```

Запустить приложение:

```bash
php artisan serve
```

После запуска приложение будет доступно по адресу:

```text
http://127.0.0.1:8000
```

## Основной маршрут

```text
/users
```

Маршрут возвращает список пользователей только администратору системы.

Проверка доступа выполняется через `UserPolicy`:

```php
public function viewAny(User $user): bool
{
    return $user->is_admin;
}
```
