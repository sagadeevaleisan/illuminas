
<?php
	session_start();
	include "connect.php";
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";
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
<body>

    <div class="menu1">
        <div class="logo"><a href="index.php"><img src="asset/img/logo.png" alt=""></a></div>
        <div class="links">
            <a href="films.php">Фильмы</a>
            <a href="serials.php">Сериалы</a>
            <a href="podpiska.php">Подписка</a>
        </div>
<?php
$m = '';
	if(isset($_SESSION["role"])) {
		$m = '<a href="cart.php">Кабинет</a>';
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
<?php


	session_start();
	include "connect.php";

	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";

$sql = "SELECT * FROM `products` WHERE category='Фильмы'";
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

        
	$data = "";
	while($row = $result->fetch_assoc())
		$data .= sprintf('  
			<div class="col">
				<img src="%s" alt="">
				<div class="row">
					<h3><a href="product.php?id=%s">%s</a></h3>
                    <div class="rr">	<p>%s</p>
                    <p>%s</p></div>
				
                    <h5>%s</h5>
					<input type="hidden" value="%s" name="product_id">
					<input type="hidden" value="%s" name="year">
					<input type="hidden" value="%s" name="category">
				</div>
				%s
				%s
			</div>
		', $row["path"], $row["product_id"], $row["name"], $row["rating"],$row["year"],  $row["genre"], $row["product_id"], $row["year"], $row["category"],
		($role == "admin") ? '
			<div class="row">
				<p><a href="update.php?id='.$row["product_id"].'" class="text-small">Редактировать</a></p>
				<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="controllers/delete_product.php?id='.$row["product_id"].'" class="text-small">Удалить</a></p>
			</div>
		' : '',
		($role != "guest") ? '<p class="text-right"><a href="controllers/add_cart.php?id='. $row["product_id"] .'" class="text-small">В избранное</a></p>' : '');

	if($data == "")
		$data = '<h3 class="text-center">Товары отсутствуют</h3>';
?>
  <div class="container">
<div class="in-products" id="products">
				<?= $data ?>
			</div>
</div>
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
    </div>
	<script>filter.products()</script>
	<script src="scripts/filter.js"></script>

</body>
</html>