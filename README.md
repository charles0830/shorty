<!-- Preview Image -->

[!Shorty](preview.png)

# Shorty — Vue & Laravel Powered URL Shortener

As the name suggests, Shorty shrinks your looooong boring URLs to pretty short URLs with ease! It's Vue and Laravel powered simple web application.

## Installation

Please check the [Laravel Official Documentation](https://laravel.com/docs/master/installation) installation guide for server requirements before you start.

First, clone this repo

```bash
git clone https://github.com/alnahian2003/shorty.git
```

Switch to the repo folder

```bash
cd shorty
```

Install all the dependencies using composer and npm

```bash
composer install
```

```bash
npm install
```

Copy the `.env.example` file and make the required configuration changes in the .env file

```bash
cp .env.example .env
```

Generate a new application key

```bash
php artisan key:generate
```

Create a symbolic link from `public/storage` to `storage/app/public`

```bash
php artisan storage:link
```

Run the database migrations (Set the database connection in .env before migrating)

```bash
php artisan migrate
```

Start the local development server

```bash
php artisan serve
```

Start Vite for bundling the assets or Hot Module Reload (required)

```bash
npm run dev
```

**You can now access the server at http://localhost:8000.**

### TL;DR

All the command list

```bash
git clone https://github.com/alnahian2003/shorty.git
```

```bash
cd shorty
```

```bash
composer install
```

```bash
npm install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
php artisan storage:link
```

```bash
php artisan migrate
```

```bash
php artisan serve
```

```bash
npm run dev
```

## Database Seeding

Populate the database with seed data that includes relationships. This can help you to quickly get started and explore inside out of this project.

Run the database seeder, and this will do it!

```bash
php artisan db:seed
```

Note : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

```bash
php artisan migrate:refresh
```

## Tech Stack

**Client Side:** TailwindCSS, Vue 3

**Server Side:** PHP, Laravel

**Database:** Sqlite 3


## Support

For support, [contact me](https://alnahian2003.github.io#contact) or pull an issue.