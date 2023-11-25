<?php
	include "check_admin.php";
	include "../connect.php";

	$path = "images/upload/1_". time() ."_". $_FILES["image"]["name"];
	move_uploaded_file($_FILES["image"]["tmp_name"], "../".$path);

	$connect->query(sprintf("INSERT INTO `products`(`name`, `price`, `rating`, `year`, `genre`, `category`, `opisanie`, `actors`,`video`,`path`) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $_POST["name"], $_POST["price"], $_POST["rating"], $_POST["year"], $_POST["genre"], $_POST["category"], $_POST["opisanie"], $_POST["actors"],$video, $path));

	return header("Location:../admin?message=Товар добавлен");