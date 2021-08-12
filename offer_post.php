<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    
<!-- Navbar starts -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="wel_admin.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer_list.php">Customer List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="submitted_prob.php">Submitted Problems</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="offer_post.php">Post Offers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="enter_potentials.php">Potential customer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="bulk_email.php">Send bulk email</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a></a>
    </li>
  </ul>
  
</div>
</nav>


<!-- Problem Form -->

<form action="insert_offer.php" method="post">
 Offer Post: <input type="text" name="offer" required/><br>
<input type="submit" />





</body>
</html>