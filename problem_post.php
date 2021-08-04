<?php
include 'config.php';

session_start();

$sql = "INSERT INTO problem_submit (name, email, problem) 
       VALUES ('$_POST[name]', '$_POST[email]', '$_POST[problem]')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
