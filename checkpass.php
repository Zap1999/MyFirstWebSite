<?php
include ("config/db.php");
if ($_POST["pass"] == $accessPass) {
  console("1");
}
else{
    http_response_code(400);
}
