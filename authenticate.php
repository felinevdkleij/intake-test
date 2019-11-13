<?php
require_once('services/Database.php');

$db = new Database;

session_start();
session_unset();

//TODO: Handle failure gracefully

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];

    $password = hash('sha256', $_POST['password']);

    $users = $db->getAllRows(sprintf('SELECT *
                                FROM user
                                WHERE login = \'%s\'
                                AND password = \'%s\';', $login, $password));

    if (count($users) > 0) {
        $_SESSION['logged_in'] = true;
        header("Location: overview.php");
        die;
    }
}
header("Location: login.php?login_failed=1");