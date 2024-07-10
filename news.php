<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Новости</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
<body>
    <div class="container news-container">
        <h1 class="text-center">Последние новости</h1>
        <div class="row">
            <?php
            $servername = "localhost";
            $username = "eroshi1o_demis";
            $password = "&L78oiZJ";
            $dbname = "eroshi1o_demis";

            
            $conn = new mysqli($servername, $username, $password, $dbname);

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT title, content FROM news ORDER BY publication_date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-6'>";
                    echo "<div class='news-card'>";
                    echo "<h5>" . $row["title"] . "</h5>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "0 результатов";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <footer><a href="start.php" class="btn btn-primary">Все новости</a>
            <a href="index.html" class="btn btn-secondary">Обратная связь</a></footer>
    <a href="start.php"></a>
</body>
</html>