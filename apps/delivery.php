<?php
if (isset($_SESSION['delivery']))
{
	require('views/delivery_step2.phtml');
}
else
{
	$manager = new FnbManager($pdo);
	$fnbs = $manager->findAll();
	require('views/delivery_step1.phtml');
}
?>