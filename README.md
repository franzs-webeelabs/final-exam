<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Project Setup Guide

This guide explains how to install, configure, and run this Laravel application.

Git (optional)
- PHP ≥ 8.1
- Composer
- MySQL / MariaDB (or another supported database)
- Node.js & NPM

### Installation

```composer install```

### Environment Setup

Copy the example environment file:

```cp .env.example .env```

Update your .env file with database details:

```
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Laravel UI Setup

```
npm install
```

```
npm run dev
```
## Database Migrations

```
php artisan migrate
```

## Run the Application

```
php artisan serve
```
