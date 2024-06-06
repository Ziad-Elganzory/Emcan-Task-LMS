# Laravel LMS (Learning Management System)

## Introduction

Laravel LMS is a simple Learning Management System built with Laravel. It allows administrators to create and manage courses and lessons, while users can enroll in courses and view their progress.

## Features

- User Authentication
- Role-based Access Control (Admin/User)
- Course Management
- Lesson Management
- User Enrollment in Courses

## Requirements

- PHP >= 8.0
- Composer
- Laravel 11.x
- MySQL or any other supported database

## Installation

### Clone the Repository

```bash
git clone https://github.com/yourusername/laravel-lms.git
cd laravel-lms
```

### Install Dependencies

```bash
composer install
npm install
```

### Environment Setup

#### Copy the .env.example file to .env and configure your environment variables

```bash
cp .env.example .env
```

#### Generate an application key

```bash
php artisan key:generate
```

### Database Setup

 1. Create a database for your application.
 2. Update the .env file with your database details:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

3. Run the migrations and seeders:

```bash
php artisan migrate --seed
```

### Running the Application

#### Start the local development server

```bash
php artisan serve
```

#### Compile the assets

```bash
npm run dev
```

## Usage

### Admin Operations

- Create Course: Navigate to the Courses page and click on "Add Course".
- Create Course: Navigate to the Courses page and click on "Add Course".
- Edit Course: Navigate to the course you want to edit and click on "Edit".
- Delete Course: Navigate to the course you want to delete and click on "Delete".
- Add Lesson: Navigate to the course and click on "Add Lesson".
- Edit Lesson: Navigate to the lesson you want to edit and click on "Edit".
- Delete Lesson: Navigate to the lesson you want to delete and click on "Delete".

### User Operations

- View Courses: Navigate to the Courses page to view all courses.
- Enroll in a Course: Click on "Enroll" button on the course page.
- View Enrolled Courses: Navigate to the "Enrollments" page.

### Middleware

- Auth Middleware: Ensures that only authenticated users can access certain routes.
- Admin Middleware: Ensures that only users with the 'admin' role can perform CRUD operations on courses and lessons.

### Models

- User: Represents a user of the application.
- Course: Represents a course.
- Lesson: Represents a lesson within a course.
- Enrollment: Represents a user's enrollment in a course.

### Controllers

- CoursesController: Handles CRUD operations for courses.
- LessonsController: Handles CRUD operations for lessons.
- EnrollmentController: Handles user enrollments.

### Seeders

#### A seeder for creating an admin user is included. To run the seeder

```bash
php artisan db:seed --class=AdminUserSeeder
```

### Admin Account

#### An admin user is created during the seeding process with the following credentials

- Email: <admin@example.com>
- Password: password

#### You can change these details in the AdminUserSeeder class before running the seeder

### Contributing

#### Feel free to fork the repository and make contributions. Pull requests are welcome
