//contains 
 <?php
$servername = "localhost";
$username = "root";
$password = "goodyear123!@#";
$dbname = "db_laps";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tbl_scores";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "user: " . $row["uname"]. " - qid: " . $row["qid"]. " - score:" . $row["score"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 
