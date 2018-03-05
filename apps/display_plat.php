<?php
$manager=new FnbManager($pdo);
$fnbs = $manager->findByType("plat");
foreach ($fnbs AS $fnb)
	require('views/display_plat.phtml');
?>
