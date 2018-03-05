<?php
$manager=new FnbManager($pdo);
$fnbs = $manager->findByType("dessert");
foreach ($fnbs AS $fnb)
	require('views/display_dessert.phtml');
?>
