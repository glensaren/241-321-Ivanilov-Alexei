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
      <h1 class="header-text">Домашняя работа: Работа с формами. Время выполнения - 3 часа</h1>
   </header>

   <main>
      <section class="page-wrapper">
         
   <form action="send.php" method="post" class="formbox" target="_blank">
         <label for="name">
            <p class ="form__text">Введите ваше имя</p>
            <input type="text" name="name" id="" placeholder="Иванов Иван" required>
         </label>

         <label for="mail">
            <p class ="form__text">Введите адрес вашей э-почты</p>
            <input type="mail" name="mail" required>
         </label>

         <label for="type-of-complaint">
            <p class ="form__text">Выберите тип вашего обращения</p>
            <select name="type-of-complaint" id="" required>
               <option value="gratitude">Благодарность</option>
               <option value="complaint">Жалоба</option>
               <option value="offer">Предложение</option>
            </select>
         </label>

         <label for="complaint-text">
            <p class ="form__text">Введите текст вашего обращения</p>
            <textarea name="complaint-text" id="" required></textarea>
         </label>

            <p class ="form__text">Выберите тип обратной связи</p>

         <div class="checkbox-layout">
            <label for="sms-answer">
               <p class ="form__text">СМС</p>
               <input type="checkbox" name="sms-answer">
            </label>

            <label for="mail-answer">
               <p class ="form__text">Mail</p>
               <input type="checkbox" name="mail-answer">
            </label>
         </div>

         <button type="submit">Отправить форму</button>

      </form>

            <a href="feedback.php" class="next__page__link">Перейти на вторую страницу</a>


      </section>
   </main>

   

   <footer>
      <p>Собрать сайт из двух страниц.

1 страница: Сверстать форму обратной связи. Отправку формы осуществить на URL: https://httpbin.org/post. Добавить кнопку для перехода на 2 страницу.

2 страница: вывести на страницу результат работы функции get_headers. Загрузить код в удаленный репозиторий. Залить на хостинг.</p>
   </footer>

</body>
</html>