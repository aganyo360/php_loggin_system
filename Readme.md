# Donation Management System

This is a web-based donation management system that allows donors to view and make donations and charity organizations to add new donations. Both users must be registered and logged in to perform certain actions.

## Features

- **Home Page**: Displays all available donations to visitors.
- **User Registration**: Allows donors and charity organizations to register.
- **User Login/Logout**: Allows registered users to log in and log out.
- **Add Donation**: Allows charity organizations to add new donation details.
- **Make Donation**: Allows logged-in donors to make donations.

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web Server (e.g., Apache, Nginx)

## Installation

1. **Clone the repository**:
    ```sh
    git clone https://github.com/aganyo360/php_loggin_system.git
    cd donation-management-system
    ```

2. **Database Setup**:
    - Create a MySQL database.
    - Import the provided SQL schema to set up the required tables:
      ```sql
      CREATE TABLE users (
          id INT AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(255) NOT NULL,
          password VARCHAR(255) NOT NULL,
          user_type ENUM('donor', 'charity') NOT NULL
      );

      CREATE TABLE donations (
          id INT AUTO_INCREMENT PRIMARY KEY,
          title VARCHAR(255) NOT NULL,
          description TEXT NOT NULL,
          amount DECIMAL(10, 2) NOT NULL,
          charity_id INT,
          FOREIGN KEY (charity_id) REFERENCES users(id)
      );
      ```

3. **Configure Database Connection**:
    - Update the `db.php` file with your database credentials:
    ```php
    <?php
    $host = 'localhost';
    $db = 'donation_management';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Could not connect to the database $db :" . $e->getMessage());
    }
    ?>
    ```

4. **Run the Application**:
    - Start your web server and navigate to the project directory in your web browser.

## File Structure

- `index.php`: Home page that displays available donations.
- `register.php`: User registration page.
- `login.php`: User login page.
- `add_donation.php`: Page for charity organizations to add new donations.
- `logout.php`: User logout page.
- `db.php`: Database connection file.
- `style.css`: Basic CSS styling.

## Usage

### Home Page

- Displays all available donations.
- Provides links to login and register for unregistered users.
- Allows logged-in charity organizations to add new donations.

### Registration

- Users can register as a donor or charity organization.
- Both user types must provide a username and password.

### Login

- Registered users can log in using their username and password.
- Logged-in users have access to additional features based on their user type.

### Add Donation

- Accessible only to logged-in charity organizations.
- Allows adding new donation details including title, description, and amount.

### Logout

- Logs out the current user and redirects to the home page.


## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any changes.

## Contact

For any inquiries or feedback, please contact [wilsonaganyo@gmail.com](mailto:wilsonaganyo@gmail.com).
