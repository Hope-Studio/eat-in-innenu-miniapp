<?php
require_once('./info/mysql.php');
require_once('./header/post-json.php');
require_once('./toBase64.php');


for ($i = 1; $i < 2; $i++) {
  $queryString = "SELECT src FROM food WHERE fid='$i'";
  $searchResult = $mysqli->query($queryString);
  while ($row = mysqli_fetch_array($searchResult)) {
    $src = $row["src"];
  }

  $newSrc = strlen(toBase64($src)) > 1000 ? toBase64($src) : $src;
  $queryString2 = "UPDATE food SET src = '$newSrc' WHERE  fid='$i'";
  $searchResult2 = $mysqli->query($queryString2);
}

$searchResult->free();
$mysqli->close();
