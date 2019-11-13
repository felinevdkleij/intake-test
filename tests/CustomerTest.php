<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(__DIR__.'/../services/Database.php');
include(__DIR__.'/../classes/Car.php');
include(__DIR__.'/../classes/Customer.php');

final class CustomerTest extends TestCase
{
    public function testCustomerCanGetNumberOfCars(): void
    {
        $stubbedDatabase = $this->createMock(Database::class);
        $stubbedDatabase->method('getAllRows')
            ->willReturn([1]);

        $customer = new Customer();
        $customer->setDb($stubbedDatabase);
        $customer->setId(1);

        $this->assertSame(1, $customer->getNrOfCars());
    }
}