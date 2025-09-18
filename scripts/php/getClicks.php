<?php

require_once("connectDB.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $shortLink = $_POST["data"] ?? die("Ссылка пуста");

  $sql = $conn->prepare("SELECT `time`, `clickType` 
    FROM `clicks` 
    WHERE `linkId` IN (SELECT `id` FROM `links` WHERE `shortLink` = ?)");
  $sql->bind_param("s", $shortLink);
  $sql->execute();
  $result = $sql->get_result();
  $clicks = array();
  while ($row = $result->fetch_assoc()) {
      $clicks[] = $row;
  }
  header('Content-Type: application/json');
  echo (json_encode($clicks));
  exit;
}

?>