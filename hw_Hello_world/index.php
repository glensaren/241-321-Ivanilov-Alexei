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
      <h1 class="header-text">Домашняя работа: Hello, World! Время выполнения - 3 часа</h1>
   </header>

   <main>

   <?php
      echo '<p class="datebox__output">Hello World</p>' . '<br>';
      echo '<p class="datebox__output">' . date('l jS \of F Y h:i:s A') . '</p><br>';
    ?>

   

   </main>

   <footer>
      <p>Создать веб-страницу с динамическим контентом. Загрузить код в удаленный репозиторий. </p>
   </footer>

</body>
</html>