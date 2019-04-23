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
    <link href="/fonts/OpenSans-Regular" rel="stylesheet">
    <link rel="css/bootstrap.min.css" href="/css/master.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="logo">
          <a href="http://google.com">
            <img src="img/logo.png" alt="Logo">
          </a>
        </div>
        <div id="menu">
          <a href="index.php">
            <div class="menu-button">
              Homepage
            </div>
          </a>
          <a href="graph.php">
            <div class="menu-button">
              Histogram
            </div>
          </a>
          <a href="moderate.php">
            <div class="menu-button">
              Moderate
            </div>
          </a>
          <a href="add-film.php">
            <div class="menu-button">
              Add film
            </div>
          </a>
        </div>
      </div>
    </header>
    <div id="body">

      <div class="container">
        <?php
            while($row = $result->fetch_assoc()) {
         ?>
        <div class="card">
          <div class="card-photo">
              <img src="<?php echo $row["photo"]; ?>" alt="card-photo">
          </div>
          <div class="card-content">
            <div class="card-name">
              <?php echo $row["name"]; ?>
            </div>
            <div class="card-nav">
              <a href="#"><button class="card-nav-button" type="button" name="button">Read more..</button></a>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
    <footer>
    </footer>
  </body>
</html>
<?php $conn->close() ?>
