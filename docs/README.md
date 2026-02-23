# 🪶 Quill - Luxe Blog Platform
A minimalist yet luxurious blogging platform where authors craft elegant posts, admins oversee content, and viewers enjoy a premium reading experience.

![Quill Dashboard]
<img width="1920" height="961" alt="Screenshot 2026-02-23 092236" src="https://github.com/user-attachments/assets/fc5c76c2-37a6-4fcf-a375-ac64d60f539a" />
<img width="1920" height="971" alt="Screenshot 2026-02-23 092254" src="https://github.com/user-attachments/assets/086471a2-b199-45d9-86cc-32e6ad7fc6c2" />

## 🌟 Overview

Quill is a sophisticated blogging platform designed with elegance and simplicity in mind. It features a three-tier role-based system that provides tailored experiences for different user types, all wrapped in a beautiful, responsive interface with warm gold accents and premium typography.

## ✨ Key Features

### 👥 Role-Based Access
- **Viewers** - Browse and read published posts with an elegant, distraction-free interface
- **Authors** - Create, edit, and manage their own posts with draft/publish functionality
- **Admins** - Full platform control including user management and post moderation

### 📝 Content Management
- Rich text editor for creating beautiful posts
- Draft and publish workflow
- Featured image upload support
- Tag system for categorizing content
- Post preview and excerpt generation

### 🎨 Luxe Design
- Premium typography with Playfair Display (headings) and Lora (body)
- Warm gold accent colors (#C9A66B) on rich black backgrounds
- Smooth animations and hover effects
- Fully responsive design for all devices
- Card-based post layouts with featured images

### 🔒 Security
- Password hashing with `password_hash()`
- Session-based authentication
- Role-based access control
- Prepared statements for SQL injection prevention
- Input sanitization against XSS attacks

## 🛠️ Tech Stack

### Backend
- **PHP** (>=7.4) - Core application logic
- **MySQL** - Database management
- **PDO** - Secure database connections with prepared statements

### Frontend
- **HTML5** - Semantic structure
- **CSS3** - Custom properties, Flexbox, Grid, animations
- **JavaScript** - Vanilla JS for interactivity, rich text editor
- **Font Awesome** - Icons for better UI
- **Google Fonts** - Playfair Display & Lora typography

## 📁 Project Structure

quill/

├── assets/

│ ├── css/

│ │ └── styles.css # Main stylesheet

│ ├── js/

│ │ └── script.js # JavaScript functionality

│ └── images/ # Logos and post thumbnails

├── includes/

│ ├── config.php # Database configuration

│ └── functions.php # Core utility functions

├── src/

│ ├── admin/

│ │ └── dashboard.php # Admin management panel

│ ├── auth/

│ │ └── auth.php # Login/register functionality

│ ├── author/

│ │ ├── dashboard.php # Author post management

│ │ ├── create.php # Create new post

│ │ └── edit.php # Edit existing post

│ └── viewer/

│ ├── index.php # Browse all posts

│ └── view.php # View single post

├── index.php # Landing page

├── schema.sql # Database structure

└── README.md # This file


## 🗄️ Database Schema

### Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('viewer', 'author', 'admin') NOT NULL DEFAULT 'viewer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Posts Table

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author_id INT NOT NULL,
    status ENUM('draft', 'published') NOT NULL DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
);
Images Table
sql
CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    is_featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);
Tags Tables

CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    slug VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE post_tags (
    post_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (post_id, tag_id),
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

 Installation & Setup
Prerequisites
Web server (Apache/Nginx) or XAMPP/WAMP/MAMP

PHP >= 7.4

MySQL

Git

Step-by-Step Installation
Clone the Repository

git clone https://github.com/Varsha-012005/quill.git
cd quill
Set Up the Database

Create a MySQL database named quill

Import the schema:


mysql -u root -p quill < schema.sql
Configure Database Connection
Edit includes/config.php with your database credentials:


define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'quill');
define('BASE_URL', 'http://localhost/quill');
Set Directory Permissions
Ensure the assets/images/ directory has write permissions for image uploads:


chmod -R 755 assets/images/
Run the Application

Start your web server and MySQL

Navigate to http://localhost/quill

Register a new account or use default credentials

 Default User Roles
Role	Permissions
Viewer	Read published posts, search
Author	Create/edit/delete own posts, save drafts
Admin	Full control over users and posts

User Flows
For Viewers
Browse published posts on the homepage

Click any post to read in full-screen mode

Enjoy elegant typography and distraction-free reading

No login required for viewing

For Authors
Login to access author dashboard

View statistics and list of all posts

Create new posts with rich text editor

Save as draft or publish immediately

Edit or delete existing posts

Switch between published and draft views

For Admins
Access admin dashboard after login

View platform statistics (users, posts)

Manage all users and assign roles

Moderate all posts (edit/delete any)

Monitor platform activity




🔒 Security Features
Password Security: Passwords hashed with password_hash()

Session Management: Secure session handling with regeneration

Access Control: Role-based permissions at every page

SQL Injection: Prepared statements throughout

XSS Protection: Input sanitization with htmlspecialchars()

CSRF Protection: Form tokens for sensitive operations

📄 License
This project is licensed under the MIT License - see the LICENSE file for details.
