<?php
require(__DIR__ . '/header.php');

// TODO: Maak het mogelijk om autos, klanten en klussen te verwijderen

?>
<div class="container justify-content-center d-flex card">
    <form action="opslaan/klant_opslaan.php" method="POST">
            <h3>Persoon</h3>
            <table>
                <tr>
                    <td>Voornaam:</td>
                    <td><input required  name="first_name"></td>
                </tr>
                <tr>
                    <td>Achternaam:</td>
                    <td><input required  name="last_name"></td>
                </tr>
                <tr>
                    <td>Leeftijd:</td>
                    <td><input required name="leeftijd"></td>
                </tr>
            </table>
            <input type="submit" value="Invoeren"/>
        </form>

</div>
