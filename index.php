<?php
try
{

	session_start();
	//var_dump($_SESSION);
	
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

	$access = ['home', 'menu','comments', 'edit', 'admin', 'booking', 'delivery', 'createfnb', 'listebookings','carte', 'create'];
<<<<<<< HEAD

=======
>>>>>>> b39ab936aab7cae5d7a7f434e94b53011824faf7

	if (isset($_GET['page']))
	{
		
		if (in_array($_GET['page'], $access))
		{
			$page = $_GET['page'];
		}
		else 
		{
			throw new Exception('La page n\'existe pas');
		}
	}



	spl_autoload_register(function($classname)

	

	{
		require('models/'.$classname.'.class.php');
	});

	require('apps/traitements/fnb.php');
	require('apps/traitements/admin.php');
	require('apps/traitements/booking.php');
	require('apps/traitements/comments.php');
	require('apps/traitements/delivery.php');
	require('apps/base.php');


    //var_dump($_SESSION);


}
catch (Exception $e)
{
	exit('Erreur : ' . $e->getMessage());
}


?>
