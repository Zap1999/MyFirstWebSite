<?php
include ("config/db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_POST["id"];
$name=$_POST["name"];
$year=$_POST["year"];
$category=$_POST["category"];
$description=$_POST["description"];
$sql="UPDATE film SET name ='".$name."',year='".$year."',category='".$category."',description='".$description."' WHERE id='".$id."'";
$conn->query($sql);
