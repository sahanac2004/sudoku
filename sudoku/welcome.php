<?php
session_start();

if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit;
}

$admin_name = $_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome Admin</title>

<style>
     
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        h1 {
            text-align: center;
            padding: 20px;
            background: linear-gradient(45deg, #fbc2eb, #a6c1ee);
            color: #fff;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            /*background: linear-gradient(45deg, #ff9a9e, #fad0c4); */
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
           /* background: linear-gradient(45deg, #fbc2eb, #a6c1ee);
            border-radius: 10px;
            animation: gradientAnimation 15s ease infinite;
            background: linear-gradient(45deg, #fbc2eb, #a6c1ee); */
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 10px;
        }

        p {
            color: #333;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .logout {
            background: linear-gradient(45deg,#fbc2eb, #a6c1ee);
            color: #333;
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            border-radius: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }

        .logout:hover {
            background: linear-gradient(45deg, #a6c1ee, #fbc2eb);
        }

        button {
            background: #fbc2eb;
            color:#333;
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            border-radius: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }

        button:hover {
            background: #a6c1ee;
        }
    </style>
</head>

<body>
    <!--<h1>Welcome Admin</h1> -->
    <div class="container">
    <p>Hi <?php echo $admin_name; ?>, welcome to the admin page.</p>
        <div class="buttons">
            <form action="admin.php" method="post">
                <button class="logout">Player</button>
            </form>

            <form action="adminq.php" method="post">
                <button class="logout">Questions</button>
            </form>

           <form action="search.php" method="post">
                <button class="logout">Search</button>
           </form>

           <form action="Landingpage.php" method="post">
                <button class="logout">Home</button>
           </form>
       </div>

       <button onclick="history.go(-1)">Go Back</button>
   </div>
</body>
</html>
