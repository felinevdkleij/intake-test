<?php

$customers = $db->getAllRows('SELECT customer.id FROM customer ORDER BY customer.first_name, customer.last_name');

?>

<table class="table">
    <thead>
    <tr>
        <th>Naam</th>
        <th>Aantal autos</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $customer = new Customer();
    foreach ($customers as $customer_id):
        $customer->loadCustomer($customer_id['id']) ?>
        <tr>
            <td><?= $customer->getFirstName() . ' ' . $customer->getLastName() ?></td>
            <td><?= $customer->getNrOfCars() ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>