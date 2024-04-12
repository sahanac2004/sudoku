<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        form {
            width: 300px;
            margin: 20px auto; /* Center the form */
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px; /* Adjusted margin for better spacing */
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px); /* Adjusted width for better alignment */
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: calc(100% - 20px); /* Adjusted width for better alignment */
            padding: 10px;
            margin-top: 20px;
            background-color:lightskyblue;
            color:black;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color:lightsteelblue; /* Darkened hover color for better feedback */
        }
        body {
    background: linear-gradient(45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}

h1 {
    background-color:lightskyblue;
    color: #fff;
}

form {
    background-color: lightpink;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 2px solid rgba(255, 255, 255, 0.7);
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.1);
            color: #070707;
            outline: none;
            margin-top: 20px;
            position: relative; /* Ensure the form elements are positioned relative to .wrapper */
            z-index: 2;
}
        body {
    background: linear-gradient(45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}

@keyframes gradient {
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
.wrapper form input[type="text"],
        .wrapper form input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 2px solid rgba(255, 255, 255, 0.7);
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.1);
            color: #070707;
            outline: none;
        }
        form {
    margin: 0 auto;
    width: 300px;
}
    </style>
</head>

<body class="wrapper">
    <h1>Admin Login</h1>
    <form  method="post" action="">
        <label for="admin_name">Name:</label>
        <input type="text" name="admin_name" id="admin_name" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>

    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = mysqli_connect('localhost', 'sahana', 'sahanac@2004*', 'sahana', 3306);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
		$admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		// Query the admin table to check if the user exists
		$sql = "SELECT * FROM admin WHERE admin_name = '$admin_name' AND password = '$password'";
		$result = mysqli_query($conn, $sql);

		// Check if the query returned a row
		if (mysqli_num_rows($result) == 1) {
			// Set the session variable and redirect to the welcome page
			$_SESSION['admin_name'] = $admin_name;
			header("Location: welcome.php?admin_name=" . urlencode($admin_name));
			exit();
		} else {
			echo "<script>alert('Invalid name or password'); window.history.back();</script>";
			exit();
		}

		mysqli_close($conn);
	}
    ?>
</body>
</html>
