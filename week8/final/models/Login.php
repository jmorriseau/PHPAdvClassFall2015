<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author GFORTI
 */
class Login {

    private $db;

    function __construct() {

        $util = new Util();
        $dbo = new DB($util->getDBConfig());
        $this->setDb($dbo->getDB());
    }

    private function getDb() {
        return $this->db;
    }

    private function setDb($db) {
        $this->db = $db;
    }

    
    // verify if the email and return the user ID
    public function verify($email, $password) {

        $results = array();

        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE email = :email");
        $binds = array(
            ":email" => $email,
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $results['password'])) {
                return $results['user_id'];
                
            }
        }
    }
    
    public function getUserPhotos($user_id) {

        $results = array();

        $stmt = $this->getDb()->prepare("SELECT * FROM photos WHERE user_id = :user_id");
        $binds = array(
            ":user_id" => $user_id
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            if (password_verify($password, $results['password'])) {
                return $results;
                
//            }
        }
    }
    
    public function removeUserPhotos($filename) {

        $stmt = $this->getDb()->prepare("DELETE FROM photos WHERE filename = :filename");
        $binds = array(
            ":filename" => $filename
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
           return true;
        }
        return false;
        
    }


}
