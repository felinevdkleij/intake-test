<?php
require(__DIR__ . '/header.php');
require(__DIR__.'/services/Database.php');
$db = new Database;

$customers = $db->getAllRows('SELECT customer.id, customer.first_name, customer.last_name from customer;')

// TODO: Maak het mogelijk om autos, klanten en klussen te verwijderen

?>
<div class="container justify-content-center d-flex card">
    <form action="opslaan/auto_opslaan.php" method="POST">
            <h3>Auto</h3>
            <table>
                <select required name="customer">
                    <?php foreach ($customers as $customer): ?>
                        <option value="<?= $customer['id'] ?>"><?= $customer['first_name'] . ' ' . $customer['last_name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <tr>
                    <td>Merk:</td>
                    <td><input required name="brand"></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><input required name="type"></td>
                </tr>
            </table>
            <input type="submit" value="Invoeren"/>
        </form>

</div>
