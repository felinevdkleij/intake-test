<?php


//TODO: Add foreign key restraints between customers / cars / tasks. Ensure that cascading deletion is possible
//TODO: (if you delete a customer, their cars and associated tasks should be deleted as well)

class Database
{
    public $db;

    public function __construct()
    {
        //TODO; Als login niet werkt moet de app een waarschuwing weergeven en niet crashen
        try {
            $this->db = new PDO('mysql:host=localhost:8889;dbname=intake', 'feline', 'c0nn3ct');
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function getAllRows($sql)
    {
        $rows = [];
        foreach ($this->db->query($sql) as $row) {

            $rows[] = $row;
        }
        return $rows;
    }

    public function execQuery($sql, $params)
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (Exception $e) {
            //echo $e->getMessage(); Niet echo'en want stackstrace weergeven is een security risico
        }
    }

}