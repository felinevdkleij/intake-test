<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(__DIR__.'/../services/Database.php');
include(__DIR__.'/../classes/Car.php');
include(__DIR__.'/../classes/Customer.php');
final class CarTest extends TestCase
{
    public function testCarCanGetNumberOfTasks(): void
    {
        try {
            $stubbedDatabase = $this->createMock(Database::class);
        } catch (ReflectionException $e) {
        }
        $stubbedDatabase->method('getAllRows')
            ->willReturn([1]);

        $car = new Car();

        $car->setDb($stubbedDatabase);
        $car->setCustomerId(1);

        $this->assertSame(1, $car->getNumberOfTasksOfCar());
    }

    // TODO: Write more tests for methods in Car.php

    public function testCarCanGetCustomerOfCar(): void
    {
        $stubbedDatabase = $this->createMock(Database::class);
        $stubbedDatabase->method('getAllRows')
            ->willReturn([1]);

        $car = new Car();
        $car->setDb($stubbedDatabase);
        $car->setCustomerId(1);

        $this->assertSame('Jaap', $car->getCustomerOfCar()->getFirstName());
    }

    public function testCanGetNumberOfTasksOfCar(): void
    {
        $stubbedDatabase = $this->createMock(Database::class);
        $stubbedDatabase->method('getAllRows')
            ->willReturn([1]);

        $car = new Car();
        $car->setDb($stubbedDatabase);
        $car->setCustomerId(1);
    }

}
