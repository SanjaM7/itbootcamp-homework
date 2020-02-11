<?php require_once "db.php"; ?>

<html>

<head>
  <meta charset="unf-8">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css">
  <style>
    .padding-25 {
      padding: 25px 0;
    }
    .dropdown-item:hover {
      background-color:#18BC9C!important;
      color: white!important;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Mreza</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/mreza/index.php">HOME</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">PRIJATELJI</a>
          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
            <a class="nav-link dropdown-item" href="/mreza/lista/dm_prijatelji_lista.php">PRIJATELJI LISTA</a>
            <div class="dropdown-divider"></div>
            <a class="nav-link dropdown-item" href="/mreza/tabela/dm_prijatelji_tabela.php">PRIJATELJI TABELA</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/mreza/forma.php">EDIT</a>
        </li>
      </ul>
    </div>
  </nav>