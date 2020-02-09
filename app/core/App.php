<?php

class App {

  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];

  public function __construct() {
    // echo 'OK';
    // var_dump($_GET);
    $url = $this->parseURL();
    // var_dump($url);

    // cek controller'a ada apa nggak
    if (file_exists('../app/controllers/'.$url[0].'.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once '../app/controllers/'.$this->controller.'.php';
    $this->controller = new $this->controller;

    // cek method di controller'a ada apa nggak
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    if (!empty($url)) {
      $this->params = array_values($url);
    }

    // jalankan method di controller dan kirimkan params
    call_user_func_array([$this->controller, $this->method], $this->params);
  }
  public function parseURL() {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/'); // hapus / terakhir
      $url = filter_var($url, FILTER_SANITIZE_URL); // bersihin url dari karakter aneh
      $url = explode('/', $url); // pecah"n url
      return $url;
    }
  }
}
