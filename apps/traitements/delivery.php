<?php
var_dump($_POST);
if (isset($_POST['action']))
{
	$manager = new DeliveryManager($pdo);
	$action = $_POST['action'];
	if ($action == 'create')
	{
		if (isset($_POST['name'], $_POST['phone'], $_POST['date'], $_POST['hours'], $_POST['address'], $_POST['comment']))
		{	
			var_dump($_POST);
			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$date = $_POST['date'];
			$hours = $_POST['hours'];
			$address = $_POST['address'];
			$comment = $_POST['comment'];

<<<<<<< HEAD
=======

			header('Location: index.php?page=home');
			exit;
>>>>>>> 8fc5e22ad3ea4548bba110c02ab51aa2f021426b
		}
	}



?>