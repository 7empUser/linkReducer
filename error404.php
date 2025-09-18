<?php 

require_once("scripts/php/connectDB.php");
$redirectedLink = ltrim($_SERVER["REDIRECT_URL"], "/");
$shortLink = substr($redirectedLink, 0, 6);
$qr = (strlen($redirectedLink) == 8);

$sql = $conn->prepare("SELECT `id`, `fullLink` FROM `links` WHERE `shortLink` = ?");
$sql->bind_param("s", $shortLink);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $id = $row["id"];
  $fullLink = $row["fullLink"];

  $currentTime = time();
  $clickType = $qr ? "qrcode" : "link";
  $sql = $conn->prepare("INSERT INTO `clicks`(`linkId`, `time`, `clickType`) VALUES (?, ?, ?)");
  $sql->bind_param("iis", $id, $currentTime, $clickType);
  $sql->execute();

  header("Location:" . $fullLink);
}

?>