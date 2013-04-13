<?php
/**
 * MySQL bdd for Neralind site
 * @name MySQL.class.php
 * @author Mickaël CASTANHEIRO
 * @package Neralind
 * @version 1.0
 */
class Mysql extends PDO {

    private static $instance;

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {        
        try {
            parent::__construct('mysql:dbname=' . DATABASE_NAME . ';host=' . DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        }
    }

    public function insert($_query, $_bind = array()) {
        if (!is_array($_bind)) {
            $_bind = array($_bind);
        }

        $statement = $this->prepare($_query);
        $statement->execute($_bind);
        return $this->lastInsertId();
    }
    
    public function insertMulti($_query, $_binds) {
         $statement = $this->prepare($_query);
         foreach ( $_binds AS $bind ) {
            $statement->execute($bind);
        }
    }

    public function update($_query, $_bind = array()) {
        if (!is_array($_bind)) {
            $_bind = array($_bind);
        }

        $statement = $this->prepare($_query);
        return $statement->execute($_bind);
    }
    
    public function delete($_query, $_bind = array()) {
        if (!is_array($_bind)) {
            $_bind = array($_bind);
        }

        $statement = $this->prepare($_query);
        return $statement->execute($_bind);
    }

    public function selectOne($_query, $_bind = array(), $_className = null) {
        if (!is_array($_bind)) {
            $_bind = array($_bind);
        }


        $statement = $this->prepare($_query);
        $statement->execute($_bind);

        if ( !empty($_className) ) {
            $statement->setFetchMode(PDO::FETCH_CLASS, $_className);
        }
        else {
            $statement->setFetchMode(PDO::FETCH_OBJ);
        }

        return $statement->fetch();
    }

    public function count($_query, $_bind = array()) {
        if (!is_array($_bind)) {
            $_bind = array($_bind);
        }

        $statement = $this->prepare($_query);
        $statement->execute($_bind);
        $first = $statement->fetch();
        return intval($first[0]);
    }

    public function select($_query, $_bind = array(), $_className = null) {
        if (!is_array($_bind)) {
            $_bind = array($_bind);
        }

        $statement = $this->prepare($_query);
        $statement->execute($_bind);

        if ( !empty($_className) ) {
            $statement->setFetchMode(PDO::FETCH_CLASS, $_className);
        }
        else {
            $statement->setFetchMode(PDO::FETCH_OBJ);
        }
        
        return $statement->fetchAll();
    }

}