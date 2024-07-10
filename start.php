<!DOCTYPE html>
<html>
<head>
    <title>Новости</title>
     <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container news-container">
        <header>
            <a href="news.php" class="btn btn-primary">Все новости</a>
            <a href="index.html" class="btn btn-secondary">Обратная связь</a>
        </header>
        <h1 class="text-center">Последние новости</h1>
        <div class="row">
            <?php
            $servername = "localhost";
            $username = "eroshi1o_demis";
            $password = "&L78oiZJ";
            $dbname = "eroshi1o_demis";

            // Создание подключения
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Проверка соединения
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Выборка трех последних новостей из базы данных
            $sql = "SELECT title, SUBSTRING_INDEX(content, '.', 1) AS first_sentence, publication_date FROM news ORDER BY publication_date DESC LIMIT 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Вывод данных каждой новости
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='news-card'>";
                    echo "<h5>" . $row["title"] . "</h5>";
                    echo "<p>" . $row["first_sentence"] . "</p>";
                    echo "<p>" . $row["publication_date"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Новостей не найдено";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>