<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
  <title>Test</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-lg-6">
        <div class="content">
          <div class="topic-text">Форма обратной связи</div>
          <form id="myForm" action="mail.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="fullname" required placeholder="Ваше ФИО" />
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="address" required placeholder="Введите адрес" />
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="phone" required placeholder="Введите телефон" />
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" required placeholder="Введите email" />
            </div>
            <button class="button btn btn-primary" type="submit">Отправить</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  <style>
      <table> {
                border-collapse: collapse;
                width: 100%;
            }

            table, th, td {
                border: 1px solid black;
            }

            th, td {
                padding: 8px;
                text-align: left;
            }
      </style>
  </style>


  <h2 class="text-center mt-4">Данные из базы данных</h2>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th>ФИО</th>
                <th>Адрес</th>
                <th>Телефон</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
               <?php
                $servername = "localhost";
                $username = "eroshi1o_demis";
                $password = "&L78oiZJ";
                $dbname = "eroshi1o_demis";
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT * FROM forms"; 
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["fullname"] . "</td><td>" . $row["address"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td></tr>";
                  }
                } else {
                  echo "<tr><td colspan='4'>0 результатов</td></tr>";
                }
                
                
                $conn->close();
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
          $(document).ready(function(){
            $('#myForm').submit(function(e){
                e.preventDefault(); 

                $.ajax({
                    type: 'POST',
                    url: 'mail.php', // Путь к обработчику формы
                    data: $(this).serialize(), // Получаем данные формы
                    success: function(response){
                        alert('Ваше сообщение успешно отправлено!');
                    },
                    error: function(){
                        alert('Ошибка при отправке данных');
                    }
                });
            });
        });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="func.js"></script>
</body>
</html>