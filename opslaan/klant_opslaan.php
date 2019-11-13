<?php
require_once(__DIR__ . './../header.php');
require(__DIR__ . './../services/Database.php');
$db = new Database;

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['leeftijd']) ) {
    if(is_numeric ( $_POST['leeftijd'])){
        $db->execQuery("INSERT INTO `customer`(`first_name`, `last_name`, `age`) VALUES (:first_name,:last_name,:age)",
            array('first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name'], 'age' => $_POST['leeftijd']));
    }
}

header('Location: ../overview.php');
