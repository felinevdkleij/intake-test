<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(__DIR__.'/../services/Database.php');
include(__DIR__.'/../classes/Task.php');
include(__DIR__.'/../classes/Car.php');

final class TaskTest extends TestCase
{
    public function testCanGetCarFromTask(): void
    {
        $stubbedDatabase = $this->createMock(Database::class);
        $stubbedDatabase->method('getAllRows')
            ->willReturn([1]);

        $task = new Task();
        $task->setDb($stubbedDatabase);
        $task->setCarId(1);

        $this->assertSame('Peugeot', $task->getCarOfTask()->getBrand());
    }
}
