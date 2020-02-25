<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Schedule Maker</title>
  <link rel="icon" href="img/icon.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="css/navstyle.css">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark sticky-top">
  <a class="navbar-brand ml-3" href="#">EWU Class Schedule Maker</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto p-2 bd-highlight">
    <li class="nav-item">
        <!-- <a class="nav-link" href="#" >i</a> -->
        <!-- <button type="button" class="btn btn-info mr-1">
        <img src="https://img.icons8.com/flat_round/64/000000/info.png">
        </button> -->
	  </li>
  <?php if (basename($_SERVER['PHP_SELF'])!="index.php") {?>
      <li class="nav-item">
        <a class="nav-link" href="/schedule">Create Schedule</a>
	  </li>
	  <?php } if (basename($_SERVER['PHP_SELF'])!="advising_list.php") {?>
	  <li class="nav-item">
        <a class="nav-link" href="advising_list.php">Advising List</a>
	  </li>
	  <?php } if (basename($_SERVER['PHP_SELF'])!="download.php") {?>
      <li class="nav-item">
        <a class="nav-link" href="download.php">Download</a>
	  </li>
	<?php } if (basename($_SERVER['PHP_SELF'])!="about.php") {?>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
	  </li>    
	<?php } ?>
    </ul>
  </div>  
</nav>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>