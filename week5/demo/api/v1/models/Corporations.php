<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Corporations
 *
 * @author 001305466
 */
class Corporations implements iRestModel {

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

    public function get($id) {
        //if blah throw blah
        //return array
        //pretty_print
        $results = array();

        $stmt = $this->getDb()->prepare("SELECT * FROM corps WHERE id = :id");
        $binds = array(
            ":id" => $id
        );


        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    public function getAll() {
        $results = array();

        $stmt = $this->getDb()->prepare("SELECT * FROM corps");

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    public function post($data) {
        $results = false;

        $stmt = $this->getDb()->prepare("INSET INTO corps WHERE corps = :corp, incorp_dt = :incorp_dt, email = :email, owner = :owner, phone = :phone");
        $binds = array(
            ":corp" => $data['corp'],
            ":incorp_dt" => date("F j, Y, g:i a"),
            ":email" => $data['email'],
            ":owner" => $data['owner'],
            ":phone" => $data['phone'],
            ":location" => 'Providence'
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = true;
        }
        return $results;
    }

    public function put($id) {
        $results = array();

        $stmt = $this->getDb()->prepare("SELECT * FROM corps WHERE id = :id");
        $binds = array(
            ":id" => $id
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    public function delete($id) {
        $results = false;
        
        $stmt = $this->getDb()->prepare("DELETE FROM corps WHERE id = :id");
        $binds = array(
            ":id" => $id
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = true;
        }
        return $results;
    }

}
