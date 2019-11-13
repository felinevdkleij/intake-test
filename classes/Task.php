<?php
declare(strict_types=1);
include_once(__DIR__.'/../services/Database.php');

/**
* Class Task
*/
Class Task
{
    private $db;
    private $id;
    private $car_id;
    private $task;

    public function setDb($db): void
    {
        $this->db = $db;
    }
    /**
    * the status number
    * @var int
    */
    private $status;

    /**
    * @param int $id
    */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
    * @return int
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * @param int $car_id
    */
    public function setCarId($car_id)
    {
        $this->car_id = $car_id;
    }

    /**
    * @return int
    */
    public function getCarId()
    {
        return $this ->car_id;
    }

    /**
    * @param string $task
    */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
    * @return string
    */
    public function getTask()
    {
        return $this->task;
    }

    /**
    * @param int $status
    */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
    * @return int
    */
    public function getStatus()
    {
        return $this->status;
    }

    public function __construct($id = 0)
    {
        $this->db = new Database;

        if(!empty($id)) {
            $this->loadTask($id);
        }
    }

    public function loadTask($id)
    {
        $task = $this->db->getAllRows(sprintf('SELECT * FROM task WHERE id = %d', $id));

                if (count($task) == 1) {
                    $this->setId($task[0]['id']);
                    $this->setCarId($task[0]['car_id']);
                    $this->setTask($task[0]['task']);
                    $this->setStatus($task[0]['status']);
                }
    }

    /**
     * Returns the car that has this task
     * @return Car
     */
    public function getCarOfTask()
    {
        $car = new Car();
        $car-> loadCar($this->getCarId());
        return $car;
    }
}
