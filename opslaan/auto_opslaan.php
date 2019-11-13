<?php

require_once(__DIR__ . './../header.php');
require(__DIR__ . './../services/Database.php');

$db = new Database;

if (isset($_POST['customer']) && isset($_POST['brand']) && isset($_POST['type']) ) {
    $db->execQuery("INSERT INTO `car`(`customer_id`, `brand`, `type`)  VALUES (:id, :brand, :type_name)",
        array('id' => $_POST['customer'], 'brand' => $_POST['brand'], 'type_name' => $_POST['type']));
}

header('Location: ../overview.php');
