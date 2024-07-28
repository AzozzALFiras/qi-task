<p align="center"><a href="https://qi.iq/" target="_blank"><img src="https://qi.iq/images/logo.svg?1=1" width="400" alt="QI Logo"></a></p>

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

#### Register

- **Endpoint**: `POST /api/v1/auth/register`
- **Request Body**:
   ```json
  {
    "name": "string",
    "email": "string",
    "password": "string"
  }
  ```

#### Login

- **Endpoint**: `POST /api/v1/auth/login`
- **Request Body**:
   ```json
 {
  "email": "string",
  "password": "string"
}
 ```

**Response Body**:
   ```json
  {
  "token": "string",
  "status"=> true,
  "message" => "Logged in successfully",
  "user": {
    "id": "integer",
    "name": "string",
    "email": "string"
  }
}
 ```

 #### Logout

- **Endpoint**: `POST /api/v1/auth/logout`
- **Headers**:
   ```json
 {
  "Authorization": "Bearer {token}"
}
 ```

 - **Response**:
   ```json
   {
  "message": "Successfully logged out."
}

 ```