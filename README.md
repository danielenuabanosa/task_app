Task Management App

Overview

The Task Management App is a web-based application developed using PHP and MySQL. It allows users to manage their tasks efficiently with features such as user authentication, task creation, search and filtering, and task prioritization.

Features

User Authentication: Secure login and registration.

Task Management: Create, edit, delete, and mark tasks as completed.

Search & Filtering: Easily find tasks based on keywords or status.

Task Prioritization: Categorize tasks based on priority levels.

Responsive UI: Mobile-friendly design with Bootstrap.

Technologies Used

Backend: PHP (MySQL for database management)

Frontend: HTML, CSS, Bootstrap, JavaScript

Database: MySQL
Installation

Clone the repository:

git clone https://github.com/your-repo/task-management-app.git

Navigate to the project directory:

cd task-management-app

Set up the database:

Create a MySQL database.

Import database.sql (provided in the project).

Configure database connection in config.php:

$conn = new mysqli('localhost', 'username', 'password', 'database_name');

Start a local server:

php -S localhost:8000

Open http://localhost:8000 in your browser.

Usage

Register for an account or log in.

Add new tasks and set priorities.

Search, filter, and manage tasks efficiently.

Log out when done.

Contribution

Feel free to fork the project and submit pull requests to enhance functionality.

License

This project is open-source and available under the MIT License.

