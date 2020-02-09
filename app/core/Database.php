<?php

class Database {
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $db_name = DB_NAME;

  private $dbh; // database dba_handler
  private $stmt; // statement

  public function __construct() {
    $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;

    $options = [
      PDO::ATTR_PERSISTENT => true, // untuk menjaga koneksi DB terjaga terus
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // mode error'a menampilkan exception
    ]; // optimasi DB

    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query($query) {
    $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($params, $value, $type = null) {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }

    $this->stmt->bindValue($params, $value, $type);
  }

  public function execute() {
    $this->stmt->execute();
  }

  public function resultSet() { // kalau mw ngambil data banyak
    $this->execute(); // harus di execute dulu;
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function single() { // kalau mw ngambil data satu aja
    $this->execute(); // harus di execute dulu;
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function rowCount() {
    return $this->stmt->rowCount();
  }
}
