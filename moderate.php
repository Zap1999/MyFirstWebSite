<?php
include ("config/db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT film.id, film.name, film.photo, film.description, film.year, category.category
        FROM film INNER JOIN category ON film.category = category.id ORDER BY film.id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test</title>
    <link href="/fonts/OpenSans" rel="stylesheet">
    <link rel="stylesheet" id="styleFile" href="style-add-film.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/add-film.js"></script>
    <script>
    $(document).ready(function (e) {
     $("#checkPassBtn").click(function(e) {
      e.preventDefault();
      $.ajax({
       url: "checkpass.php",
       type: "POST",
       enctype: "multipart/form-data",
       data:  new FormData($("#passcheck")[0]),
       contentType: false,
             cache: false,
       processData:false,
       success: function(data)
       {
         $("#passcheck").addClass("hidden");
         $("#searchFields").addClass("dFlex");
         $("#tableDB").addClass("reveal");
         $("footer").addClass("posrelative");
       },
       error: function(data) {
         alert("Invalid password")
       }
      });
     });
    });
    </script>
  </head>
  <body>
    <header>
      <div class="mycontainer">
        <div id="logo">
          <a href="index.php">
            <img src="img/logo.png" alt="Logo">
          </a>
        </div>
        <div id="menu">
          <a href="index.php">
            <div class="mymenu-button">
              Homepage
            </div>
          </a>
          <a href="graph.php">
            <div class="mymenu-button">
              Histogram
            </div>
          </a>
          <a href="moderate.php">
            <div class="mymenu-button">
              Moderate
            </div>
          </a>
          <a href="add-film.php">
            <div class="mymenu-button">
              Add film
            </div>
          </a>
        </div>
      </div>
    </header>
    <div id="body">
      <div class="mycontainer">
        <button id="chgStyle2" type="button" class="btn btn-success" onclick="chgStyle2()" >Change style</button>

        <button id="chgStyle" type="button" class="btn btn-success" onclick="chgStyle()" >Change style</button>

        <form id="passcheck" enctype="multipart/form-data">
          <div class="form-group">
            <div style="width: 900px;margin-left: auto;margin-right: auto;">
              <label for="exampleInputPassword1">Supersecret password:3</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
              <button type="submit" class="btn btn-primary" id="checkPassBtn" style="margin-top: 20px;">Go to DB table</button>
            </div>
          </div>
        </form>
        <div id="toAppend">
        <div class="search" id ="searchFields" style="display: none;">
          <!-- Search form -->
          <form class="form-inline mr-auto searchField">
            <input class="form-control mr-sm-2" id="searchName" type="text" placeholder="by name.." aria-label="Search">
            <button class="btn btn-unique btn-rounded btn-sm my-0" type="button" onclick="searchByName()">Search</button>
          </form>
          <form class="form-inline mr-auto">
            <input class="form-control mr-sm-2" id="searchCategory" type="text" placeholder="by category.." aria-label="Search">
            <button class="btn btn-unique btn-rounded btn-sm my-0" type="button" onclick="searchByCategory()">Search</button>
          </form>
          <form class="form-inline mr-auto">
            <input class="form-control mr-sm-2" id="searchYear" type="text" placeholder="by year.." aria-label="Search">
            <button class="btn btn-unique btn-rounded btn-sm my-0" type="button" onclick="searchByYear()">Search</button>
          </form>
        </div>
</div>
        <table id="tableDB">
          <tr>
            <th>Id</th>
            <th>Film name</th>
            <th>Photo</th>
            <th>Description</th>
            <th>Category</th>
            <th>Year</th>
            <th></th>
            <th></th>
          </tr>
        <?php
            while($row = $result->fetch_assoc()) {
         ?>
           <tr element-id="<?php echo $row["id"] ?>">
             <td><?php echo $row["id"]; ?></td>
             <td><?php echo $row["name"]; ?></td>
             <td><?php echo $row["photo"]; ?></td>
             <td><?php echo $row["description"]; ?></td>
             <td><?php echo $row["category"]; ?></td>
             <td><?php echo $row["year"]; ?></td>
             <td>
               <a href="film.php?id=<?php echo $row["id"]; ?>">
               <button type="button" class="btn btn-success">Update</button>
              </a>
             </td>
             <td>
               <button type="button" class="btn btn-danger" id="delete-btn" onclick="deleteFilm(<?php echo $row["id"]; ?>)">Delete</button>
             </td>
           </tr>
       <?php } ?>
     </table>
      </div>
    </div>
    <footer>
    </footer>
  </body>
</html>
<?php $conn->close() ?>
