<?php
require(__DIR__ . '/header.php');

?>
<div class="container justify-content-center d-flex card">
    <form action="opslaan/klant_opslaan.php" method="POST">
            <h3>Persoon</h3>
            <table>
                <tr>
                    <td>Voornaam:</td>
                    <td><input required  name="first_name" placeholder="Voornaam"></td>
                </tr>
                <tr>
                    <td>Achternaam:</td>
                    <td><input required  name="last_name" placeholder="Achternaam"></td>
                </tr>
                <tr>
                    <td>Leeftijd:</td>
                    <td><input required name="leeftijd" type="number" placeholder="Leeftijd"></td>
                </tr>
            </table>
            <input type="submit" class="btn btn-primary" value="Invoeren"/>
            <a class="btn btn-secondary" href="overview.php">Cancel</a>
        </form>

</div>
