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
      <h1 class="header-text">Лабораторная работа №2. Массивы. Функции. GET & POST. Время выполнения - 4 ак. часа</h1>
   </header>

   <main>
      <section class="page-wrapper">
      
      <?php
      // 1)
      $arr = ['a', 'b', 'c', 'b', 'a'];
      $counted = array_count_values($arr);
      echo "<p>1) Массив: ['a', 'b', 'c', 'b', 'a']<br>";
      foreach ($counted as $key => $value) {
         echo "'{$key}' встречается {$value} раз(а)<br>";
      }
      echo "</p>";

      // 9)
      $arr2 = ['a' => 1, 'b' => 2, 'c' => 3];
      $random_key = array_rand($arr2);
      echo "<p>9) Случайный ключ из массива ['a'=>1, 'b'=>2, 'c'=>3]: {$random_key}</p>";

      // 17)
      $arr3 = [1, 2, 3, 4, 5];
      $result = array_slice($arr3, 1, 3);
      echo "<p>17) Исходный массив: [1, 2, 3, 4, 5]<br>Результат array_slice (элементы 2,3,4): [" . implode(", ", $result) . "]</p>";

      // 25)
      $num = isset($_GET['num']) ? (int)$_GET['num'] : 6;
      $square = $num * $num;
      echo "<p>25) Число из GET-запроса: {$num}<br>Квадрат числа: {$square}</p>";

      // 53)
      function square($n) {
         return $n * $n;
      }
      // Пример вызова функции
      $example_num = 5;
      echo "<p>53) Квадрат числа {$example_num} через функцию: " . square($example_num) . "</p>";

      ?>

      </section>
   </main>

   <footer>
      <p>Массивы. Функции. GET & POST. Время выполнения - 4 ак. часа</p>
   </footer>

</body>
</html>