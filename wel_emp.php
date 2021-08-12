<?php 

session_start();

// if (!isset($_SESSION['username'])) {
//     header("Location: admin_login.php");
// }

include 'config.php';
$sessionEmail = $_SESSION['email'];
$sql = "SELECT * FROM employee WHERE email='$sessionEmail'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $userName = $row['username'];
  $userEmail = $row['email'];
  $userid = $row['emp_id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    
<!-- Navbar starts -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <?php echo "Welcome " . $_SESSION['username'] . ""; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="wel_emp.php">Profile</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="emp_assigned_prob.php">Assigned Problems</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a></a>
      </li>
    </ul>
    
  </div>
</nav>

    <h2>profile page</h2>

    <div class="container">
                <div class="col-8">
                  <?php echo "<h4> Username: " . $userName . "</h4>"; ?>
                </div>
                <div class="col-8">
                  <?php echo "<h4> Email: " . $userEmail . "</h4>"; ?>
                </div>
                <!-- <div class="col-8">
                  <?php echo "<h4> Phone: " . $userid . "</h4>"; ?>
                </div> -->
                <!-- <div class="col-8">
                  <?php echo "<h4> Address: " . $userAddress . "</h4>"; ?>
                </div>  -->
        </div>

</body>
</html>