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
      <h1 class="header-text">Лабораторная работа №1 - Основные элементы и операторы.</h1>
   </header>

   <main>
      <section class="page-wrapper">
      <?php
      // 1)
      $a = 27;  
      $b = 12;  
      $hypotenuse = round(sqrt($a * $a + $b * $b), 2);  
      echo "<p>a = $a<br>b = $b<br>Гипотенуза: $hypotenuse</p>";
      //Ответ : 29.55

      // 5)
      $a = 2;
      $b = 2.0;
      $c = '2';
      $d = 'two';
      $g = true;
      $f = false;

      $res1 = $c . $a;
      $res2 = $c . $b;
      $res3 = $c . $g;
      $res4 = $c . $f;
      $res5 = $d . $a;
      $res6 = $d . $b;
      $res7 = $d . $g;
      $res8 = $d . $f;

      echo "<p>c . a = {$res1}<br>c . b = {$res2}<br>c . g = {$res3}<br>c . f = {$res4}<br>d . a = {$res5}<br>d . b = {$res6}<br>d . g = {$res7}<br>d . f = {$res8}</p>";
      // Ответ: Все выражения выше являются конкатенацией и дают строки:
      // '22', '22', '21', '20', 'two2', 'two2', 'twotrue', 'twofalse'

      //10
      $hunter = 'охотник';
      $wants_to = 'желает';
      $know = 'знать';
      $fizan = 'фазан';
      $sits = 'сидит';

      $phrase = "Каждый $hunter $wants_to $know, где $sits $fizan";

      echo "<p>$phrase</p>";

      // Ответ: Каждый охотник желает знать, где сидит фазан.

      //14
      $quieter = 'Тише';
      $go = 'едешь';
      $further = 'дальше';

      $proverb = $quieter . ' ' . $go . ' ' . $further . ' будешь.';

      echo "<p>$proverb</p>";

      // Ответ: Тише едешь дальше будешь.

      // 32)
      $a = 2;
      $b = 2.0;
      $c = '2';
      $d = 'two';
      $g = true;
      $f = false;

      $variables = ['a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'g' => $g, 'f' => $f];

      echo "<table border='1' cellpadding='5'><tr><th>Переменная</th><th>Исходный тип</th><th>Значение до приведения</th><th>Значение после приведения к float</th></tr>";

      foreach ($variables as $name => $value) {
         $type_before = gettype($value);
         // Для отображения булевых значений и строк с кавычками
         if (is_bool($value)) {
            $val_before = $value ? 'true' : 'false';
         } elseif (is_string($value)) {
            $val_before = "'{$value}'";
         } else {
            $val_before = $value;
         }
         $float_value = (float)$value;
         echo "<tr><td>\${$name}</td><td>{$type_before}</td><td>{$val_before}</td><td>{$float_value}</td></tr>";
      }

      echo "</table>";

      // Ответ: Приведение к float:
      // $a (int) -> 2
      // $b (double) -> 2
      // $c (string '2') -> 2
      // $d (string 'two') -> 0
      // $g (boolean true) -> 1
      // $f (boolean false) -> 0



      ?>

      </section>
   </main>

   <footer>
      <p>Основные элементы и операторы.</p>
   </footer>

</body>
</html>