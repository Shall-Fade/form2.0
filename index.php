<?php
session_start();

function message(){ // Функция вывода модального окна с результатом запроса
    if(isset($_SESSION['success'])){
        echo '  <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div>
                            <p class="modal-paragraph" style="color: green">Форма успешно отправлена!</p>
                            <img class="modal-img" src="img/success.png" alt="Success">
                        </div>
                    </div>
                </div>';
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        echo '  <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div>
                            <p class="modal-paragraph" style="color: red">Вы неправильно ввели проверочный код!</p>
                            <img class="modal-img" src="img/error.png" alt="Error">
                        </div>
                    </div>
                </div>';
        unset($_SESSION['error']);
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Form</title>
</head>
<body>
<div class="container">
        <h1 class="title">Форма регистрации</h1>
        <form action="check.php" method="post" class="form">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-input check" id="name" minlength="4" maxlength="15" autocomplete="off" placeholder="Например, Иван" required>
            <label for="surname">Фамилия</label>
            <input type="text" name="surname" class="form-input check" id="surname" minlength="4" maxlength="15" autocomplete="off" placeholder="Например, Иванов" required>
            <label for="email">Email</label>
            <input type="email" name="email" class="form-input check" id="email" autocomplete="off" placeholder="Например, mail@mail.ru" required>
            <label for="number">Телефон</label>
            <input type="tel" name="number" class="form-input check" id="number" pattern="[1-9]{1}[0-9]{10}" autocomplete="off" minlength="10" maxlength="11" placeholder="xxxx-xxx-xx-xx" required>
            <label for="country">Страна</label>
            <select name="country" class="form-input" id="country" required>
                <option value="Россия">Россия</option>
                <option value="США">США</option>
                <option value="Германия">Германия</option>
                <option value="Япония">Япония</option>
                <option value="Франция">Франция</option>
            </select>
            <label for="comment">Комментарий</label>
            <textarea name="comment" id="comment" cols="30" rows="10" minlength="0" maxlength="150" placeholder="Введите свой комментарий"></textarea>
            <div class="captcha-block">
                <label for="captcha">Проверочный код</label>
                <div class="captcha">
                    <img src="captcha.php" alt="Captcha">
                </div>
                <input type="text" class="form-input" name="captcha" id="captcha" autocomplete="off" placeholder="Введите проверочный код" required>
            </div>
            <input class="btn" type="submit">
        </form>
        <div class="message">
            <?php  message(); //Вызов функции вывода модального окна?>
        </div>
</div>
    <script src="js/main.js"></script>
</body>
</html>