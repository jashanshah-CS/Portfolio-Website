# Jashan Shah – Personal Portfolio

A personal portfolio website built from scratch using HTML, CSS, JavaScript, and PHP, featuring a full blog system with authentication and post management.

Live site: https://jashan-shah.netlify.app
(blog post uploads are currently non-functional on this hosting domain - see the source code here for the full implementation)

## Features

- Responsive portfolio layout (Home, About, Highlights, Skills, Contact)
- Custom blog system with:
  - Login system to manage posts securely
  - Live preview before publishing a post
  - Filter posts by month, displayed in chronological order
- Dynamic skills section with animated progress indicators
- Fully responsive design across desktop, and mobile

## Tech Stack

- Frontend: HTML, CSS, JavaScript
- Backend: PHP
- Database: MySQL

## Database Setup

1. Create a new MySQL database
2. Import the schema:
   mysql -u your_username -p your_database_name < database/
   Or, using phpMyAdmin/MySQL Workbench, import database/ directly through the GUI.
3. Update your `config.php` with your database credentials (see `config.example.php`)

## Setup
1. Copy `config.example.php` and rename the copy to `config.php`
2. Fill in your actual database credentials in `config.php`

## Getting Started (Local Setup)

1. Clone this repository
   git clone https://github.com/jashanshah-CS/portfolio-website.git
2. Set up a local PHP server (e.g. using XAMPP or WAMP)
3. Import the database schema (see `/database` folder)
4. Update database credentials in the config file
5. Run the project through your local server
