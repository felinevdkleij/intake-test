<?php
require(__DIR__ . '/header.php');
require(__DIR__.'/services/Database.php');
$db = new Database;

$customers = $db->getAllRows('SELECT customer.id, customer.first_name, customer.last_name from customer;')

?>
<div class="container justify-content-center d-flex card">
    <form action="opslaan/auto_opslaan.php" method="POST">
            <h3>Auto</h3>
            <table>
                <tr>
                    <td>Klant:</td>
                    <td><select class="form-control" required name="customer">
                            <?php foreach ($customers as $customer): ?>
                                <option value="<?= $customer['id'] ?>"><?= $customer['first_name'] . ' ' . $customer['last_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Merk:</td>
                    <td><input required name="brand" placeholder="Merk"></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><input required name="type" placeholder="Type"></td>
                </tr>
            </table>
            <input type="submit" class="btn btn-primary" value="Invoeren"/>
            <a class="btn btn-secondary" href="overview.php">Cancel</a>
        </form>

</div>
