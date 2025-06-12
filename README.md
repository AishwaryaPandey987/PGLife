🏠 PG Life – Backend Setup Guide
This guide will help you set up the backend for the PG Life website on your local system.

✅ Branch Info: All backend source code resides in the master branch of this repository.

📦 Requirements
Before setting up, make sure the following are installed:

XAMPP (for Apache + MySQL)

PHP >= 7.4

MySQL

Git

Web Browser (e.g., Chrome)

A code editor (like VS Code)

📁 Folder Structure
bash
Copy
Edit
/PGLife
│
├── api/                      # PHP APIs (e.g., get_properties_by_location.php)
├── includes/                 # DB connection and utility functions
├── img/                      # Images (property, user, etc.)
├── css/                      # Stylesheets
├── js/                       # JavaScript files
├── index.html                # Main HTML page
├── ...
🔧 Backend Setup Steps
1. 🔁 Clone the Repository
bash
Copy
Edit
git clone https://github.com/AishwaryaPandey987/PGLife.git
cd PGLife
git checkout master
2. 🚀 Start XAMPP
Open XAMPP.

Start Apache and MySQL modules.

3. 🗄️ Create the Database
Go to http://localhost/phpmyadmin/

Create a new database called:

sql
Copy
Edit
pglife
4. 🧱 Run SQL Queries to Setup Tables
Open the phpMyAdmin SQL tab and run the following queries:

📍 locations table
sql
Copy
Edit
CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
🏠 properties table
sql
Copy
Edit
CREATE TABLE properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_id INT NOT NULL,
    name VARCHAR(255),
    address TEXT,
    description TEXT,
    gender ENUM('male', 'female'),
    rent INT,
    rating_clean FLOAT,
    rating_food FLOAT,
    rating_safety FLOAT,
    FOREIGN KEY (location_id) REFERENCES locations(id)
);
👤 users table
sql
Copy
Edit
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    phone VARCHAR(15),
    gender ENUM('male', 'female')
);
⭐ interested_users_properties table
sql
Copy
Edit
CREATE TABLE interested_users_properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    property_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (property_id) REFERENCES properties(id)
);
💳 payments table
sql
Copy
Edit
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255),
    card_number VARCHAR(20),
    card_expire VARCHAR(10),
    card_cvv VARCHAR(10),
    email VARCHAR(255)
);
🧾 booked_users_properties table
sql
Copy
Edit
CREATE TABLE booked_users_properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    payment_id INT,
    user_id INT,
    property_id INT,
    FOREIGN KEY (payment_id) REFERENCES payments(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (property_id) REFERENCES properties(id)
);
5. 🖼️ Add Images (Optional)
Place your property/user images inside the /img/properties/{property_id}/ directory.

6. 🔌 Configure DB Connection
Open includes/database_connect.php and ensure your DB credentials match your local MySQL setup:

php
Copy
Edit
$host = "localhost";
$username = "root";
$password = "";
$database = "pglife";
🌐 Access Your Project
Open your browser and go to:

arduino
Copy
Edit
http://localhost/PGLife/

📬 Need Help?
If you face any issues, feel free to open an i!
ssue in this repository.

[Screenshot 2025-06-12 122654](https://github.com/user-attachments/assets/07c1e88b-ed0c-4149-952b-644d51ec480a)




![Screenshot 2025-06-12 122715](https://github.com/user-attachments/assets/8c052e98-b658-48a8-abe0-eea38275cb30)





![Screenshot 2025-06-12 122746](https://github.com/user-attachments/assets/1ae81d0e-7831-4be1-859c-3ea8320eb329)
