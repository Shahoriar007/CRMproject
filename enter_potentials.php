<?php
include 'config.php';
if(isset($_POST["add"])){
    $sql = "INSERT INTO potential_customer(name, pot_c_email, address) 
       VALUES ('$_POST[name]', '$_POST[email]', '$_POST[address]')";

if (mysqli_query($conn, $sql)) {
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
<?php 
include 'wel_admin.php'
?>
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
        <input type="text" name="name" placeholder="enter name">
        <br>
        <br>
        <input type="email" name="email" placeholder="enter email">
        <br>
        <br>
        <input type="text" name="address" placeholder="enter address">
        <br>
        <br>
        <input type="submit" name='add'>
    </form>
</body>
</html>
