<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/logstyle.css">
</head>

<body>
    
<?php
	session_start();
	include "connect.php";
?>
    <div class="menu1">
        <div class="logo"><a href="index.php"><img src="asset/img/logo.png" alt=""></a></div>
        <div class="links">
            <a href="films.php">Фильмы</a>
            <a href="serials.php">Сериалы</a>
            <a href="">Подписка</a>
        </div>
        <?php

$m = '';
	if(isset($_SESSION["role"])) {
		$m = '<a href="cart.php">Корзина</a>';
		$m .= ($_SESSION["role"] == "admin") ? '<a href="admin">Заказы</a>' : '';
		$m .= '<a href="controllers/logout.php">Выход</a>';
	} else
		$m = '
		
<div class="acc"><a href="logreg.php"><img src="asset/img/acc.png" alt=""></a></div>
		';

	$menu = sprintf($m);
?>
	<?= $menu ?>

<div class="poisk">     
    <nav>
      
        <div class="search-box">
        <form action="#">
          <input type="text" placeholder="Поиск.." name="search">
          <button type="submit"><a href=""><img src="asset/img/icons8-search.svg" alt=""></a></button>
        </form>
        </div>
      </nav>
</div>
    </div>
    <main>
        <div class="log">
        <div class="head" id="login"><h1>Вход</h1></div>
        <div class="fl">
        <form action="controllers/login.php" method="POST">
            <span>Login</span>
            <input type="text" placeholder="Логин" name="login" required>
            <span>Password</span>
            <input type="password" placeholder="Пароль" name="password" required>
            <button>Войти</button>
        </form>
    <div class="akcia">
<div class="kr">
    <div class="zag"> <img src="asset/img/Polygon 1.png" alt=""> <h1>Подписка на фильмы со скидкой</h1></div>
 <h1>Подписка на фильмы на 12 месяцев за 699 рублей</h1>
    <button>Оформить подписку</button>
</div>
    </div>
    </div>
</div>
        <div class="reg">
        <div class="head" id="register"><h1>Регистрация</h1></div>
        <div class="fl">
        <form action="controllers/register.php" method="POST">
            <span>Name</span>
            <input type="text" placeholder="Имя" name="name" pattern="[а-яА-ЯёЁ\s\-]+" required>
            <span>Surname</span>
            <input type="text" placeholder="Фамилия" name="surname" pattern="[а-яА-ЯёЁ\s\-]+" required>
            <span>Otchestvo</span>
            <input type="text" placeholder="Отчество" name="patronymic" pattern="[а-яА-ЯёЁ\s\-]+">
            <span>Login</span>
            <input type="text" placeholder="Логин" name="login" pattern="[a-zA-Z0-9\-]+" required>
            <span>Email</span>
            <input type="email" placeholder="Email" name="email" required>
            <span>Password</span>
            <input type="password" placeholder="Пароль" name="password" pattern=".{6,}" required>
            <span>Repeat password</span>
            <input type="password" placeholder="Повтор пароля" name="password_repeat" required>
           
            <button>Зарегистрироваться</button>
        </form>
</div>
</div>

    </main>
    <footer>
<div class="footer__logo">
    <img src="asset/img/logo.png" alt="">
</div>
<div class="footer__links">
    <div class="footer__links__column">
        <a href="catalog.php">Каталог</a>
        <a href="cart.php">Корзина</a>
        <a href="">Подписка</a>
        <a href="films.php">Фильмы</a>
    </div>
    <div class="footer__links__column">
        <a href="logreg.php">Вход</a>
        <a href="logreg.php">Регистрация</a>
        <a href="lc.php">Личный кабинет</a>
        <a href="serials.php">Сериалы</a>
    </div>
</div>

        </footer>
</body>

</html>