<?php
// Подключение к базе данных
$servername = "localhost";
$username = "eroshi1o_demis";
$password = "&L78oiZJ";
$dbname = "eroshi1o_demis";

// Получение сохраненных данных из базы данных
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM form_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ФИО</th><th>Адрес</th><th>Телефон</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["fullname"] . "</td><td>" . $row["address"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 результатов";
}

$conn->close();
?>