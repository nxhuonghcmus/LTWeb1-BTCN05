<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cộng hai số</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
       
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">LẬP TRÌNH WEB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">HOME</a>
      </li>
      <?php if($currentUser): ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">LOGOUT</a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">LOGIN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">REGISTER</a>
      </li>  
      <?php endif;?>
    </ul>
  </div>  
</nav>
<br>
</body>