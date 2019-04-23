<?php
include ("config/db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET["id"];
$sql = "SELECT * FROM film WHERE id='".$id."'";
$result_ll = $conn->query($sql);
$result = $result_ll->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test</title>
    <link href="/fonts/OpenSans" rel="stylesheet">
    <link rel="stylesheet" href="css/film.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/add-film.js"></script>
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
    <div id="allThingsInTheWorld">
    <div id="body">
      <div class="mycontainer" id="bodymain">


          <form id="adding" enctype="multipart/form-data">
            <div id="typeName">
              <div class="input-group mb-3" >
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Film name</span>
              </div>
              <input type="text" class="form-control" value="<?php echo $result["name"]; ?>" aria-label="" aria-describedby="basic-addon1" id="fName" name="fName">
            </div>
          </div>

          <div class="input-group mb-3" id="chooseYear">
            <select class="custom-select select-years" id="inputGroupSelect02" name="inputGroupSelect02">


              <?php
              for ($i=2019; $i>=1878; $i--)
              {
                if ($i!=$result["year"]) {
                ?>
                <option value="<?php echo $i; ?>"><?php echo $i ?></option>
                <?php
              }
                else if($i==$result["year"]) { ?>
                  <option selected><?php echo $result["year"]; ?></option>
                <?php }
              }
              ?>

            </select>
            <div class="input-group-append">
              <label class="input-group-text" for="inputGroupSelect02">Choose year</label>
            </div>
          </div>

          <label for="radio-g">Choose category:</label>
          <div class="radio" id="radio-g" >
            <label><input type="radio" name="optradio" <?php if($result["category"]==1) { ?>checked <?php } ?> value="1">Action</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" <?php if($result["category"]==2) { ?>checked <?php } ?> value="2">Adventure</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" <?php if($result["category"]==3) { ?>checked <?php } ?> value="3">Comedy</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" <?php if($result["category"]==4) { ?>checked <?php } ?> value="4">Drama</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" <?php if($result["category"]==5) { ?>checked <?php } ?> value="5">Fantasy</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" <?php if($result["category"]==6) { ?>checked <?php } ?> value="6">Triller</label>
          </div>
          <div  id="typeDescription">
          <div class="input-group" id="typeDescription">
            <div class="input-group-prepend">
              <span class="input-group-text">Description:</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" id="descrArea" name="txtDescribe"> <?php echo $result["description"]; ?> </textarea>
          </div>
        </div>
          <button id="updateBtn" type="button" class="btn btn-success" onclick="updateInfo(<?php echo $_GET["id"] ?>)">Update</button>

        </div>
      </div>

  </div>
    <footer>
    </footer>
  </body>
</html>
<?php $conn->close() ?>
