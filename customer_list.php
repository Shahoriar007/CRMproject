<?php
include 'config.php';

session_start();

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>";
echo "<H1>Customer List</H1>";
echo "<tr>";
echo "<th>Customer Id</th><th>Customer Name</th><th>Email</th>";
echo "</tr>";



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
			echo "<td>" . $row['userId'] . "</td>";
			echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
			echo "</tr>";

    }
} else {
    echo "0 results";
}

echo "</table>";
mysqli_close($conn);
?>