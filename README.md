Sudoku Management System
This project is a Sudoku Management System that allows players to register, login, and play Sudoku games. The system includes a leaderboard that tracks the time taken by players to complete the competition games. Players can also ask questions and view the answers provided by the admin. The system has a subscription-based payment model for players who want to play the competition games.
Database Schema
The system uses a MySQL database with the following tables:
Admin Table
The admin table stores the details of the admins who have the right to search for players, answer their questions, and view their data.
Fields
admin_id: The unique ID of the admin.
admin_name: The name of the admin.
email: The email address of the admin.
password: The password of the admin.
Player1 Table
The player1 table stores the details of the registered players.
Fields
player_id: The unique ID of the player.
player_name: The name of the player.
email: The email address of the player.
password: The password of the player.

Subscription Table
The subscription table stores the details of the subscription plans available for the players.
Fields
subc_id: The unique ID of the subscription plan.
player_name: The name of the player who has subscribed to the plan.
subc_type: The type of subscription plan.
amount: The amount to be paid for the subscription plan.
game_type: The type of game that can be played with the subscription plan.
end_date: The end date of the subscription plan.
Payment Table
The payment table stores the details of the payments made by the players.
Fields
payment_id: The unique ID of the payment.
subc_id: The unique ID of the subscription plan.
player_name: The name of the player who has made the payment.
pay_mode: The mode of payment.
date_time: The date and time of the payment.
Questions Table
The questions table stores the questions asked by the players.
Fields
question_id: The unique ID of the question.
player_name: The name of the player who has asked the question.
email: The email address of the player.
question: The question asked by the player.
Replies Table
The replies table stores the answers provided by the admin to the questions asked by the players.
Fields
reply_id: The unique ID of the reply.
player_name: The name of the player who has asked the question.
question_id: The unique ID of the question.
reply: The answer provided by the admin to the question.
Technologies Used
The system is built using the following technologies:
HTML
CSS
JavaScript
PHP
MySQL
PHPMyAdmin
XAMPP server
Features
Player registration and login.
Free game play without any time constraint.
Competition game play with time constraint.

Subscription-based payment model for players who want to play the competition games.
Question and answer system for players.
FAQ and How to play for Sudoku game.
How to Run
Install XAMPP server on your local machine.
Start the Apache and MySQL services.
Create a new database and import the SQL file provided in the repository.
with 3 team members we have done this project. Have taken the sudoku game from other 
Run the PHP files using a web browser. 
Note: The SQL file includes the data for the admin table.
Conclusion
The Sudoku Management System is a complete solution for managing Sudoku games and players. The system is built using the latest web technologies and provides a user-friendly interface for players to play and manage their games. The system also provides a robust backend for administrators to manage the players and their subscriptions.
https://www.youtube.com/redirect?event=video_description&redir_token=QUFFLUhqbWZ4aWJOazZjTHFKOUdPMUVZTE1Hb2Z0R0ZYZ3xBQ3Jtc0ttODhWVEUtQzlYZ09jZWstZXYxa2IzbUhwVmhwMUxtNUZqQUY2dmplR3JIS0RhMVY3TUsyblFuNmdsVm4tQmxGcHh4Rm1GN0tkT1Ezc2NzUVVySFNGVGw3MWcxcmJJZ0RvS1VKSUNNSzV0cnZtajkwRQ&q=https%3A%2F%2Fgithub.com%2Ftrananhtuat%2Fjavascript-sudoku&v=xpsm3tOLTVE for game  code. With total of 3 team members.
