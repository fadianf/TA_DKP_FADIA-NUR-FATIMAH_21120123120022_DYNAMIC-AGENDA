<?php
require_once 'Task.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $desc = htmlspecialchars($_POST['desc']);
    $note = htmlspecialchars($_POST['note']);
    $deadline = htmlspecialchars($_POST['deadline']);
    $time = htmlspecialchars($_POST['time']);
    $task_id = uniqid();

    $task = new Task($task_id, $desc, $note, $deadline, $time);
    Task::saveTask('tasks.txt', $task);

    header('Location: index.php');
}
?>
