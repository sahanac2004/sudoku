# *Sudoku Management System*

A web-based application to create, manage, and play Sudoku puzzles, catering to enthusiasts and administrators. It features puzzle generation, subscription-based access, leaderboard management, and user-query handling. Built with modern web technologies, the system emphasizes scalability, user experience, and efficient data management.

---

## *📑 Table of Contents*

- [About the Project](#about-the-project)  
- [Features](#features)  
  - [Player Features](#player-features)  
  - [Admin Features](#admin-features)  
- [Technologies Used](#technologies-used)  
- [Database Design](#database-design)  
- [Setup Instructions](#setup-instructions)  
- [How to Use](#how-to-use)  
  - [Player Flow](#player-flow)  
  - [Admin Flow](#admin-flow)  
- [Snapshots](#snapshots)  
- [Future Enhancements](#future-enhancements)  
- [Contributors](#contributors)  
- [License](#license)  

---

## *🔍 About the Project*

The Sudoku Management System is a complete platform for Sudoku puzzle generation and management. It provides a seamless experience for players with various game modes and difficulty levels while offering powerful administrative tools for managing user queries, subscriptions, and leaderboards.

---

## *✨ Features*

### *Player Features*  

- *User Registration and Login:* Secure registration and authentication system.  
- *Game Modes:*  
  - Free Mode: Unlimited play without time constraints.  
  - Competition Mode: Timed games with leaderboard rankings.  
- *Puzzle Difficulty Levels:* Easy, Medium, and Hard.  
- *Progress Tracking:* Monitor performance and completion statistics.  
- *Subscription Plans:* Unlock advanced features like detailed statistics and competition mode.  
- *Query Submission:* Players can send queries related to the game.  

### *Admin Features*  

- *Player Management:* View, search, and delete player accounts.  
- *Query Handling:* Respond to player queries via a query-reply system.  
- *Subscription Tracking:* Manage subscription and payment details.  
- *Leaderboard Management:* Monitor and rank player performances.  

---

## *💻 Technologies Used*

### *Front-End*  
- *HTML, **CSS, **JavaScript*  
- Responsive design for cross-device compatibility  

### *Back-End*  
- *PHP*: For server-side logic and database interactions  

### *Database*  
- *MySQL*: For data storage, including:  
  - Player accounts  
  - Puzzle data  
  - Subscriptions and payments  
  - Query records  

### *Development Tools*  
- *XAMPP*: Includes Apache server, PHP, and MySQL  
- *Visual Studio Code*: Code editor  

---

## *📊 Database Design*

Key tables include:  

1. *Admin Table:* Stores admin credentials.  
2. *Player Table:* Contains player details like name, email, and subscription status.  
3. *Leaderboard Table:* Tracks rankings and times for competitive games.  
4. *Subscription Table:* Records subscription plans and payment types.  
5. *Payment Table:* Logs player payment history.  
6. *Query Table:* Stores player-submitted queries and admin responses.  

---

## *⚙ Setup Instructions*

### *1. Prerequisites*  
- Install [XAMPP](https://www.apachefriends.org/index.html) for local development.  
- Use a code editor like [Visual Studio Code](https://code.visualstudio.com/).  

### *2. Clone the Repository*  
bash
git clone https://github.com/sahanac2004/sudoku.git
cd sudoku


### *3. Configure Database*  
1. Start XAMPP and ensure Apache and MySQL are running.  
2. Open phpMyAdmin at http://localhost/phpmyadmin.  
3. Create a database (e.g., sudoku_db).  
4. Import the provided sudoku_db.sql file to set up the database structure.  

### *4. Configure Backend*  
Update database connection details in the /config/db_config.php file:  
php
<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Leave empty for XAMPP
$dbname = "sudoku_db"; // Your database name
?>


### *5. Run the Application*  
1. Place the project folder in the htdocs directory of your XAMPP installation.  
2. Open a browser and navigate to:  
   http://localhost/sudoku-management-system/

---

## *📖 How to Use*

### *Player Flow*  
1. Register or log in.  
2. Choose a subscription plan (if required) and complete payment.  
3. Select a game mode:  
   - Free Mode: Play without limits.  
   - Competition Mode: Play timed games and compete on leaderboards.  
4. Track progress and rankings.  

### *Admin Flow*  
1. Log in using admin credentials.  
2. Manage players: Search, view, or delete player records.  
3. Respond to queries using the query-reply system.  
4. Monitor subscriptions and payment details.

---

## *📸 Snapshots*

1. *Landing Page*: Welcome screen with login and registration options.  
2. *Player Dashboard*: View progress, select puzzles, and play.  
3. *Admin Panel*: Manage users, subscriptions, and queries.  

---

## *🚀 Future Enhancements*

1. *AI-Based Puzzle Generation:* Generate puzzles dynamically based on player skill.  
2. *Mobile App:* Develop iOS and Android versions for mobile gaming.  
3. *Multiplayer Mode:* Introduce real-time multiplayer Sudoku competitions.  
4. *Advanced Analytics:* Provide detailed player performance reports and statistics.  

---

## *👥 Contributors*

- *Chandana D C* - [GitHub](https://github.com/chandanadc01)  
- *Sahana C* - [GitHub](https://github.com/sahanac2004)  

---

