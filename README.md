# Laravel Auth, Authorization & Product API

An educational Laravel project demonstrating user authentication, authorization, role-based access control, external service notifications, and a RESTful Product API.

## Features

- User registration and authentication with Laravel Breeze
- Role-based access control with `user` and `admin` roles
- `is_admin` field in the `users` table
- `UserPolicy` for checking user permissions
- Authorization for accessing the user list
- Protected `/users` route
- Access control testing for unauthenticated users, regular users, and administrators
- Welcome email notification after user registration
- Telegram notification after user registration
- Event and Listener implementation for registration notifications
- SMTP email integration
- Telegram Bot API integration
- Product CRUD REST API
- Product model, migration, factory, and seeder
- API validation for creating and updating products
- Feature tests for all Product API operations
- Postman API testing

## Product API

The project provides a RESTful API for managing products.

### Available endpoints

| Method    | Endpoint                  | Description          |
| --------- | ------------------------- | -------------------- |
| GET       | `/api/products`           | Get all products     |
| GET       | `/api/products/{product}` | Get a single product |
| POST      | `/api/products`           | Create a product     |
| PUT/PATCH | `/api/products/{product}` | Update a product     |
| DELETE    | `/api/products/{product}` | Delete a product     |

### Product fields

- `sku` — product SKU
- `name` — product name
- `price` — product price

Products can be generated using the `ProductFactory` and `ProductsSeeder`.

## Technologies

- PHP
- Laravel
- Laravel Breeze
- MySQL
- Blade
- Vite
- JavaScript
- CSS
- REST API
- SMTP
- Telegram Bot API
- Postman

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

### Email Configuration

Configure your SMTP credentials in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

For Gmail, use an App Password instead of your regular Google account password.

### Telegram Configuration

Add your Telegram bot credentials to `.env`:

```env
TELEGRAM_BOT_TOKEN=your_bot_token
TELEGRAM_CHANNEL_ID=your_chat_id
```

Do not commit `.env` or expose your actual credentials.

After changing `.env`, clear the configuration cache:

```bash
php artisan optimize:clear
```

Run the database migrations:

```bash
php artisan migrate
```

Seed the Product data:

```bash
php artisan db:seed --class=ProductsSeeder
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

## Registration Notifications

After a new user registers, the application sends:

- A welcome email using Laravel Mail and SMTP
- A Telegram notification using the Telegram Bot API
- Registration notifications are handled through the `UserRegistered` event and `UserRegisteredListener`

## Testing

Run the complete test suite with:

```bash
php artisan test
```

The project includes tests for:

- Authentication
- Authorization
- User registration
- Profile management
- Product API operations

The Product API tests cover:

- Listing products
- Showing a product
- Creating a product
- Updating a product
- Deleting a product
