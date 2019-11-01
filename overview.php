<?php

session_start();
if (!$_SESSION['logged_in']) {
    header("Location: login.php");
}

//TODO: Format according to PSR-2

//TODO: Get all customers

//TODO: Validate if this data is correct


require_once(__DIR__.'/services/Database.php');
require(__DIR__.'/classes/Car.php');
require(__DIR__.'/classes/Customer.php');
require(__DIR__.'/classes/Task.php');

$db = new Database;


//TODO: Make sure what they returned is sorted by name
$customers = $db->getAllRows('SELECT customer.id FROM customer');
$cars = $db->getAllRows('SELECT car.id FROM car');
$jobs = $db->getAllRows('SELECT task.id FROM task');

?>


<header>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

    <link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-grid.css">

</header>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-tabs">
            <li class="nav-item active">
                <a class="nav-link" data-toggle="tab" href="#klanten">Klanten</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#autos">Autos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#klussen">Klussen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nieuw.php?type=klant">Nieuwe klant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nieuw.php?type=task">Nieuwe klus</a>
            </li>
        </ul>
        <ul class="nav nav-tabs ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Uitloggen</a>
            </li>
        </ul>
    </div>
</nav>

<!-- TODO: Separate each page into a template page, thus avoiding massive hard-to-read swathes of code -->

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
                    $customer->loadCustomer($customer_id['id'])?>
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
