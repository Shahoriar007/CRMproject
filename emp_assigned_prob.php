<?php
include 'config.php';

session_start();

// if (!isset($_SESSION['username'])) {
//     header("Location: emp_login.php");
// }

include 'config.php';
$sessionEmail = $_SESSION['email'];
$sql = "SELECT * FROM employee WHERE email='$sessionEmail'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $userName = $row['username'];
  $userEmail = $row['email'];
  $emp_id = $row['emp_id'];
}



// if(isset($_POST["submit"])){
// $sql = "UPDATE problem_submit SET solution='$_POST[solution]',
//         status='$_POST[status]' WHERE probId = $_POST[probId]";
// if (mysqli_query($conn, $sql)) {
//     header("Location: submitted_prob.php");
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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

<!-- Navbar Ends -->

<?php

$sql = "SELECT problem,status, userId FROM problem_submit WHERE emp_id=$emp_id AND status='assigned'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

    $sql = "SELECT username,email,phone,address FROM users WHERE userId=$row[userId]";
    $result2 = mysqli_query($conn, $sql);
    

    if (mysqli_num_rows($result2) > 0) {
        $row2 = mysqli_fetch_assoc($result2);

			    echo "<h3>User-Name: " . $row2['username'] ."</h3>";
                echo "<h4>User-Email: " . $row2['email'] ."</h4>";
                echo "<h3>User-Phone: " . $row2['phone'] ."</h3>";
                echo "<h4>User-Address: " . $row2['address'] ."</h4>";
                echo "<p>Problem: " . $row['problem'] ."</p>";
                echo "<p>Status: " . $row['status'] ."</p>";
        
        // echo "<form action='' method='post'>";
        
          
        //     echo "<input type='hidden' name='probId' value='$row[probId]'>";
        //     echo "<textarea name='solution' rows='5' cols='30' placeholder='write solution'></textarea>";

        //       echo "<input type='hidden' name='probId' value='$row[probId]'>";
                
        //       echo "<label for='status'>" . "status" ."</label>";

        //         echo "<select name='status' id='status'>";
        //           echo "<option value='unsolved'>" . 'unsolved' ."</option>";
        //           echo "<option value='solved'>" . 'solved' ."</option>";
        //           echo "<option value='assigned'>" . 'assigned' ."</option>";
        //         echo "</select>";

        //       echo "<label for='status'>" . "Employee" ."</label>";

        //         echo "<select name='employee' id='employee'>";



        //           echo "<option value='unsolved'>" . 'unsolved' ."</option>";
        //           echo "<option value='solved'>" . 'solved' ."</option>";
        //           echo "<option value='assigned'>" . 'assigned' ."</option>";
        //         echo "</select></br>";

        //       echo "<input type='submit' name='submit'>";
        //     echo "</form>";
           
        
           
    }
    
    else{
        echo "username error";
    }

}
}
mysqli_close($conn);
?>