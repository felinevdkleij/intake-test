<?php
require(__DIR__ . '/header.php');
require(__DIR__.'/services/Database.php');
$db = new Database;

$cars = $db->getAllRows('SELECT car.*, customer.first_name, customer.last_name from car JOIN customer on customer.id = car.customer_id;')

?>
<div class="container justify-content-center d-flex card">
    <form action="opslaan/task_opslaan.php" method="POST">
        <h3> Auto</h3>
        <table>
            <tr>
                <td>Auto:</td>
                <td><select required class="form-control"  name="car">
                        <?php foreach ($cars as $car): ?>
                            <option value="<?= $car['id'] ?>"><?= $car['first_name'] . ' ' . $car['last_name'] . '\'s ' . $car['brand'] . ' ' . $car['type'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Klus:</td>
                <td><input required name="task" placeholder="Klus"></td>
            </tr>
        </table>
        <input type="submit" class="btn btn-primary" value="Invoeren"/>
        <a class="btn btn-secondary" href="overview.php">Cancel</a>
    </form>

</div>
