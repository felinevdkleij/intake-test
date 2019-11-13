<?php
require(__DIR__ . '/header.php');
require(__DIR__.'/services/Database.php');
$db = new Database;

$cars = $db->getAllRows('SELECT car.*, customer.first_name, customer.last_name from car JOIN customer on customer.id = car.customer_id;')

// TODO: Maak het mogelijk om autos, klanten en klussen te verwijderen


?>
<div class="container justify-content-center d-flex card">
    <form action="opslaan/task_opslaan.php" method="POST">

        <h3> Auto</h3>
        <select required name="car">
            <?php foreach ($cars as $car): ?>
                <option value="<?= $car['id'] ?>"><?= $car['first_name'] . ' ' . $car['last_name'] . '\'s ' . $car['brand'] . ' ' . $car['type'] ?></option>
            <?php endforeach; ?>
        </select>
        <table>
            <tr>
                <td>Klus:</td>
                <td><input required name="task"></td>
            </tr>
        </table>
        <input type="submit" value="Invoeren"/>
    </form>

</div>
