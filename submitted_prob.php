<?php
include 'config.php';

session_start();

$sql = "SELECT * FROM problem_submit";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>";
echo "<H1>All Submitted Problem</H1>";
echo "<tr>";
echo "<th>Customer Name</th><th>Email</th><th>Problem</th>";
echo "</tr>";



if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['problem'] . "</td>";
			echo "</tr>";

    }
} else {
    echo "0 results";
}

echo "</table>";
mysqli_close($conn);
?>