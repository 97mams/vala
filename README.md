# Livestock Management System 🐄🐖🐑

This is a PHP project that uses **Silex (as a router only)** and a **custom ORM** to manage livestock farming.

It helps farmers to:

- Store and manage livestock data
- Track treatments and medical history
- Receive notifications for upcoming treatments

---

## 🛠 Requirements

- PHP >= 7.4
- Composer
- MySQL
- Terminal / CLI access

---

## 📦 Installation

1. Clone the repository:

```bash
   git clone https://github.com/your-username/livestock-management.git
   cd livestock-management
```

2. Install dependencies using Composer:

```bash
composer install
```

3. Create your environment configuration file:

```bash
cp .env.example .env
```
The open .env and configure your MySql credentials(DB_HOST, DB_NAME, DB_PASSWORD, DB_USER).

## ⚙ Database Setup

This project uses a custom-built ORM to handle database creation and table management.

1. Create the database

```bash
php bin/app.php db:create
```

2. Create tables

You can generate a table by name using:

```bash
php bin/app.php db:table [name]
```

## 🚀 Features

. Livestock registration and health tracking
. Treatment scheduling and notifications
. Lightweight routing using Silex
. MySql database with fully custom ORM