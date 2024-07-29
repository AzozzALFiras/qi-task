<p align="center"><a href="https://qi.iq/" target="_blank"><img src="https://qi.iq/images/logo.svg?1=1" width="400" alt="QI Logo"></a></p>

## Project Overview

### Task Management Dashboard

This application provides a task management dashboard where authenticated users can manage projects and tasks. It uses Laravel for the backend, Livewire for real-time updates, and TailwindCSS for a modern, responsive UI.

## Table of Contents

1. **[Project Overview](#project-overview)**
   - [Task Management Dashboard](#task-management-dashboard)
   - [Requirements](#requirements)
   - [Installation](#Installation)


2. **[[API Endpoints](#api-endpoints)](https://github.com/AzozzALFiras/qi-task/tree/main/api)**
3. **[Screenshots](#screenshots)**


   ## Installation

Before you begin, ensure you have met the following requirements:

- **PHP**: ^8.1
- **GuzzleHTTP**: ^7.2
- **Laravel Framework**: ^10.10
- **Laravel Sanctum**: ^3.3
- **Laravel Tinker**: ^2.8
- **Livewire**: ^3.5
- **Composer**: For managing PHP dependencies


## Installation

To install and set up the project, follow these steps:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/AzozzALFiras/qi-task.git
   cd qi-task
   ```

   2. **Install Dependencies**
   #### Use Composer to install the PHP dependencies specified in composer.json.

   ```bash
   composer install
   ```


3. **Set Up Environment**
   #### Copy the .env.example file to .env and configure your environment variables as needed.

   ```bash
   cp .env.example .env
   ```

   4. **Generate Application Key**
   #### Run the following command to generate a new application key.

   ```bash
   php artisan key:generate
   ```

      5. **Run Migrations**
   #### Migrate the database to create the necessary tables.

   ```bash
   php artisan migrate
   ```
   
      6. **Start the Development Servers**
   #### Use Laravel’s built-in server to start the application.
   ```bash
   php artisan serve
   ```

    

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



## Screenshots

![Welcome Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/1.png)

![Dashboard Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/2.png)

![Projects Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/3.png)

![Create New Projects Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/4.png)

![Update Projects Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/5.png)

![Add New Task For Projects Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/6.png)

![Alerts Success etc Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/7.png)

![Edit Tasks Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/8.png)

![Update Tasks Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/9.png)

![Show Tasks Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/10.png)

![Profile edit Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/11.png)

![Password & Delete Account Page](https://raw.githubusercontent.com/AzozzALFiras/qi-task/main/Screenshots/12.png)

