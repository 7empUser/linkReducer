<?php 

require_once("connectDB.php");

class convertBase62 {
  private const BASE62 = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

  public function encrypt($id) {
    $base = strlen(self::BASE62);
    $encoded = '';
    while ($id > 0) {
      $remainder = $id % $base;
      $id = intdiv($id, $base);
      $encoded = self::BASE62[$remainder] . $encoded;
    }
    while (strlen($encoded) < 6) {
      $encoded = "0" . $encoded;
    }
    return $encoded;
  }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $url = $_POST["data"] ?? die("Ссылка пуста");

  $sql = $conn->prepare("SELECT `shortLink` FROM `links` WHERE `fullLink` = ?");
  $sql->bind_param("s", $url);
  $sql->execute();
  $result = $sql->get_result();
  
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $shortLink = $row["shortLink"];
  } else {
    $converter = new convertBase62();
    $sql = $conn->prepare("SELECT `id` FROM `links` ORDER BY `id` DESC LIMIT 1");
    $sql->execute();
    $result = $sql->get_result();
    if($result->num_rows > 0) {
      $maxId = ($result->fetch_assoc())["id"];
    }
    $shortLink = $converter->encrypt($maxId + 1);
    $numberOfClick = 0;
    $sql = $conn->prepare("INSERT INTO `links`(`fullLink`, `shortLink`, `numberOfClick`) VALUES (?, ?, ?)");
    $sql->bind_param("ssi", $url, $shortLink, $numberOfClick);
    $sql->execute();
  }

  echo ("https://linkreducer/" . $shortLink);
  exit;
}

?>