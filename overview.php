<?php

//TODO: Format according to PSR-2

//TODO: Get all customers

//TODO: Validate if this data is correct

require_once(__DIR__ . '/header.php');
require_once(__DIR__ . '/services/Database.php');
require(__DIR__ . '/classes/Car.php');
require(__DIR__ . '/classes/Customer.php');
require(__DIR__ . '/classes/Task.php');

$db = new Database;


//TODO: Make sure what they returned is sorted by name
$customers = $db->getAllRows('SELECT customer.id FROM customer');
$cars = $db->getAllRows('SELECT car.id FROM car');
$jobs = $db->getAllRows('SELECT task.id FROM task');

?>
<!-- TODO: Separate each page into a template page, thus avoiding massive hard-to-read swathes of code -->

<body>
<?php
    require(__DIR__ . '/nav.php')
    ?>
<div class="container">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="klanten" role="tabpanel">
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

        </div>
        <div class="tab-pane fade" id="autos" role="tabpanel">
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
        </div>
        <div class="tab-pane fade" id="klussen" role="tabpanel">
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
                $job = new Task();
                foreach ($jobs as $job_id):
                    $job->loadTask($job_id['id']);
                    $car = $job->getCarOfTask();
                    $customer = $car->getCustomerOfCar();
                    ?>
                    <tr>
                        <td><?= $customer->getFirstName() . ' ' . $customer->getLastName() ?></td>
                        <td><?= $car->getBrand() ?></td>
                        <td><?= $car->getType() ?></td>
                        <td><?= $job->getTask() ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
