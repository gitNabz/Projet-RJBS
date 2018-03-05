<?php
$manager=new FnbManager($pdo);
$fnbs = $manager->findByType("entree");
foreach ($fnbs AS $fnb)
	require('views/display_entree.phtml');
?>
