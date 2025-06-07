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
      <h1 class="header-text">Домашняя работа: Solve the equation. Время выполнения - 3 часа</h1>
   </header>

   <main>
      <section class="page-wrapper">
         
      <?php

      $current_operator = '';
      function solveTheEquation($input){
         global $current_operator;
         $input = str_replace(' ','', $input);
         list($left, $right) = explode('=' , $input);
         $operators = ['+' , '-' , '/' , '*'];
         foreach($operators as $operator){
            $parts = explode($operator, $left);
            if (count($parts) === 2){
               $a = $parts[0];
               $b = $parts[1];
               $result = $right;

               if ($a === 'x'){
                  $b = floatval($b);
                  $result = floatval($result);
                  switch ($operator) {
                     case '+':
                        $current_operator = 'плюс';
                        return $result - $b;
                     case '-':
                        $current_operator = 'минус';
                        return $result + $b;
                     case '*':
                        $current_operator = 'умножить';
                        return $result / $b;
                     case '/':
                        $current_operator = 'разделить';
                        return $result * $b;
                  }
               }

               elseif ($b === 'x') {
                  $a = floatval($a);
                  $result = floatval($result);
                  switch ($operator) {
                     case '+':
                        $current_operator = 'плюс';
                        return $result - $a;
                     case '-':
                        $current_operator = 'минус';
                        return $a - $result;
                     case '*':
                        $current_operator = 'умножить';
                        return $result / $a;
                     case '/':
                        $current_operator = 'разделить';
                        return $a / $result;
                  }
               }
            }
         }
         echo $current_operator;
      };
         $equation = '4*x=46';
      $answer = solveTheEquation($equation);
      echo "<p>Уравнение: $equation</p>";
      echo "<p>Значение X = $answer</p>";
      echo "<p>Используемый оператор: $current_operator";
      ?>

      </section>
   </main>

   <footer>
      <p>Написать программу для решения заданного уравнения. Которая будет определять оператор в заданном уравнении и расположение неизвестной переменной. Находить значение переменной. Нарисовать блок-схему алгоритма работы программы. </p>
   </footer>

</body>
</html>