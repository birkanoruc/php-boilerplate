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

## Database Setup

The project includes a database schema file, `php_boilerplate.sql`, located in the root directory. You will need to import this file into your MySQL database to set up the necessary tables.

### Steps to import the SQL file:

1. Open your MySQL database management tool (e.g., phpMyAdmin, MySQL Workbench, or command line).
2. Create a new database with the name mentioned in your `.env` file.
3. Import the `php_boilerplate.sql` file into this database.
   - If using phpMyAdmin, select the database and use the **Import** tab to upload the SQL file.
   - If using the command line, run the following command:
     ```bash
     mysql -u your_username -p your_database_name < php_boilerplate.sql
     ```

Make sure the database details in your `.env` file match the newly created database.

### Database Configuration::

Enter your database connection information in the `.env` file.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

## Structure

The project has the following folder structure:

- **App/**: Core application files. Used for the MVC structure.
- **Core/**: Core classes and fundamental functions of the project.
- **vendor/**: Dependencies installed via Composer.
- **index.php**: The main entry point of the application, responsible for routing the request and bootstrapping the app.

### Routing

To add a simple route, you can add a new path in the `App/Routes.php` file:

```php
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', 'App\Controllers\HomeController@index');
```

For more details, you can check the SimpleRouter library.

### Controller

To create a new controller, add a new class in the App/Controllers directory:

```php
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view('home.index');
    }
}
```

### Validation

You can perform form validation using the Respect\Validation library:

```php
use Respect\Validation\Validator as v;

$input = $_POST['email'];
$validation = v::email()->validate($input);

if (!$validation) {
    echo "Invalid email address.";
}
```
