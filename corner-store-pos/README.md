# Corner Store POS

A four-page Laravel application for IT0049 Technical Formative Assessment 5, **From Zero to Four Pages**.

The project has a landing page, an about page, a customer directory, and a user directory. Both account lists use static PHP arrays in their controllers. The interface uses a shared Blade layout and plain CSS.

## Requirements

- PHP 8.3 or newer
- Composer 2
- PHP extensions required by Laravel, plus SQLite support (`pdo_sqlite` and `sqlite3`) for migrations and database tests

There is no frontend build step. The stylesheet is in `public/css/style.css`, so Node.js and npm are not needed.

## Run locally

Extract the project, open a terminal inside its root folder, and run:

```sh
composer install
composer run setup
php artisan serve
```

Open **http://127.0.0.1:8000** in your browser. Keep the terminal running while using the application.

The setup command copies `.env.example` to `.env` when needed, generates an application key, creates the SQLite file, and runs the migrations and seeders. Run setup once on a fresh installation; it generates a new key each time. To reseed an existing installation, use `php artisan db:seed` instead.

If a PHP extension is missing, enable it in the `php.ini` used by your terminal. `php --ini` shows the loaded configuration file. `php -m` lists enabled extensions.

## Pages

| URL | Controller method | Blade view |
| --- | --- | --- |
| `/` | `PageController::index` | `home.blade.php` |
| `/about` | `PageController::about` | `about.blade.php` |
| `/customers` | `CustomerController::index` | `customers/index.blade.php` |
| `/users` | `UserController::index` | `users/index.blade.php` |

Every page includes navigation to the other three pages. Both account tables contain five sample records and use `@foreach` to display them. The tables scroll horizontally on small screens.

## Main project files

```text
app/
  Http/Controllers/
    PageController.php
    CustomerController.php
    UserController.php
  Models/
    Customer.php
    User.php
database/
  migrations/
  seeders/
    CustomerSeeder.php
    UserSeeder.php
    DatabaseSeeder.php
public/css/style.css
resources/views/
  layouts/app.blade.php
  home.blade.php
  about.blade.php
  customers/index.blade.php
  users/index.blade.php
routes/web.php
tests/Feature/
```

Routes select a controller method. Each controller returns a Blade view, and the two account controllers also pass their arrays to the view. The layout holds the shared header, navigation, and footer. The views handle the page markup and table loops.

## Sample data and database files

The customer and user pages intentionally read the arrays in their controllers, as required by the activity. Changing the database will not change those tables. To edit the displayed sample records, edit `CustomerController.php` or `UserController.php`.

Migrations and seeders are included to meet the database submission requirement. They create customer and user tables containing the same sample account details. The seeders can run more than once without duplicating records. If you change the controller arrays, update the matching seeder too.

```sh
php artisan migrate --seed
```

The user seeder generates random hashed passwords for new sample users. This activity does not include sign-in, registration, account editing, sales, or inventory features.

`.env`, the generated SQLite database, and the `vendor` folder are excluded from Git. The migrations and seeders recreate the sample database, so a database export is not needed.

## Inspect and test

```sh
php artisan about
php artisan route:list --except-vendor
php artisan test
```

The feature tests check the four page responses and navigation, the five rendered rows in each account table, the account pages' independence from the database, and the migrations and seeders. Database tests use an in-memory SQLite database.

A GitHub Actions workflow runs the tests on pushes and pull requests.

## Upload to a new GitHub repository

1. Create a new empty repository on GitHub.
2. Upload the **contents of this project folder**, including dotfiles such as `.env.example`, `.gitignore`, and `.github/workflows/tests.yml`. The `artisan` and `composer.json` files should be at the repository root.
3. Do not upload the ZIP itself as the only project file. Do not upload your generated `.env`, `vendor`, or SQLite database.

For a Git upload, run these commands from the project root after replacing the URL with your new repository's URL:

```sh
git init
git add .
git commit -m "Add Laravel POS foundations project"
git branch -M main
git remote add origin https://github.com/YOUR-USERNAME/YOUR-REPOSITORY.git
git push -u origin main
```

## Hosting

Hosting is still required before final submission. Use a host that supports PHP 8.3 or newer and Laravel. A GitHub repository alone does not run the application.

1. Deploy this repository to the host.
2. Set the web server's document root to the project's `public` directory.
3. Run `composer install --no-dev --optimize-autoloader`.
4. Create the production `.env` and set `APP_ENV=production`, `APP_DEBUG=false`, and `APP_URL` to the real HTTPS address. Keep `SESSION_DRIVER=file` and `CACHE_STORE=file`, or configure the host's supported alternatives.
5. Generate a production key with `php artisan key:generate`. Keep this key when redeploying.
6. Ensure `storage` and `bootstrap/cache` are writable by the web server.
7. If using SQLite, create a persistent, writable database file and set `DB_DATABASE` to its absolute path. Run `php artisan migrate --seed --force`. Alternatively, configure the host's database connection before running the migrations.
8. Run `php artisan config:cache` and `php artisan view:cache`.
9. Visit `/`, `/about`, `/customers`, and `/users` on the hosted site and check the navigation and stylesheet.

See the [Laravel deployment documentation](https://laravel.com/docs/13.x/deployment) for the web server configuration. Do not expose the whole project directory as the public website.

## Before submitting

- Add your student or group details to this README if your professor requires them.
- Check that the GitHub repository contains the raw project files, migrations, seeders, and setup instructions.
- Check that all four pages work on the hosted application.
- Submit both the GitHub repository URL and the live application URL.

## References

- [Laravel installation](https://laravel.com/docs/13.x/installation)
- [Laravel routing](https://laravel.com/docs/13.x/routing)
- [Blade templates](https://laravel.com/docs/13.x/blade)
