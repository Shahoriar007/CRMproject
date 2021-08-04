<?php
include 'config.php';

session_start();

$sql = "SELECT * FROM promotional_post";
$result = mysqli_query($conn, $sql);


echo "<H1>Promotional Post</H1>";




if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
			echo "<h3>" . $row['post'] . "</h3>";
			
			

    }
} else {
    echo "0 results";
}

echo "</table>";
mysqli_close($conn);
?>