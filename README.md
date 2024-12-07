
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
   git clone https://github.com/your-username/sudoku-management-system.git
