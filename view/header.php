<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="http://cdn.mysitemyway.com/icons-watermarks/flat-circle-white-on-black/alphanum/alphanum_lowercase-letter-m/alphanum_lowercase-letter-m_flat-circle-white-on-black_512x512.png">
    <title><?= $title ?> | Mamiblog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Custom styles for this template -->
      <link href="/js/javascript.js" rel="script">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php if(isset($_SESSION['user'])) : ?>
      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/blog">Mamiblog</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/user"><span class="glyphicon glyphicon-user"></span> Users</a></li>
              <li><a href="/blog/privateBlog"><span class="glyphicon glyphicon-picture"></span> Your Submissions</a></li>
              <li><a href="/blog/create"><span class="glyphicon glyphicon-cloud-upload"></span> Upload</a></li>
              <li><a href="/user/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              <li id="navright"><a id="username">User: <?= Security::getUser()->email ?></a></li>
          </ul>
        </div>
        
      </div>
    </nav>
  <?php else: ?>
  <nav class="navbar navbar-inverse navbar-fixed-top">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/blog">Mamiblog</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li><a href="/user"><span class="glyphicon glyphicon-user"></span> User</a></li>
              <li><a href="/user/create"><span class="glyphicon glyphicon-heart"></span> Register</a></li>
              <li><a href="/user/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

  <?php endif; ?>

  </nav>
  <div class="container">
      <h1><?= $heading ?></h1>
