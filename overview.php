<?php
require_once(__DIR__ . '/header.php');
require_once(__DIR__ . '/services/Database.php');
require(__DIR__ . '/classes/Customer.php');
require(__DIR__ . '/classes/Car.php');
require(__DIR__ . '/classes/Task.php');

$db = new Database;
?>

<body>
<?php
    require(__DIR__ . '/nav.php')
    ?>
<div class="container">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="klanten" role="tabpanel">
            <?php
            include(__DIR__ . '/klanten.php');
            ?>
        </div>
        <div class="tab-pane fade" id="autos" role="tabpanel">
            <?php
            include(__DIR__ . '/autos.php');
            ?>
        </div>
        <div class="tab-pane fade" id="klussen" role="tabpanel">
            <?php
            include(__DIR__ . '/tasks.php');
            ?>
        </div>
    </div
</div>
</body>
