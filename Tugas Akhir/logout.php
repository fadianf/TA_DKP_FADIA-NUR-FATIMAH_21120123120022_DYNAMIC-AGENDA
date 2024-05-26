<?php
session_start();
session_destroy();
header('refresh:5;url=login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            background: url('top-view-flower-press-with-notebook.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            font-family: 'Poppins', Poppins;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: #ffffff;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .container h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }
        .container p {
            font-size: 1.2em;
            color: #666;
        }
        .container a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
        .container a:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>You have been logged out</h1>
        <p>You will be redirected to the <a href="login.php">login page</a> in 5 seconds.</p>
    </div>
</body>
</html>
