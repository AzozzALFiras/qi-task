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
    "name": "string",
    "email": "string",
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

 **Response**:
   ```json
   {
     "message": "Successfully logged out."
   }
 ```

### Projects

#### Get All Projects

- **Endpoint**: `GET /api/v1/projects/all`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Response**:
   ```json
   [{
    "id": 9,
    "name": "Jana",
    "description": "Jana Project",
    "user_id": 1,
    "created_at": "2024-07-28T21:37:48.000000Z",
    "updated_at": "2024-07-28T21:37:48.000000Z",
    "deleted_at": null,
    "tasks": [{
        "id": 10,
        "name": "Hold",
        "description": null,
        "start_time": null,
        "end_time": null,
        "is_completed": 0,
        "project_id": 9,
        "created_at": "2024-07-28T21:52:48.000000Z",
        "updated_at": "2024-07-28T22:30:43.000000Z",
        "deleted_at": null
    }, {
        "id": 13,
        "name": "wdw",
        "description": "wdw",
        "start_time": "2024-07-29 01:12:00",
        "end_time": "2024-07-03 01:12:00",
        "is_completed": 1,
        "project_id": 9,
        "created_at": "2024-07-28T22:12:29.000000Z",
        "updated_at": "2024-07-28T22:32:31.000000Z",
        "deleted_at": null
    }]
}
 ```

 
 
 #### Create Project

- **Endpoint**: `POST /api/v1/projects/create`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Request Body**:
   ```json
{
  "name": "string",
  "description": "string"
}
```

 **Response Body**:
   ```json
{
  "id": "integer",
  "name": "string",
  "description": "string",
  "user_id": "integer"
}
```

#### Show Project

- **Endpoint**: `GET /api/v1/projects/show/{id}`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Request Body**:
   ```json
{
  "name": "string",
  "description": "string"
}
```

 **Response Body**:
   ```json
{
  "id": "integer",
  "name": "string",
  "description": "string",
  "user_id": "integer"
}
```


#### Update Project

- **Endpoint**: `PUT /api/v1/projects/update/{id}`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Request Body**:
   ```json
{
  "name": "string",
  "description": "string"
}
```

 **Response Body**:
   ```json
{
  "id": "integer",
  "name": "string",
  "description": "string",
  "user_id": "integer"
}
```

#### Delete Project

- **Endpoint**: `DELETE /api/v1/projects/delete/{id}`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Response Body**:
   ```json
   {
  "message": "Project deleted successfully."
}

```


### Project Tasks

#### Get All Tasks for Project

- **Endpoint**: `GET /api/v1/projects/details/{projectId}/tasks`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Response Body**:
   ```json
   [{
    "id": 6,
    "name": "task",
    "description": null,
    "start_time": null,
    "end_time": null,
    "is_completed": 1,
    "project_id": 8,
    "created_at": "2024-07-28T19:43:55.000000Z",
    "updated_at": "2024-07-28T19:43:55.000000Z",
    "deleted_at": null
}, {
    "id": 8,
    "name": "task",
    "description": null,
    "start_time": null,
    "end_time": null,
    "is_completed": 0,
    "project_id": 8,
    "created_at": "2024-07-28T19:45:03.000000Z",
    "updated_at": "2024-07-28T19:45:03.000000Z",
    "deleted_at": null
}]
   ```


 #### Create Task

- **Endpoint**: `POST /api/v1/projects/details/{projectId}/tasks`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Request Body**:
   ```json
   {
  "name": "string",
  "description": "string",
  "start_time": "string",
  "end_time": "string",
  "is_completed": "boolean"
}

   ```

 **Response Body**:
   ```json
   {
  "id": "integer",
  "name": "string",
  "description": "string",
  "start_time": "string",
  "end_time": "string",
  "is_completed": "boolean",
  "project_id": "integer"
}
```

#### Show Task

- **Endpoint**: `GET /api/v1/projects/details/{projectId}/tasks/{taskId}`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Response Body**:
   ```json
  {
  "id": "integer",
  "name": "string",
  "description": "string",
  "start_time": "string",
  "end_time": "string",
  "is_completed": "boolean",
  "project_id": "integer"
}
```

 #### Update Task

- **Endpoint**: `PUT /api/v1/projects/details/{projectId}/tasks/{taskId}`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Request Body**:
   ```json
   {
  "name": "string",
  "description": "string",
  "start_time": "string",
  "end_time": "string",
  "is_completed": "boolean"
}
```

 **Response Body**:
   ```json
 {
  "id": "integer",
  "name": "string",
  "description": "string",
  "start_time": "string",
  "end_time": "string",
  "is_completed": "boolean",
  "project_id": "integer"
}

```

#### Delete Task

- **Endpoint**: `DELETE /api/v1/projects/details/{projectId}/tasks/{taskId}`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```

 **Response Body**:
   ```json
   {
  "message": "Task deleted successfully."
}
```


#### Tasks Ending After a Date

- **Endpoint**: `GET /api/v1/projects/details/{projectId}/tasks/ending-after/{date}`
- **Headers**:
   ```json
  {
    "Authorization": "Bearer {token}"
  }
  ```


 **Response Body**:
   ```json
{
  "count": "integer"
}
```

