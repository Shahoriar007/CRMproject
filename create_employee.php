<?php
include 'config.php';
if(isset($_POST["create"])){
    $pass = md5($_POST['password']);
    $sql = "INSERT INTO employee (username, email, emp_login_id, emp_password) 
       VALUES ('$_POST[username]', '$_POST[email]', '$_POST[logInId]', '$pass' )";

if (mysqli_query($conn, $sql)) {
    header("Location: create_employee.php");
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
<?php include 'wel_admin.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="enter username">
        <br>
        <br>
        <input type="email" name="email" placeholder="enter email" required>
        <br>
        <br>
        <input type="text" name="logInId" placeholder="enter log in id">
        <br>
        <br>
        <input type="text" name="password" placeholder="enter password" required>
        <br>
        <br>
        <input type="submit" name="create">
    </form>
</body>
</html>