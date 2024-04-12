
-- Create Admin Table
CREATE TABLE IF NOT EXISTS `admin` (
    `admin_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `admin_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Insert data into Admin Table
INSERT INTO `admin` VALUES (1, 'chandana', 'chandanadc2003@gmail.com', 'CdC@17128#'), (2, 'sahana', 'sahanac629@gmail.com', 'Sahanac@2004'), (3, 'vaishanavi', 'vaishnavi2003@gmail.com', 'Vaishu@123');

-- Create Player1 Table
CREATE TABLE IF NOT EXISTS `player1` (
    `player_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `player_name` VARCHAR(255) UNIQUE NOT NULL ,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    UNIQUE KEY(`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `leaderboard` (
    `rank` INT UNSIGNED NOT NULL PRIMARY KEY,
    `player_name` VARCHAR(255) NOT NULL,
    `time` TIME NOT NULL,
    CONSTRAINT `fk_leaderboard_player1` FOREIGN KEY (`player_name`) REFERENCES `player1`(`player_name`) ON DELETE CASCADE,
    UNIQUE KEY(`player_name`, `time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `subscription` (
    `subc_id` VARCHAR(20) NOT NULL PRIMARY KEY,
    `player_name` VARCHAR(255) NOT NULL,
    `subc_type` VARCHAR(255) NOT NULL,
    `amount` INT NOT NULL,
    `game_type` VARCHAR(255) NOT NULL,
    `end_date` DATE NOT NULL,
    CONSTRAINT `fk_subscription_player1` FOREIGN KEY (`player_name`) REFERENCES `player1`(`player_name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `payment` (
    `payment_id` VARCHAR(20) NOT NULL PRIMARY KEY,
    `subc_id` VARCHAR(20) NOT NULL,
    `player_name` VARCHAR(255) NOT NULL,
    `pay_mode` VARCHAR(255) NOT NULL,
    `date_time` DATETIME NOT NULL,
    CONSTRAINT `fk_payment_subscription` FOREIGN KEY (`subc_id`) REFERENCES `subscription`(`subc_id`) ON DELETE CASCADE,
    CONSTRAINT `fk_payment_player1` FOREIGN KEY (`player_name`) REFERENCES `player1`(`player_name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `questions` (
    `question_id` INT AUTO_INCREMENT PRIMARY KEY not null,
    `player_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `question` TEXT NOT NULL,
    CONSTRAINT `fk_questions_player1` FOREIGN KEY (`player_name`) REFERENCES `player1`(`player_name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `replies` (
    `reply_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `player_name` VARCHAR(255) NOT NULL,
    `question_id` INT NOT NULL,
    `reply` TEXT NOT NULL,
    CONSTRAINT `fk_replies_player1` FOREIGN KEY (`player_name`) REFERENCES `player1`(`player_name`) ON DELETE CASCADE,
    CONSTRAINT `fk_replies_questions` FOREIGN KEY (`question_id`) REFERENCES `questions`(`question_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;