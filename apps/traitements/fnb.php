<?php
var_dump($_POST);
if (isset($_POST['action']))
{
	$manager = new FnbManager($pdo);
	$action = $_POST['action'];
	if ($action == 'create')
	{
		
		if (isset($_POST['type'], $_POST['name'],$_POST['description'], $_POST['image'],$_POST['price']))
		{
			var_dump($_POST);
			$type = $_POST['type'];
			$name = $_POST['name'];
			$description= $_POST['description'];
			$image = $_POST['image'];
			$price = $_POST['price'];
			$fnb = $manager->create($type, $name, $description, $image, $price);
		
			
			header('Location: index.php?page=menu&id='.$fnb->getId());
			exit;
		}
	}

}

?>