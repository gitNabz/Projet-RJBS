<?php

if (isset($_POST['action']))
{
	$manager = new BookingManager($pdo);
	$action = $_POST['action'];
	if ($action == 'create')
	{

		if (isset($_POST['name'], $_POST['phone'], $_POST['date'], $_POST['hours'], $_POST['number'], $_POST['comment']))
		{
			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$date = $_POST['date'];
			$hours = $_POST['hours'];
			$number = $_POST['number'];
			$comment = $_POST['comment'];
			$booking = $manager->create($name, $phone, $date, $hours, $number, $comment);
			header('Location: index.php?page=home');
			// var_dump($_POST);
			exit;
		}
	}
}
