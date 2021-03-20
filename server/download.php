<?php
require_once('./info/mysql.php');
require_once('./header/post-json.php');

for ($i = 800; $i < 900; $i++) {
  $queryString = "SELECT fid,src FROM food WHERE fid='$i'";
  $searchResult = $mysqli->query($queryString);
  while ($row = mysqli_fetch_array($searchResult)) {
    $fid = $row["fid"];
    $src = $row["src"];

  }
  file_put_contents("./imageGroup/$fid.jpg", file_get_contents($src));
}

$searchResult->free();
$mysqli->close();
