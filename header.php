<?php

session_start();
if (!$_SESSION['logged_in']) {
    header("Location: login.php");
}
?>

<header>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

    <link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-grid.css">
    <link type="text/css" rel="stylesheet" href="style.css"-->
</header>
