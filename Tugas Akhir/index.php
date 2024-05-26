<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
require_once 'Task.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Agenda</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        body {
            font-family: 'Roboto', Poppins;
            background: url('colorful-overloaded-bullet-journal.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 50px;
            animation: fadeIn 2s ease-in-out;
        }

        h1, h2 {
            text-align: center;
            color: #A1887F;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background: #F5F5F5;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: slideIn 2s ease-in-out;
        }

        li a {
            text-decoration: none;
            color: #6D4C41;
            margin-left: 10px;
        }

        li a:hover {
            text-decoration: underline;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        input[type="text"], input[type="date"], input[type="time"] {
            padding: 10px;
            border: 1px solid #6D4C41;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #A1887F;
            color: #fff;
            cursor: pointer;
            transition: background-color 2s ease;
        }

        input[type="submit"]:hover {
            background-color: #6D4C41;
        }

        .link-history {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #A1887F;
            text-decoration: none;
            transition: color 2s ease;
        }

        .link-history:hover {
            color: #6D4C41;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
     <p>HAI HAI, <?php echo htmlspecialchars($_SESSION['username']); ?>! <a href="logout.php">Logout</a></p>
        <h1>DYNAMIC AGENDA</h1>
        <h2>List Plan</h2>
        <ul>
            <?php
            $tasks = Task::loadTasks('tasks.txt');
            foreach ($tasks as $task) {
                echo "<li>
                        <div>
                            <strong>" . htmlspecialchars($task->getDescription()) . "</strong><br>
                            <small>Catatan: " . htmlspecialchars($task->getNote()) . ", Deadline: " . htmlspecialchars($task->getDeadline()) . ", Waktu: " . htmlspecialchars($task->getTime()) . "</small>
                        </div>
                        <div>
                            <a href='complete.php?id=" . htmlspecialchars($task->getId()) . "'>[Good Job]</a>
                            <a href='delete.php?id=" . htmlspecialchars($task->getId()) . "'>[Delete]</a>
                        </div>
                      </li>";
            }
            ?>
        </ul>
        <h2>Tambah Plan Baru</h2>
        <form action="add.php" method="post">
            Plan: <input type="text" name="desc" required>
            Note: <input type="text" name="note">
            Deadline: <input type="date" name="deadline">
            Target Waktu Penyelesaian: <input type="time" name="time">
            <input type="submit" value="Tambah Tugas">
        </form>
        <a class="link-history" href="history.php">Riwayat Tugas</a>
    </div>
</body>
</html>
