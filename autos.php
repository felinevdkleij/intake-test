<?php

$cars = $db->getAllRows('SELECT car.* FROM car JOIN customer ON customer.id = car.customer_id 
                                    ORDER BY customer.first_name, customer.last_name;');

?>

<table class="table">
    <thead>
    <tr>
        <th>Klant</th>
        <th>Merk</th>
        <th>Type</th>
        <th>Klussen</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $car = new Car();
    foreach ($cars as $car_id):
        $car->loadCar($car_id['id']);
        $owner = $car->getCustomerOfCar();
        ?>
        <tr>
            <td><?= $owner->getFirstName() . ' ' . $owner->getLastName() ?></td>
            <td><?= $car->getBrand() ?></td>
            <td><?= $car->getType() ?></td>
            <td><?= $car->getNumberOfTasksOfCar() ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>