<?php
include ("config/db.php");
header('content-Type: text/html; charset=utf-8');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
$film_id = $_POST['uid'];
    $result = $conn->query("
    DELETE FROM film WHERE id = $film_id;
    ");*/
    $emp_id = $_POST['id'];
            $sql = "DELETE FROM film WHERE id=".$emp_id;
            $conn->query($sql);
            mysqli_close($conn);
