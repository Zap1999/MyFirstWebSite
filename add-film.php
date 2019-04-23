<?php
include ("config/db.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, photo FROM film";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test</title>
    <link href="/fonts/OpenSans" rel="stylesheet">
    <link rel="stylesheet" href="style-add-film.css">
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
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">E-mail:</span>
          </div>
          <input id="input1" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="mail@example.com" aria-label="mail@example.com" aria-describedby="basic-addon1">
        </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon2">Name:</span>
            </div>
            <input id="input2" type="text" class="form-control" placeholder="Andrew" aria-label="Andrew" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Surname:</span>
            </div>
            <input id="input3" type="text" class="form-control" placeholder="Vashchenock" aria-label="" aria-describedby="basic-addon1">
          </div>

          <button type="button" class="btn btn-primary" id="verify" onclick="magic()">Verify</button>


          <form id="adding" enctype="multipart/form-data">
            <div id="typeName">
              <div class="input-group mb-3" >
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Film name</span>
              </div>
              <input type="text" class="form-control" placeholder="Some interesting film" aria-label="" aria-describedby="basic-addon1" id="fName" name="fName">
            </div>
          </div>

          <div class="input-group mb-3" id="chooseYear">
            <select class="custom-select select-years" id="inputGroupSelect02" name="inputGroupSelect02">

              <option selected>2019</option>

              <?php
              for ($i=2018; $i>=1878; $i--)
              {
                ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php
              }
              ?>

            </select>
            <div class="input-group-append">
              <label class="input-group-text" for="inputGroupSelect02">Choose year</label>
            </div>
          </div>

          <label for="radio-g">Choose category:</label>
          <div class="radio" id="radio-g" >
            <label><input type="radio" name="optradio" checked value="1">Action</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" value="2">Adventure</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" value="3">Comedy</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" value="4">Drama</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" value="5">Fantasy</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" value="6">Triller</label>
          </div>
          <div  id="typeDescription">
          <div class="input-group" id="typeDescription">
            <div class="input-group-prepend">
              <span class="input-group-text">Description:</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" id="descrArea" name="txtDescribe"></textarea>
          </div>
        </div>
          <div id="uploadPhoto">
            Select film poster to upload:
            <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
          </div>
          <div class="btn-group" role="group" aria-label="Basic example" id="idk" style="display: none;">
            <button type="button" class="btn btn-secondary" onclick="suggestMagic()">Suggest film</button>
            <button type="button" class="btn btn-secondary" onclick="addMagic()">Add now!</button>
          </div>
        </div>
      </div>
      <div class="form-group" id="supersecret">
        <div style="width: 900px;margin-left: auto;margin-right: auto;">
          <label for="exampleInputPassword1">Supersecret password:3</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
          <button type="submit" class="btn btn-primary" id="addToDb" style="margin-top: 20px;">Add film to database </button>
      </div>
    </form>
    </div>
  </div>
    <footer>
    </footer>
  </body>
</html>
<?php $conn->close() ?>
