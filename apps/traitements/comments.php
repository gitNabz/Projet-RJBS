<?php

if (isset($_POST['action']))
{
	$manager=new CommentManager($pdo);
	$action = $_POST['action'];
	if ($action == 'create')
	{
		
		if (isset( $_POST['content'],$_POST['name'],$_POST['email']))
		{
			
			$content = $_POST['content'];
			$name = $_POST['name'];
			$email = $_POST['email'];
	
			$comment=$manager->create($content, $name, $email);
			
			header('Location: index.php?page=comments&id='.$comment->getId());
			exit;
		}
	}
}	
?>	