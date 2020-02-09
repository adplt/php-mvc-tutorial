<?php

class Student extends Controller {

  public function index() {
    $data['title'] = 'Halaman Mahasiswa';
    $data['student'] = $this->model('Student_model')->getAllStudent();

    $this->view('templates/header', $data);
    $this->view('student/index', $data);
    $this->view('templates/footer');
  }

  public function detail($id) {
    $data['title'] = 'Detail Mahasiswa';
    $data['student'] = $this->model('Student_model')->getStudentById($id);

    $this->view('templates/header', $data);
    $this->view('student/detail', $data);
    $this->view('templates/footer');
  }

  public function add() {
    // var_dump($_POST);
    if ($this->model('Student_model')->addStudent($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: '.BASE_URL.'/Student');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: '.BASE_URL.'/Student');
      exit;
    }
  }

  public function delete($id) {
    // var_dump($_POST);
    if ($this->model('Student_model')->removeStudent($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: '.BASE_URL.'/Student');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: '.BASE_URL.'/Student');
      exit;
    }
  }

  public function getDetailResponse() {
    echo json_encode($this->model('Student_model')->getStudentById($_POST['id']));
  }

  public function update() {
    if ($this->model('Student_model')->updateStudent($_POST) > 0) {
      Flasher::setFlash('berhasil', 'diubah', 'success');
      header('Location: '.BASE_URL.'/Student');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger');
      header('Location: '.BASE_URL.'/Student');
      exit;
    }
  }

  public function search() {
    $data['title'] = 'Halaman Mahasiswa';
    $data['student'] = $this->model('Student_model')->searchStudent();

    $this->view('templates/header', $data);
    $this->view('student/index', $data);
    $this->view('templates/footer');
  }

}
