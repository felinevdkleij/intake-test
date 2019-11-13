<?php

$tasks = $db->getAllRows('SELECT task.* FROM task JOIN car ON car.id = task.car_id 
                                    JOIN customer ON customer.id = car.customer_id 
                                    ORDER BY customer.first_name, customer.last_name;');

?>

<table class="table">
    <thead>
    <tr>
        <th>Klant</th>
        <th>Merk</th>
        <th>Type</th>
        <th>Taak</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $task = new Task();
    foreach ($tasks as $task_id):
        $task->loadTask($task_id['id']);
        $car = $task->getCarOfTask();
        $customer = $car->getCustomerOfCar();
        ?>
        <tr>
            <td><?= $customer->getFirstName() . ' ' . $customer->getLastName() ?></td>
            <td><?= $car->getBrand() ?></td>
            <td><?= $car->getType() ?></td>
            <td><?= $task->getTask() ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>