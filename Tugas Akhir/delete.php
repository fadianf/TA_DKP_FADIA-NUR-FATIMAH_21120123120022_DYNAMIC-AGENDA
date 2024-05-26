<?php
require_once 'Task.php';

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    Task::deleteTask('tasks.txt', $task_id);

    header('Location: index.php');
}
?>
