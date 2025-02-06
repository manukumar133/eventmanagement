# Event Management System

An Event Management System built using Laravel and integrated with a custom WordPress theme for seamless event handling and registration.

## Features

- Create, Read, Update, and Delete (CRUD) events.
- User registration for events.
- RESTful API endpoints for fetching events.
- Integration with a custom WordPress theme to display events.
- User authentication and authorization.

## Technology Stack

- **Backend**: Laravel
- **Frontend**: Blade, Tailwind CSS
- **Database**: MySQL
- **API**: RESTful APIs developed in Laravel
- **WordPress**: Custom theme to display events and registrations

## Prerequisites

Before running the project, ensure you have the following installed:

- [XAMPP/LAMP](https://www.apachefriends.org/index.html) or [Homestead](https://laravel.com/docs/master/homestead)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (for frontend packages, if needed)

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/manukumar133/eventmanagement.git
   cd eventmanagement
Install dependencies:
 Use Composer to install PHP dependencies:
 composer install

Set Up Environment:
 Copy the .env.example file to .env:
 cp .env.example .env

Update your database configuration in the .env file:
 DB_DATABASE=your_database_name
 DB_USERNAME=your_database_user
 DB_PASSWORD=your_database_password

Generate Application Key:
 php artisan key:generate

Run Migrations:
 Run the database migrations to set up the necessary tables:
 php artisan migrate

Seed the Database (optional):
 If you want to add some initial data to your events table, run:
 php artisan db:seed

Start the Development Server:
 php artisan serve

Access the application at http://127.0.0.1:8000.

Usage
Accessing the Application
Navigate to http://127.0.0.1:8000/events to view the events list.
Click on "Create Event" to add new events.
Use "View Registrations" to see user registrations for events.
Users can register for events through the WordPress theme.
API Endpoints
The following API endpoints are available:

GET /api/events: Fetch all events
POST /api/events: Create a new event
GET /api/events/{id}: Get details of a specific event
PUT /api/events/{id}: Update an existing event
DELETE /api/events/{id}: Delete an event
Contribution
Feel free to send a pull request or open an issue for feature requests or bugs. Contributions are welcome!

License
This project is open-source and available under the MIT License.

Acknowledgments
Thanks to the Laravel framework for its powerful features and capabilities.
A special shoutout to the WordPress community for their continuous innovations.
For additional information or any inquiries, please contact the project maintainer.


### Notes:
- Update any placeholders (like database names and usernames) as per your requirement.
- The formatting uses Markdown syntax, which helps to layout information clearly.
- Feel free to customize it further based on your project's specifics!
