<?php
	include "check.php";
	include "../connect.php";

	$sql = sprintf("SELECT * FROM `users` WHERE `user_id`='%s'", $_SESSION["user_id"]);
	if($connect->query($sql)->fetch_assoc()["password"] != $_POST["password"])
		return header("Location:../cart.php?message=Ошибка пароля");

	$sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `number` IS NULL", $_SESSION["user_id"]);
	$count = $connect->query($sql)->fetch_array()[0];

	$connect->query(sprintf("INSERT INTO `orders`(`product_id`, `user_id`, `number`,  `status`) VALUES('0', '%s', '%s', 'Новый')", $_SESSION["user_id"]));

	$connect->query(sprintf("DELETE FROM `orders` WHERE `user_id`='%s' AND `number` IS NULL", $_SESSION["user_id"]));

	return header("Location:../cart.php?message=Заказ оформлен");