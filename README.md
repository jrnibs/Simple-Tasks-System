# Simple Tasks System

A simple task management system built using PHP and MySQL to help users manage their tasks efficiently.

## 🚀 Features

- ✅ User Registration and Login
- 📝 Create, Edit, Delete Tasks
- 📌 Task Status: Pending & Completed
- 📅 Automatic Timestamps for Task Creation/Updates
- 📱 Responsive UI using Bootstrap
- 🔐 Session-Based Authentication

## 📸 Screenshots

Login
![image](https://github.com/user-attachments/assets/953b8a55-e4d0-4eb8-ac86-e63fbe6f0f3c)

Registration
![image](https://github.com/user-attachments/assets/c2dfad78-784b-4e3e-b94c-32931e02eed8)

Homepage
![image](https://github.com/user-attachments/assets/a28ba235-8476-4022-a23f-6c54372a38c8)

Task Management
![image](https://github.com/user-attachments/assets/32fbe1cf-cfeb-43a7-8663-e8f8231b4d67)

User Management
![image](https://github.com/user-attachments/assets/552ad6d2-c8b4-4342-845b-89006056b54f)



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
   ``` sql
   CREATE TABLE tbl_users (
      `user_id` int(11) NOT NULL,
      `fname` varchar(255) NOT NULL,
      `lname` varchar(255) NOT NULL,
      `username` varchar(255) NOT NULL,
      `password` varchar(255) NOT NULL,
      `address` text NOT NULL,
      `email` varchar(255) NOT NULL,
      `active` int(11) NOT NULL,
      `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      );
    
   CREATE TABLE tbl_tasks (
     `id` INT AUTO_INCREMENT PRIMARY KEY,
     `user_id` int(11) NOT NULL,
     `title` varchar(255) NOT NULL,
     `description` text NOT NULL,
     `status` int(11) NOT NULL,
     `color` text NOT NULL,
     `date_created` date NOT NULL DEFAULT current_timestamp()
   );

4. Configure your environment:
- Update the database.php or .env file with your database credentials:
   ``` bash
   private $host = 'localhost';
   private $db_name = 'your_db_name';
   private $username = 'your_db_username';
   private $password = 'your_db_password';

5. Run the application:
- If you're using Apache or Nginx, place the project in your htdocs (Apache) or www (Nginx) directory.
- Open your browser and navigate to http://localhost/your-project-folder/

## Usage

1. **Registration**: Register for an account to start managing tasks.
2. **Login**: Use your credentials to log in to the system.
3. **Create Tasks**: Once logged in, you can create new tasks with details such as title, description, and due date.
4. **Edit or Delete Tasks**: You can edit the task details or delete them if no longer needed.
5. **Mark as Completed**: You can change the status of tasks to "Completed" once done.

### Acknowledgements

- **PHP** The server-side scripting language used to build this project.
- **MYSQL** Database for storing user and task data.
- **Bootstrap** Front-end framework for responsive design.

### Contributing

Contributions are welcome! Please fork this repository, create a new branch, and submit a pull request with your proposed changes.

