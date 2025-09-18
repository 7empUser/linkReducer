<?php 

$conn = new mysqli("localhost", "root", "24065002NIKmot", "linkreducer");
if ($conn->connect_error) {
  die("Connection error: " . $conn->connect_error);
}

?>