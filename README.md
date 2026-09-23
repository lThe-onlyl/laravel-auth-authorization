# Laravel Auth & Authorization

An educational Laravel project demonstrating user authentication, authorization, and role-based access control.

## Features

- User registration and authentication with Laravel Breeze
- User authentication
- Role-based access control with `user` and `admin` roles
- `is_admin` field in the `users` table
- `UserPolicy` for checking user permissions
- Authorization for accessing the user list
- Protected `/users` route
- Access control testing for unauthenticated users, regular users, and administrators

## Technologies

- PHP
- Laravel
- Laravel Breeze
- MySQL
- Blade
- Vite
- JavaScript
- CSS

## Installation

Clone the repository:

```bash
git clone https://github.com/lThe-onlyl/laravel-auth-authorization.git
cd laravel-auth-authorization
```

Install dependencies:

```bash
composer install
npm install
```

Create the `.env` file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your MySQL database connection in `.env`.

Run the database migrations:

```bash
php artisan migrate
```

Build the frontend:

```bash
npm run build
```

Start the development server:

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

## Main Route

```text
/users
```

The route returns a list of all registered users and is accessible only to administrators.

Authorization is handled through `UserPolicy`:

```php
public function viewAny(User $user): bool
{
    return $user->is_admin;
}
```
