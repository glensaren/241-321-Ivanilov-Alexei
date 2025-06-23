<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style/style.css">
   <title>Document</title>
   
</head>
<body>
   
   <header>
      <img src="img/mpu_logo.jpg" class="header-logo" alt="">
      <h1 class="header-text">Лабораторная работа №3 - Ссылки и файлы.</h1>
   </header>

   <main>
      <section class="page-wrapper">
      <?php
      // 3)
      $files = ['1.txt', '2.txt', '3.txt'];
      $content = '';

      foreach ($files as $file) {
          if (file_exists($file)) {
              $content .= file_get_contents($file);
          }
      }

      file_put_contents('new.txt', $content);

      echo "<p>3)Файлы: " . implode(', ', $files) . "<br>Создан файл new.txt.</p>";

      // 9)
      $source = 'test.txt';
      $destinationDir = 'dir';
      $destination = $destinationDir . '/test.txt';

      if (!file_exists($destinationDir)) {
          mkdir($destinationDir);
      }

      if (copy($source, $destination)) {
          echo "<p>9)Файл $source успешно скопирован в папку $destinationDir как test.txt</p>";
      } else {
          echo "<p>9)Не удалось скопировать файл.</p>";
      }

      // 15)
      $files = ['1.txt', '2.txt', '3.txt'];
      echo "<p>15)</p>";
      foreach ($files as $file) {
          $status = file_exists($file) ? 'существует' : 'не существует';
          echo "<p>$file — $status</p>";
      }

      // 21)
      $XVI = "Иван Васильевич";
      $XVIII = "Пётр Алексеевич";
      $XIX = "Николай Павлович";
      ?>

      <form method="post">
         <label for="century">Выберите век:</label>
         <select name="century" id="century">
            <option value="XVI">XVI</option>
            <option value="XVIII">XVIII</option>
            <option value="XIX">XIX</option>
         </select>
         <input type="submit" value="Показать">
      </form>

      <?php
         if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['century'])) {
          $input = $_POST['century'];

          if (isset($$input)) {
              echo "<p>21) В $input веке царствовал ${$input}</p>";
          } else {
              echo "<p>Нет данных для выбранного века.</p>";
          }
      }


      // 27)
      $lines = file('test.txt');
      $sum = 0;

      foreach ($lines as $line) {
          $sum += (int)$line;
      }

      echo "<p>27)Сумма чисел в файле test.txt: $sum</p>";
?>


      </section>
   </main>

   <footer>
      <p>Ссылки и файлы.</p>
   </footer>

</body>
</html>