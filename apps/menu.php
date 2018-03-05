<?php

$manager = new FnbManager($pdo);
$fnbs = $manager->findAll();

foreach ($fnbs AS $fnb)
	require('views/menu.phtml');
?>
