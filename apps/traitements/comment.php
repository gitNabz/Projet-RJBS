<?php

// var_dump($_POST, $_SESSION);

if (isset($_POST['action']))
{
	$manager=new CommentManager($pdo);
	$action = $_POST['action'];
	if ($action == 'comments')
	{
		// Etape 1 : Vérifier la présence de tous les champs nécessaires
		// title, content, image, author
		if (isset( $_POST['content'],$_POST['name'],$_POST['email']))// isset : http://php.net/manual/fr/function.isset.php : is set : est définie
		{
			// Etape 2 : Vérifier la validité des champs
			
			$content = $_POST['content'];
			$name = $_POST['name'];
			$email = $_POST['email'];
	
			$comment=$manager->create($content, $name,$email);
			

			
			header('Location: index.php?page=comment&id='.$id);
			exit;
		}