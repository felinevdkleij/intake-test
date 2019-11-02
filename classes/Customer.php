<?php
declare(strict_types=1);
include_once(__DIR__.'/../services/Database.php');

/**
* Class Customer
*/
class Customer
{
    private $db;
    private $id;
    private $firstName;
    private $lastName;
    private $age;

     /**
      * For testing purposes
      * @param $db
      */
     public function setDb($db): void
     {
         $this->db = $db;
     }

     /**
     *@param int $id
     */
     public function setId($id)
     {
         $this->id = $id;
     }

     /**
      *@return int
      */
     public function getId()
     {
         return $this->id;
     }

     /**
     *@param string $firstName
     */
     public function setFirstName($firstName)
     {
         $this->firstName = $firstName;
     }

     /**
     * @return string
     */
     public function getFirstName()
     {
         return $this->firstName;
     }

     /**
     *@param string $lastName
     */
     public function setLastName($lastName)
     {
         $this->lastName = $lastName;
     }

     /**
     *@return string
     */
     public function getLastName()
     {
         return $this->lastName;
     }

     /**
     *@param int $age
     */
     public function setAge($age)
     {
         $this->age = $age;
     }

     /**
     *@return int
     */
     public function getAge()
     {
         return $this->age;
     }

     /**
      * Customer constructor.
      * @param null $id
      */
     public function __construct($id = null)
     {
         $this->db = new Database;

         if (!empty($id)) {
             $this->loadCustomer($id);
         }
     }

     /**
      * Loads customer by id from database;
      * @param $id int Customer_id
      */
     public function loadCustomer($id) : void
     {
         $customer = $this->db->getAllRows(sprintf('SELECT * FROM customer WHERE id = %d', $id));

        if (count($customer) == 1) {
             $this->setId($customer[0]['id']);
             $this->setFirstName($customer[0]['first_name']);
             $this->setLastName($customer[0]['last_name']);
             $this->setAge($customer[0]['age']);
        }

     }

     public function getNrOfCars(): int
     {
         return count($this->db->getAllRows(sprintf('SELECT * FROM car WHERE customer_id = %d', $this->getId())));
     }


}









