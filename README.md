# Simple Tasks System

A simple task management system built using PHP and MySQL to help you organize, manage, and track your tasks.

## Features
- **User Authentication**: Register and log in to manage your tasks.
- **Task Creation**: Create new tasks with titles, descriptions, and deadlines.
- **Task Editing**: Update task details or change their status.
- **Task Deletion**: Remove tasks from your list.
- **Task Filtering**: View tasks by their status (Pending, Completed).
- **Responsive Design**: Accessible on both desktop and mobile.

## Screenshots

_Add some screenshots of your application here._

## Installation

### Prerequisites

Before setting up the system, ensure you have the following installed on your system:

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Apache or Nginx](https://httpd.apache.org/) (or any other PHP-supported web server)
- [Composer](https://getcomposer.org/) (for PHP dependency management)

### Setup

1. Clone the repository:
   ```bash
   
   git clone https://github.com/jrnibs/Simple-Tasks-System.git

2. Navigate to the project folder:
   ```bash
   
   cd Simple-Tasks-System

3. Set up your database:
   - Create a MySQL database for the application.
   - Import the database schema (usually in a .sql file) to create the necessary tables.
   - Alternatively, you can create the tables manually with the following SQL queries:
 ```sql
   CREATE TABLE tbl_users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(100) NOT NULL,
      password VARCHAR(255) NOT NULL
    );
    
    CREATE TABLE tbl_tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        status ENUM('Pending', 'Completed') DEFAULT 'Pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

4. Configure your environment:
   - Update the database.php or .env file with your database credentials:
```php
    private $host = 'localhost';
    private $db_name = 'your_db_name';
    private $username = 'your_db_username';
    private $password = 'your_db_password';

5. Run the application:
  - If you're using Apache or Nginx, place the project in your htdocs (Apache) or www (Nginx) directory.
  - Open your browser and navigate to http://localhost/your-project-folder/

## Usage

1. **Registration **: Register for an account to start managing tasks.
2. **Login **: Use your credentials to log in to the system.
3. **Create Tasks **: Once logged in, you can create new tasks with details such as title, description, and due date.
4. **Edit or Delete Tasks **: You can edit the task details or delete them if no longer needed.
5. **Mark as Completed **: You can change the status of tasks to "Completed" once done.

### Setup

This project is open-source and available under the MIT License.

### Acknowledgements

- **PHP ** The server-side scripting language used to build this project.
- **MYSQL ** Database for storing user and task data.
- **Bootstrap ** Front-end framework for responsive design.
