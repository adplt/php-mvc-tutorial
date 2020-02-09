<?php

class About extends Controller {

  public function index($name = 'Atria Dika Puspita', $job = 'Developer', $age = 25) {
    // echo "Hallo, nama saya $name. Saya seorang $job.";
    $data['name'] = $name;
    $data['job'] = $job;
    $data['age'] = $age;
    $data['title'] = 'Halaman About';
    
    $this->view('templates/header', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }

  public function page() {
    $data['title'] = 'Halaman Page';

    $this->view('templates/header', $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}
