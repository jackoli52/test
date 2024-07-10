<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "eroshi1o_demis";
$password = "&L78oiZJ";
$dbname = "eroshi1o_demis";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Соединение с базой данных не удалось: " . $conn->connect_error);
}


$fullname = $_POST['fullname'];
$address = $_POST['address']; 
$phone = $_POST['phone'];
$email = $_POST['email'];


$sql = "INSERT INTO forms (fullname, address, phone, email) VALUES ('$fullname', '$address', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "Данные успешно отправлены в базу данных ";
} else {
  echo "Ошибка при отправке данных: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>