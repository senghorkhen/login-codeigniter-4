<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

   
</head>
<body>
<?php $uri = service('uri'); ?>
  <div class="container">
  <?php if(session()->get('isLoggedIn')) :?>


    <ul class="nav nav-pills bg-dark">
    <!-- meaning ( https://localhost/dashboard ) -->
      <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null)  ?>">
        <a class="nav-link" href="/dashboard">Dashboard</a>
      </li>
      <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null)  ?>">
        <a class="nav-link" href="/profile">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">Logout</a>
      </li>
    </ul>
  <?php else: ?>
    <ul class="nav nav-pills bg-dark">
      <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null)  ?>">
        <a class="nav-link " href="/">Login</a>
      </li>
      <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null)  ?>">
        <a class="nav-link " href="/register">Register</a>
      </li>
    </ul>
  <?php endif; ?>
  </div>

  <?= $this->renderSection('content') ?>


      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>