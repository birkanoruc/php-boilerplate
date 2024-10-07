# PHP Boilerplate

A beginner project to develop a web application based on MVC architecture with PHP. This boilerplate offers a minimal structure with popular packages and allows you to quickly start a project.

## Requirements

- PHP >= 8.0
- Composer
- XAMPP or a PHP compatible web server (e.g. Apache, Nginx)

## Packages Used

- **[Windwalker Edge](https://github.com/windwalker-io/edge)**: Lightweight template engine similar to Blade.
- **[Illuminate Database](https://laravel.com/docs/10.x/eloquent)**: Laravel Eloquent ORM is used for database connection and querying.
- **[Pecee Simple Router](https://github.com/skipperbent/simple-php-router)**: A simple yet powerful PHP router.
- **[vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)**: Allows you to easily work with environment variables.
- **[Bootstrap](https://getbootstrap.com/)**: Popular CSS framework for UI.
- **[Respect Validation](https://respect-validation.readthedocs.io/en/latest/)**: Strong validation rules in PHP.

## Installation

1. **Clone the repository:**:
   ```bash
   git clone https://github.com/birkanoruc/php-boilerplate.git
   ```
2. **Go to project directory**:
   ```bash
   cd php-boilerplate
   ```
3. **Install dependencies via Composer:**:
   ```bash
   composer install
   ```
4. **Create Bootstrap directory:**:
   ```bash
   mkdir -p public/assets/bootstrap
   ```
5. **Copy Bootstrap files to the public directory:**:
   ```bash
   cp -r vendor/twbs/bootstrap/dist/* public/assets/bootstrap
   ```
6. **Database configuration:**:

Enter your database connection information in the `.env` file.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```
