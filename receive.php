<?php
include ("config/db.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'upload/'; // upload directory
var_dump($_POST);
var_dump ($_FILES);
if ($_POST["pass"] == $accessPass) {
$img = $_FILES['fileToUpload']['name'];
$tmp = $_FILES['fileToUpload']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
// check's valid format
in_array($ext, $valid_extensions);
$path = $path.strtolower($final_image);
move_uploaded_file($tmp,$path);
$result = $conn->query(
  "
  INSERT INTO film (name, photo, description, category, year)
  VALUES ('".$_POST["fName"]."', '".$path."', '".$_POST["txtDescribe"]."', '".$_POST["optradio"]."', '".$_POST["inputGroupSelect02"]."');
  "
);
}else {
  http_response_code(400);
}
mysqli_close($conn);
?>
