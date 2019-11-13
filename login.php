<head>
    <link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-grid.css">
    <link type="text/css" rel="stylesheet" href="style.css">
</head>

<div class="container d-flex justify-content-center vertical-center card">
    <form action="authenticate.php" method="POST">
        <h3>Login</h3>
        <table>
            <tr>
                <td>Login:</td>
                <td><input type="text" required name="login" placeholder="Gebruikersnaam"></td>
            </tr>
            <tr>
                <td>Wachtwoord:</td>

                <td><input type='password' required name="password" placeholder="Wachtwoord"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="btn btn-primary" value="Log in">
                </td>
            </tr>
        </table>
    </form><br>
    <?php

    if (isset($_GET['login_failed'])) {
        ?>
        <div style="color:red;">Kon niet inloggen: Login of wachtwoord incorrect</div>
        <?php
    }

    ?>
</div>


