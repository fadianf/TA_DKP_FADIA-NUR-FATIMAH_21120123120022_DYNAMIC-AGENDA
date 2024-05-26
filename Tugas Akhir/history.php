<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Tugas</title>
    <style>
        body {
            font-family: 'Poppins', Poppins;
            background: url('top-view-camera-notebook-with-cup-hot-cocoa-with-marshmallows.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 50px;
        }
        h1 {
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
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #A1887F;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Tugas</h1>
        <ul>
        <?php
            require_once 'Task.php';
            $history = Task::loadTasks('history.txt');
            foreach ($history as $task) {
                echo "<li>" . htmlspecialchars($task->getDescription()) . " (Catatan: " . htmlspecialchars($task->getNote()) . ", Deadline: " . htmlspecialchars($task->getDeadline()) . ", Waktu: " . htmlspecialchars($task->getTime()) . ")</li>";
            }
            ?>
        </ul>
        <a class="back-link" href="index.php">Kembali ke daftar tugas</a>
    </div>
</body>
</html>
