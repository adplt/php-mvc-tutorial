<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?= $data['title']; ?></title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.css">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="<?= BASE_URL; ?>/Home">PHP MVC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= BASE_URL; ?>/Home">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/About">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/Student">Student</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?= BASE_URL; ?>/Student/search" method="post">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search">Search</button>
        </form>
      </div>
    </div>
</nav>
  <!-- <script src="js/scripts.js"></script> -->
