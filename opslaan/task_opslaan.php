<?php

require_once(__DIR__ . './../header.php');
require(__DIR__ . './../services/Database.php');

$db = new Database;

if (isset($_POST['car']) && isset($_POST['task']) ) {
    $db->execQuery(" INSERT INTO `task`(`car_id`, `task`, `status`) VALUES (:car, :task, 0)",
        array('car' => $_POST['car'], 'task' => $_POST['task']));
}
header('Location: ../overview.php');
