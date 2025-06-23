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
      <h1 class="header-text">Лабораторная работа №4. Регулярные выражения. Время выполнения - 2ак. часа</h1>
   </header>

   <main>
      <section class="page-wrapper">
      
      <?php
      // 2)
      $url = "https://site.ru";
      $pattern = "/^https?:\/\/[a-z0-9.-]+\.[a-z]{2,}$/i";

      if (preg_match($pattern, $url)) {
         echo "<p>2) Строка '{$url}' является корректным доменом с http/https.</p>";
      } else {
         echo "<p>2) Строка '{$url}' НЕ является корректным доменом.</p>";
      }

      // 14)
      $str = "a\\a a\\a a\\\\a";
      $result = preg_replace('/a\\\\\\\\a/', '!', $str);
      echo "<p>14) Исходная строка: 'a\\a a\\a a\\\\a'<br>Результат замены 'a\\\\a' на '!': {$result}</p>";




      // 34)
      $str = "example_file.php";

      if (preg_match('/^\.(txt|html|php)$/i', $str)) {
         echo "<p>34) Строка '{$str}' заканчивается на расширение txt, html или php.</p>";
      } else {
         echo "<p>34) Строка '{$str}' НЕ заканчивается на расширение txt, html или php.</p>";
      }


     // 21)
      $str = "Числа: 2, 5, -3, 10";
      $result = preg_replace_callback(
         '/-?\d+/',
         function($matches) {
            $num = (int)$matches[0];
            return $num * $num; 
         },
         $str
      );
      echo "<p>21) Исходная строка: '{$str}'<br>Результат: {$result}</p>";


      // 56)
      $str = 'ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ';
      preg_match_all('/\p{Cyrillic}+/u', $str, $matches);

      echo "<p>56) Исходная строка: '{$str}'<br>Найденные слова: [" . implode(", ", $matches[0]) . "]</p>";
      ?>

      </section>
   </main>

   <footer>
      <p>4.1.Регулярные выражения. Время выполнения - 2ак. часа</p>
   </footer>

</body>
</html>