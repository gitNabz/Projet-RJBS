<?php
if (isset($_GET['id']))
{
	$manager = new DeliveryManager($pdo);
	$delivery = $manager->find($_GET['id']);
	$fnbs = $delivery->getFnb();
	require('views/delivery_step3.phtml');
}
else if (isset($_SESSION['delivery']))
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