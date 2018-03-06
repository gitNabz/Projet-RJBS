<?php
try
{

	session_start();
	//var_dump($_SESSION);
	// Tableau de configuration de PDO
	$options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	];
	try
	{
		$pdo = new PDO('mysql:dbname=resto;host=192.168.1.73', 'resto', 'resto',$options);
	}
	catch(PDOException $exception)
	{
		exit('erreur serveur:'. $exception->getMessage());
	}
	$error='';
	$page = 'home';

<<<<<<< HEAD

	$access = ['home', 'menu', 'edit','admin', 'booking', 'delivery', 'createfnb', 'carte', 'create'];
=======
	$access = ['home', 'menu','comments', 'edit', 'admin', 'booking', 'delivery', 'createfnb', 'listebookings','carte', 'create'];
>>>>>>> 25ebfbfce711a85cf9fc30dc83e477b040b620d8
	
	if (isset($_GET['page']))
	{
		// Si jamais la page se trouve dans la liste des pages
		// on peut y accéder
		if (in_array($_GET['page'], $access))
		{
			$page = $_GET['page'];
		}
		else // La page ne se trouve pas dans la liste des pages du site on lance ce message
		{
			throw new Exception('La page n\'existe pas');
		}
	}

	spl_autoload_register(function($classname)// BONNE VERSION
	{
		require('models/'.$classname.'.class.php');
	});

	require('apps/traitements/fnb.php');
	require('apps/traitements/admin.php');
	require('apps/traitements/booking.php');
	require('apps/traitements/comments.php');
	require('apps/base.php');

}
catch (Exception $e)
{
	exit('Erreur : ' . $e->getMessage());
}


?>
