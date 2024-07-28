<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. It aims to make development a creative and enjoyable experience by simplifying common tasks such as:

- Routing
- Dependency Injection
- Session and Cache Storage
- Database ORM
- Schema Migrations
- Job Processing
- Event Broadcasting

## Project Overview

### Task Management Dashboard

This application provides a task management dashboard where authenticated users can manage projects and tasks. It uses Laravel for the backend, Livewire for real-time updates, and TailwindCSS for a modern, responsive UI.

### Requirements

1. **User Authentication**:
   - Implement user registration, login, and logout using Laravel's built-in authentication.

2. **Projects and Tasks**:
   - Users can create, update, and delete projects.
   - Each project can have multiple tasks.
   - Tasks can be marked as complete or incomplete.
   - Use Livewire to manage interactions for creating, updating, deleting, and marking tasks.

3. **Dashboard**:
   - Display a dashboard showing all projects and their associated tasks.

4. **Styling**:
   - Use TailwindCSS to design a clean, modern, and user-friendly interface.

5. **API**:
   - Build an API to handle the above functionalities.

## API Endpoints

### Authentication

- **Register**: `POST /api/v1/auth/register`
- **Login**: `POST /api/v1/auth/login`
- **Logout**: `POST /api/v1/auth/logout` (Requires Bearer token)

### Projects

- **Get All Projects**: `GET /api/v1/projects/all` (Requires Bearer token)
- **Create Project**: `POST /api/v1/projects/create` (Requires Bearer token)
- **Show Project**: `GET /api/v1/projects/show/{id}` (Requires Bearer token)
- **Update Project**: `PUT /api/v1/projects/update/{id}` (Requires Bearer token)
- **Delete Project**: `DELETE /api/v1/projects/delete/{id}` (Requires Bearer token)

### Project Tasks

- **Get All Tasks for Project**: `GET /api/v1/projects/details/{projectId}/tasks` (Requires Bearer token)
- **Create Task**: `POST /api/v1/projects/details/{projectId}/tasks` (Requires Bearer token)
- **Show Task**: `GET /api/v1/projects/details/{projectId}/tasks/{taskId}` (Requires Bearer token)
- **Update Task**: `PUT /api/v1/projects/details/{projectId}/tasks/{taskId}` (Requires Bearer token)
- **Delete Task**: `DELETE /api/v1/projects/details/{projectId}/tasks/{taskId}` (Requires Bearer token)
- **Tasks Ending After a Date**: `GET /api/v1/projects/details/{projectId}/tasks/ending-after/{date}` (Requires Bearer token)

## License

Laravel is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
