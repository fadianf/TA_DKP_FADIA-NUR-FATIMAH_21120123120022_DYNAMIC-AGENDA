<?php
class Task {
    private $id;
    private $description;
    private $note;
    private $deadline;
    private $time;

    public function __construct($id, $description, $note, $deadline, $time) {
        $this->id = $id;
        $this->description = $description;
        $this->note = $note;
        $this->deadline = $deadline;
        $this->time = $time;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getNote() {
        return $this->note;
    }

    public function getDeadline() {
        return $this->deadline;
    }

    public function getTime() {
        return $this->time;
    }

    public static function loadTasks($filename) {
        $tasks = [];
        if (file_exists($filename)) {
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                $task_parts = explode('|', $line);
                if (count($task_parts) === 5) {
                    list($id, $description, $note, $deadline, $time) = $task_parts;
                    $tasks[] = new Task($id, $description, $note, $deadline, $time);
                }
            }
        }
        return $tasks;
    }

    public static function saveTask($filename, $task) {
        $task_line = implode('|', [$task->getId(), $task->getDescription(), $task->getNote(), $task->getDeadline(), $task->getTime()]) . PHP_EOL;
        file_put_contents($filename, $task_line, FILE_APPEND);
    }

    public static function deleteTask($filename, $taskId) {
        $tasks = self::loadTasks($filename);
        $new_tasks = [];
        foreach ($tasks as $task) {
            if ($task->getId() !== $taskId) {
                $new_tasks[] = $task;
            }
        }
        self::saveTasksToFile($filename, $new_tasks);
    }

    public static function saveTasksToFile($filename, $tasks) {
        $lines = [];
        foreach ($tasks as $task) {
            $lines[] = implode('|', [$task->getId(), $task->getDescription(), $task->getNote(), $task->getDeadline(), $task->getTime()]);
        }
        file_put_contents($filename, implode(PHP_EOL, $lines) . PHP_EOL);
    }

    public static function completeTask($taskFilename, $historyFilename, $taskId) {
        $tasks = self::loadTasks($taskFilename);
        $new_tasks = [];
        foreach ($tasks as $task) {
            if ($task->getId() === $taskId) {
                self::saveTask($historyFilename, $task);
            } else {
                $new_tasks[] = $task;
            }
        }
        self::saveTasksToFile($taskFilename, $new_tasks);
    }
}
?>
