
## **Table of Contents**

- [**About the Project**](#about-the-project)
- [**Features**](#features)
- [**Technologies Used**](#technologies-used)
- [**Database Design**](#database-design)
- [**Setup Instructions**](#setup-instructions)
- [**How to Use**](#how-to-use)
- [**Snapshots**](#snapshots)
- [**Future Enhancements**](#future-enhancements)
- [**Contributors**](#contributors)
- [**License**](#license)

## **About the Project**

The **Sudoku Management System** is a web-based application designed to create, manage, and play Sudoku puzzles. It caters to both Sudoku enthusiasts and administrators by offering functionalities such as puzzle generation, subscription-based access, leaderboard management, and user-query handling. Developed using modern web technologies, this system emphasizes scalability, user experience, and efficient data management.

## **Features**

### **Player Features**

- **User  registration and secure login.**
- **Sudoku puzzle generation** with three difficulty levels: **Easy, Medium, Hard.**
- **Two game modes:**
  - **Free Mode**: Play without time constraints.
  - **Competition Mode**: Solve puzzles with a timer and rank on the leaderboard.
- **Subscription plans** to unlock premium features like Competition Mode and advanced statistics.
- **Ability to track progress, performance, and completion statistics.**
- **Query submission** to ask game-related questions.

### **Admin Features**

- **Manage player accounts** (view, search, delete).
- **Respond to player queries** through a query-reply system.
- **View subscription and payment details.**
- **Manage game settings and user statistics.**

## **Technologies Used**

### **Front-End**

- **HTML, CSS, JavaScript**
- **Responsive design** for cross-device compatibility

### **Back-End**

- **PHP** for server-side logic and database communication

### **Database**

- **MySQL** for storing and managing data such as:
  - **Player information**
  - **Puzzle data**
  - **Subscription and payment details**
  - **Query and response records**

### **Development Tools**

- **XAMPP** for local development (includes Apache, PHP, MySQL)
- **Visual Studio Code** as the code editor

## **Database Design**

The database comprises the following key tables:

- **Admin Table**: Stores admin login credentials.
- **Player Table**: Maintains player details like name, email, and subscription status.
- **Leaderboard Table**: Tracks player rankings and times for competition mode.
- **Subscription Table**: Records subscription plans and types for players.
- **Payment Table**: Logs payment details for subscriptions.
- **Query Table**: Stores player-submitted questions and responses from the admin.

## **Setup Instructions**

1. **Prerequisites**
   - Install **XAMPP** to set up a local development environment.
   - Install a code editor like **Visual Studio Code**.

2. **Clone the Repository**
   ```bash
   git clone https://github.com/sahanac2004/sudoku.git
## Configure Database

### 1. Start XAMPP and ensure that Apache and MySQL are running.
### 2. Open phpMyAdmin (usually at http://localhost/phpmyadmin).
### 3. Create a new database (e.g., sudoku_db).
### 4. Import the provided SQL file (sudoku_db.sql) to set up the database structure and sample data.

## Configure Backend

### 1. Open the project folder in your code editor.
### 2. Navigate to the /config/ directory and update the database connection details in the db_config.php file:
```bash
cat <<EOL > db_config.php
<?php
$servername = "localhost";
$username = "root"; # Default username for XAMPP
$password = ""; # Leave empty for XAMPP
$dbname = "sudoku_db"; # Your database name
?>
```
## Run the Application

### 1. Place the project folder in the htdocs directory of your XAMPP installation.
### 2. Open a browser and navigate to: http://localhost/sudoku-management-system/.

## How to Use

## Player Flow
### 1. Register or log in to the system.
### 2. Choose a subscription plan (if required) and make payments.
### 3. Select a game mode:
####   - Free Mode: Play without time limits.
####   - Competition Mode: Play with a timer and compete on the leaderboard.
### 4. Track your progress and check your ranking on the leaderboard.

## Admin Flow
### 1. Log in using admin credentials.
### 2. View and manage player accounts:
####    - Search for specific players by name.
####    - Add or delete player records.
### 3. Respond to player queries using the query-reply system.
### 4. View subscription and payment information for players.

## Snapshots

### 1. Landing Page
### 2. Player Dashboard
### 3. Admin Panel

## Future Enhancements

### 1. AI-based Puzzle Generation: Implement AI algorithms to generate puzzles dynamically based on player skill levels.
### 2. Mobile App: Create a mobile version of the system for iOS and Android.
### 3. Multiplayer Mode: Introduce real-time multiplayer Sudoku competitions.
### 4. Detailed Analytics: Provide players with advanced statistics and performance reports.

## Contributors

### - Chandana D C: [GitHub](https://github.com/chandanadc01)
### - Sahana C: [GitHub](https://github.com/sahanac2004)



