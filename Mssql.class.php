<?php

/**
 * Mssql bdd for Neralind site
 * @name MySQL.class.php
 * @author Mickaël CASTANHEIRO
 * @package Neralind
 * @version 1.0
 */
class Mssql {
  private static $instance;
  private $conn;

  public static function getInstance() {
    if (!(self::$instance instanceof self)) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function __construct() {
    try {
      $connectionInfo = array("Database" => DATABASE_NAME, "UID" => DATABASE_USER, "PWD" => DATABASE_PASSWORD);
      $this->conn = sqlsrv_connect(DATABASE_HOST, $connectionInfo);

      if (!$this->conn) {
        new Exception(sqlsrv_errors());
      }
    }
    catch (Exception $e) {
      echo 'Connexion échouée : ' . $e->getMessage();
      exit;
    }
  }

  public function insert($_query, $_bind = array()) {
    if (!is_array($_bind)) {
      $_bind = array($_bind);
    }

    return sqlsrv_query(&$this->conn, $_query, $_bind);
  }

  public function update($_query, $_bind = array()) {
    if (!is_array($_bind)) {
      $_bind = array($_bind);
    }

    return sqlsrv_query(&$this->conn, $_query, $_bind);
  }

  public function delete($_query, $_bind = array()) {
    if (!is_array($_bind)) {
      $_bind = array($_bind);
    }

    return sqlsrv_query(&$this->conn, $_query, $_bind);
  }

  public function selectOne($_query, $_bind = array(), $_className = null) {
    if (!is_array($_bind)) {
      $_bind = array($_bind);
    }

    $stmt = sqlsrv_query(&$this->conn, $_query, $_bind);
    if ($stmt === false) {
      return false;
    }

    $return = sqlsrv_fetch_object($stmt);
    return $return;
  }

  public function count($_query, $_bind = array()) {
    if (!is_array($_bind)) {
      $_bind = array($_bind);
    }

    $stmt = sqlsrv_query(&$this->conn, $_query, $_bind);
    if ($stmt === false) {
      return false;
    }

    $return = sqlsrv_fetch_object($stmt);
    return intval($return[0]);
  }

  public function select($_query, $_bind = array(), $_className = null) {
    if (!is_array($_bind)) {
      $_bind = array($_bind);
    }

    $stmt = sqlsrv_query(&$this->conn, $_query, $_bind);
    if ($stmt === false) {
      return false;
    }

    $return = array();
    while ($res = sqlsrv_fetch_object($stmt)) {
      $return[] = $res;
    }
    return $return;
  }

}