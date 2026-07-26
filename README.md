# FitTrack

This repository contains the **FitTrack** web application developed using **Laravel 13**. The system is designed to manage gym memberships, workout plans, workout videos, attendance, payments, and user progress. It provides separate dashboards for administrators and users with a responsive and easy-to-use interface.

---

# Project Structure

- **Backend** - Laravel 13 framework developed using PHP with MVC Architecture and Eloquent ORM.
- **Frontend** - HTML5, CSS3, Bootstrap 5, JavaScript, and Blade Templates.
- **Database** - MySQL Database.

---

# Setup Instructions

## Prerequisites

Before running the project, make sure the following software is installed:

- PHP 8.x
- Composer
- MySQL
- Node.js & NPM
- Laravel 13

---

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/sonarbhagyashri15/FitTrack.git
```

### 2. Open the Project Folder

```bash
cd FitTrack
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Install Node Packages

```bash
npm install
```

### 5. Create Environment File

```bash
copy .env.example .env
```

### 6. Generate Application Key

```bash
php artisan key:generate
```

### 7. Configure Database

Open the **.env** file and update your database configuration.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fittrack
DB_USERNAME=root
DB_PASSWORD=
```

### 8. Run Database Migration

```bash
php artisan migrate
```

### 9. Start the Development Server

```bash
php artisan serve
```

The application will be available at:

```
http://127.0.0.1:8000
```

---

# Project Modules

## Admin Module

The administrator can perform the following operations:

- Manage Membership Plans
- Manage Workout Plans
- Manage Workout Videos
- Manage Attendance
- Manage User Progress
- Manage Payments
- Add, Edit and Delete Records
- View Dashboard

---

## User Module

Registered users can perform the following operations:

- Register and Login
- Purchase Membership Plans
- View Membership Details
- Watch Workout Videos
- View Attendance
- View Workout Plans
- Track Personal Progress
- View BMI Details

---

# Technologies Used

- Laravel 13
- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- Blade Template Engine
- Eloquent ORM

---

# Key Features

- Secure User Authentication
- Admin Dashboard
- Membership Management
- Workout Plan Management
- Workout Video Management
- Attendance Management
- Payment Management
- Progress Tracking
- BMI Calculation
- Responsive User Interface
- CRUD Operations
- Form Validation

---

# Building for Production

To optimize the application for production:

```bash
php artisan config:cache
```

```bash
php artisan route:cache
```

```bash
php artisan view:cache
```

```bash
npm run build
```

---

# Contributing

If you would like to contribute:

1. Fork the repository.
2. Create a new branch.
3. Commit your changes.
4. Push your branch.
5. Create a Pull Request.

---

# License

This project was developed for academic and educational purposes.

---

# Developer

**Name:** Bhagyashri Sonar

**Project:** FitTrack

**Framework:** Laravel 13

**Database:** MySQL

**Frontend:** HTML5, CSS3, Bootstrap 5

**Backend:** PHP (Laravel)

**Course:** Master of Computer Applications (MCA)
