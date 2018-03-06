<?php
if (isset($_POST['action']))
{
	$manager = new DeliveryManager($pdo);
	$action = $_POST['action'];
	if ($action == 'step2')
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
			header('Location: index.php?page=home');
			exit;
		}
	}
	else if ($action == 'step1')
	{
		if (isset($_POST['howmuch'], $_POST['fnbs']))
		{
			$list = [];
			$i = 0;
			$pos = 0;
			while ($i < sizeof($_POST['howmuch']))
			{
				if ($_POST['howmuch'][$i] !== '')
				{
					$quantity = $_POST['howmuch'][$i];
					$plat = $_POST['fnbs'][$pos];
					$list[] = ["quantity" => $quantity, "id_fnb" => $plat];
					$pos++;
				}
				$i++;
			}
			$_SESSION['delivery'] = $list;
		}
	}
}
?>