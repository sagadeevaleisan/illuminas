
<?php
	session_start();
	include "connect.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illuminas</title>
    <link rel="stylesheet" href="asset/css/style.css">	
	<script src="scripts/filter.js"></script>
	<script>
		let role = "<?= (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest" ?>";
	</script>

</head>
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
    <div class="main"></div>
    <div class="zag">Подписка</div>
    <div class="krp">
        <div class="r1"><h1>Год за 699 р.</h1> <button><a href="https://yoomoney.ru/transfer/quickpay?requestId=353432353036353637325f66386162613861306265353361616238636630373731333861333463376130613763333565393435">Оформить</a></button></div>
        <div class="r1"><h1>6 месяцев за 399 р..</h1> <button><a href="https://yoomoney.ru/fundraise/yhmULwQ4dMM.231124">Оформить</a></button></div>
        <div class="r1"><h1>3 месяцев за 299 р.</h1> <button><a href="https://yoomoney.ru/fundraise/yhmULwQ4dMM.231124">Оформить</a></button></div>
    </div></div>
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
<body>
    </html>