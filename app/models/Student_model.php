<?php

class Student_model extends Database {

  private $table = 'student';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAllStudent() {
    $this->db->query('SELECT * FROM '.$this->table);
    return $this->db->resultSet();
  }

  public function getStudentById($id) {
    $this->db->query('SELECT * FROM '.$this->table.' WHERE id = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function addStudent($data) {
    $query = 'INSERT INTO '.$this->table." VALUES (NULL, :name, :nik, :email, :degree);";
    $this->db->query($query);
    $this->db->bind('name', $data['name']); // pastikan nama property'a sama kek yg di html (tag name)
    $this->db->bind('nik', $data['nik']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('degree', $data['degree']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function removeStudent($id) {
    $query = 'DELETE FROM '.$this->table.' WHERE id = :id;';
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updateStudent($data) {
    $query = 'UPDATE '.$this->table." SET name = :name, nik = :nik, email = :email, degree = :degree WHERE id = :id ;";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('name', $data['name']); // pastikan nama property'a sama kek yg di html (tag name)
    $this->db->bind('nik', $data['nik']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('degree', $data['degree']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function searchStudent() {
    $keyword = $_POST['keyword'];
    $query = 'SELECT * FROM '.$this->table.' WHERE name LIKE :keyword';
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%"); // $ harus ditaro di bind karna di PDO, kalo % ditaro di query ga akan jalan.
    return $this->db->resultSet();
  }

}
