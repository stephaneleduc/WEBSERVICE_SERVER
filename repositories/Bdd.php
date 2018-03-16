<?php

class Bdd {


    const DSN = "mysql:host=localhost;dbname=evenements;charset=UTF8";
    const USER = "root";
    const PASS = "root";

    private $pdo;

    function __construct() {

        try {

            $this->pdo = new PDO (self::DSN,
                              self::USER, 
                              self::PASS,
                              [
                                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                              ]
            );

        } catch (PDOException $e) {
            
            echo $e->getMessage();
            die();
        }
        
    }

    public function getPdo() {
        return $this->pdo;
    }

}

?>