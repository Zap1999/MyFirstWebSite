<?php
include ("config/db.php");
header('content-Type: text/html; charset=utf-8');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (array_key_exists("name", $_POST)) {
  $toSearch = $_POST["name"];
  $sql = "SELECT * FROM film WHERE name LIKE '%".$toSearch."%'";
}else if (array_key_exists("category", $_POST)){
  $toSearch = $_POST["category"];
  $sql = "SELECT * FROM film INNER JOIN category ON film.category = category.id  WHERE category.category='".$toSearch."' ORDER BY film.id ASC";
}else {
  $toSearch = $_POST["year"];
  $sql = "SELECT * FROM film WHERE year LIKE '%".$toSearch."%'";
}
$result=$conn->query($sql);
?>
<link rel="stylesheet" href="style-add-film.css">
<table class="foundTable">
  <tr>
    <th>Id</th>
    <th>Film name</th>
    <th>Photo</th>
    <th>Description</th>
    <th>Category</th>
    <th>Year</th>
    <th></th>
  </tr>
  <?php
  while($row = $result->fetch_assoc()) {
?>
 <tr element-id='<?php echo $row["id"] ?>'>
   <td><?php echo $row["id"]; ?></td>
   <td><?php echo $row["name"]; ?></td>
   <td><?php echo $row["photo"]; ?></td>
   <td><?php echo $row["description"]; ?></td>
   <td><?php echo $row["category"]; ?></td>
   <td><?php echo $row["year"]; ?></td>
   <td>
     <button type='button' class='btn btn-danger' id='delete-btn' onclick='deleteFilm(<?php echo $row["id"]; ?>)'>Delete</button>
   </td>
 </tr>
<?php } ?>
</table>
