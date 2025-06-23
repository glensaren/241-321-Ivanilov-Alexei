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
      <h1 class="header-text">Лабораторная работа №6 - Сессия и куки. Время выполнения - 2 ак. часа.</h1>
   </header>

   <main>
      <section class="page-wrapper">
      <?php
      // 1)
      session_start();
      $_SESSION['text'] = 'test';
      echo "<p>1) Значение в сессии: {$_SESSION['text']}</p>";
      // 3)
      if (isset($_SESSION['count'])) {
          $_SESSION['count']++;
          echo "<p>3) Вы обновили страницу {$_SESSION['count']} раз(а).</p>";
      } else {
          $_SESSION['count'] = 0;
          echo "<p>3) Вы ещё не обновляли страницу.</p>";
      }
      // 5)
      if (!isset($_SESSION['time'])) {
          $_SESSION['time'] = time();
          echo "<p>5) Время захода на сайт зафиксировано.</p>";
      } else {
          $elapsed = time() - $_SESSION['time'];
          echo "<p>5) Вы зашли на сайт $elapsed секунд назад.</p>";
      }
      // 7)
      setcookie('test', '123', 0);
      if (isset($_COOKIE['test'])) {
          echo "<p>7) Значение куки test: {$_COOKIE['test']}</p>";
      } else {
          echo "<p>7) Кука test установлена. Обновите страницу.</p>";
      }
      // 9)
      if (isset($_COOKIE['visits'])) {
          $visits = $_COOKIE['visits'] + 1;
      } else {
          $visits = 1;
      }
      setcookie('visits', $visits, 0);
      echo "<p>9) Вы посетили наш сайт $visits раз(а)!</p>";
?>

      </section>
   </main>

   <footer>
      <p>Сессия и куки.</p>
   </footer>

</body>
</html>