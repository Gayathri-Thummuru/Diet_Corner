<?php
$servername = "localhost";
$username="root";
$password= "";
$dbname = "dietplan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Prepare the SQL query
$stmt=$conn->prepare("insert into diet(username,password,email) values (?,?,?)");
$stmt->bind_param("sss",$username,$password,$email);
if($stmt->execute())
{
  echo"Registration successfully completed";
}
else
{
echo "Registration failed" . $stmt->error;
}
$stmt->close();
$conn->close();
?>

