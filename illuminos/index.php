

<?php
	session_start();
	include "connect.php";

	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";

	$sql = "SELECT * FROM `categories`";
	$result = $connect->query($sql);
	$categories = "";
	while($row = $result->fetch_assoc())
		$categories .= sprintf('<option value="%s">%s</option>', $row["category"], $row["category"]);

	$sql = "SELECT * FROM `products`";
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
    <div class="banner1">
        <div class="banner__zatemnenie">
            <div class="ban-cont">
            <div class="banner__text">
                
        <h1>НА ВЫДОХЕ</h1>
        <h3>8.3    &nbsp;  &nbsp; &nbsp;  2023</h3>
        <p>Жизнеутверждающая драма о судьбоносном знакомстве участницы боев без правил и парня в инвалидном кресле. В главной роли Елена Подкаминская</p>
        <button><img src="asset/img/Polygon 1.png" alt=""><a href="">Смотреть</a></button>
            </div></div>
        </div>
    </div>
    <div class="container">
        <div class="zag1">
            <h1>Популярное</h1>
            <div class="line1"></div>
        </div>
        <div class="popular__row">
            <div class="popular__row-cart">
                <div class="popular__row-cart__img">
                    <img src="asset/img/1.png" alt="">
                    <h1>Нулевой пациент</h1>
                    <p>8.1  &nbsp;  &nbsp; 2020</p>
                    <h3>детектив </h3>
                </div>
            </div>
            <div class="popular__row-cart">
                <div class="popular__row-cart__img">
                    <img src="asset/img/2.png" alt="">
                    <h1>Нулевой пациент</h1>
                    <p>8.1  &nbsp;  &nbsp; 2020</p>
                    <h3>детектив </h3>
                </div>
            </div>
            <div class="popular__row-cart">
                <div class="popular__row-cart__img">
                    <img src="asset/img/3.png" alt="">
                    <h1> <p>Нулевой пациент</p> </h1>
                    <p>8.1  &nbsp;  &nbsp; 2020</p>
                    <h3>детектив </h3>
                </div>
            </div>
        </div>
        <div class="zag1">
            <h1>Детективы</h1>
            <div class="line1"></div>
        </div>
        <?php
$sql = "SELECT * FROM `products` WHERE genre='детектив'";
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

        
	$detek = "";
	while($row = $result->fetch_assoc())
		$detek .= sprintf('  
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

	if($detek == "")
		$detek = '<h3 class="text-center">Товары отсутствуют</h3>';
?>
  <div class="container">
<div class="in-products" id="products">
				<?= $detek ?>
			</div>
</div>
        <div class="new">
            <main>
         
                <div class="slider-container">
                <div class="slider"><button class="prev-button" aria-label="Посмотреть предыдущий слайд">&lt;</button>
                 <div class="sl-content1">
                    <div class="sl__text">
                
                        <h1>Джокер</h1>
                        <h3>9.1    &nbsp;  &nbsp; &nbsp;  2020</h3>
                        <p>История становления знаменитого злодея из Готэма. Неудачливый клоун Артур Флек однажды перестает бороться со своим безумием и жестоко смеется над всем ненавистным городом. </p>
                        <button><img src="asset/img/Polygon 1.png" alt=""><a href="">Смотреть</a></button>
                            </div>
                   
                 </div>
                 <div class="sl-content2">
                    <div class="sl__text">
                
                        <h1>Черная весна</h1>
                        <h3>7.9    &nbsp;  &nbsp; &nbsp;  2023</h3>
                        <p>Смелый и откровенный сериал о любви, дуэлях и семейных тайнах, с мощным актерским составом</p>
                        <button><img src="asset/img/Polygon 1.png" alt=""><a href="">Смотреть</a></button>
                            </div>
                   
                 </div>  <button class="next-button" aria-label="Посмотреть следующий слайд">&gt</button>
                </div>
                
              
              </div>
              </main>
              
              <script src="asset/js/sript.js"></script>
                
        </div>
 
	<main>
		<div class="content">

	
			<div class="row" style="margin-bottom: 20px">
				<p>
					<span id="all" onclick="filter.filter('all')">Все</span> | 
					<span id="year" onclick="filter.filter('year', 'sort')">Год</span> | 
					<span id="name" onclick="filter.filter('name', 'sort')">Наименование</span> | 
					<span id="price" onclick="filter.filter('rating', 'sort')">Цена</span>
				</p>
				<select id="category" onchange="filter.filter('category', 'filter')">
					<option value disabled selected>Фильтрация по категориям</option>
					<?= $categories ?>
				</select>
			</div>

			<div class="in-products" id="products">
				<?= $data ?>
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
    </div>
	<script>filter.products()</script>
	<script src="scripts/filter.js"></script>

</body>
</html>