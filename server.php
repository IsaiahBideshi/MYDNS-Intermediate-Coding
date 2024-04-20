<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$db = "voting";

$conn = mysqli_connect($servername, $username, $password, $db);
// if (!$conn){
//     die("Connection failed" .mysqli_connect_error());
// }
// echo "Connected Successfully <br>";

// $sql = "INSERT INTO restaurants(name)
//         VALUES('Rustic Roots Tavern')";

// if(mysqli_query($conn, $sql)){
//     echo "Database created successfully";
// }
// else{
//     echo "Error" .mysqli_error($conn);
// }

// mysqli_close($conn)
?>