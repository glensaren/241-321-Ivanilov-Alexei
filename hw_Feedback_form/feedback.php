<?php
session_start();

$form_data = $_SESSION['form_data'] ?? [];

$headers = get_headers('https://httpbin.org/get');

function getInputData($key, $defaultValue = 'Не указано')
{
    global $form_data;
    return !empty($form_data[$key]) ? htmlspecialchars($form_data[$key]) : $defaultValue;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Результат формы</title>
   <link rel="stylesheet" href="style/style.css" />
   <link rel="stylesheet" href="style/feedback.css" />
</head>
<body>
<header>
   <img src="img/mpu_logo.jpg" class="header-logo" alt="Логотип" />
   <h1 class="header-text">Результат обработки формы</h1>
</header>

<main>

   <section class="page-wrapper">
      <p class="feedback__text">Ваше имя: <?= getInputData('name') ?></p>
      <p class="feedback__text">Ваша почта: <?= getInputData('mail') ?></p>
      <p class="feedback__text">Тип вашего обращения: <?= getInputData('type-of-complaint') ?></p>
      <p class="feedback__text">Текст вашего обращения: <?= getInputData('complaint-text') ?></p>
      <p class="feedback__text">SMS: <?= !empty($form_data['sms-answer']) ? 'Да' : 'Нет' ?></p>
      <p class="feedback__text bottom">Mail: <?= !empty($form_data['mail-answer']) ? 'Да' : 'Нет' ?></p>

      <h1>Заголовки ответа с https://httpbin.org/get</h1>
      <?php foreach ($headers as $header): ?>
         <p class="header__text"><?=($header) ?></p>
      <?php endforeach; ?>

      <a href="form.php" class="next__page__link">Перейти на страницу с формой</a>
   </section>  

</main>

<footer>
   <p>
      Собрать сайт из двух страниц.<br />
      1 страница: Сверстать форму обратной связи. Отправку формы осуществить на URL: https://httpbin.org/post. Добавить кнопку для перехода на 2 страницу.<br />
      2 страница: вывести на страницу результат работы функции get_headers. Загрузить код в удаленный репозиторий. Залить на хостинг.
   </p>
</footer>
</body>
</html>
