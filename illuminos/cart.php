<?php
	include "controllers/check.php";

	include "connect.php";

	$sql = sprintf("SELECT `order_id`, `product_id`, `name`, `rating`, `year`,  `path`, `genre` FROM `orders` INNER JOIN `products` USING(`product_id`) WHERE `user_id`='%s'", $_SESSION["user_id"]);
	$result = $connect->query($sql);

	$products = "";
	while($row = $result->fetch_assoc())
		$products .= sprintf('
		<div class="col">
		<img src="%s" alt="">
		<div class="rown">
			<h3><a href="product.php?id=%s">%s</a></h3>
			<div class="rr">	<p>%s</p>
			<p>%s</p></div>
		
			<h5>%s</h5>
		
		</div>
	
	</div>
', $row["path"], $row["product_id"], $row["name"], $row["rating"],$row["year"],  $row["genre"]);

	if($products == "")
		$products = '<h3 class="text-center"> Нет избранных</h3>';

	$sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `number` IS NOT NULL AND `product_id`=0 ORDER BY `created_at` DESC", $_SESSION["user_id"]);
	$result = $connect->query($sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="asset/css/cartstyle.css">
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
		$m .= ($_SESSION["role"] == "admin") ? '<a href="admin">Админ</a>' : '';
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


			<div class="head"><h1>Ваши избранные</h1></div>
			<div class="row">
				<?= $products ?>
			</div>
			<br>
		

	</main>

</body>
</html>
	