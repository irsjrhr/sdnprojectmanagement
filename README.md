# Arxino Project Management System

## About the Application
Arxino Project Management System is a comprehensive web-based platform designed to streamline and manage IT projects. It facilitates collaboration, tracking, and reporting for teams, ensuring efficient project delivery from inception to completion.

### Key Features
- **User Authentication & Authorization**: Secure login for staff and clients, with roles tailored for different levels of access.
- **Project Tracking**: Monitor project progress, milestones, and deliverables.
- **Task Management**: Create, assign, and track tasks for team members.
- **Client Portal**: Dedicated access for clients to view project updates and progress.
- **Reporting**: Generate insights and project status reports.

## Technology Stack
This application is built using the [Laravel PHP Framework](https://laravel.com), providing a robust, scalable, and secure architecture.

## Requirements

Sebelum menginstal proyek ini, pastikan sistem Anda memenuhi persyaratan minimum berikut:
- **PHP**: >= 8.3
- **Composer**: Untuk manajemen dependensi PHP
- **Node.js & NPM**: Untuk build frontend (Vite & TailwindCSS)
- **Database**: MySQL / PostgreSQL / SQLite (sesuai preferensi)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/teguhpriyadi89-spec/arxino-project-management.git
   ```
2. Navigate to the project directory:
   ```bash
   cd arxino-project-management
   ```
3. Install dependencies:
   ```bash
   composer install
   npm install
   ```
4. Copy the environment file and configure your database settings:
   ```bash
   cp .env.example .env
   ```
5. Generate application key:
   ```bash
   php artisan key:generate
   ```
6. Run database migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
7. Serve the application:
   ```bash
   php artisan serve
   ```

## License
This project is proprietary and confidential. All rights reserved by Arxino.
