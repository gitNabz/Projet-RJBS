<<<<<<< HEAD
<?php
=======
 <?php
>>>>>>> 48aec0f4266dc1742306486324befc5209a9d239

$manager = new FnbManager($pdo);
$fnbs = $manager->findAll();

foreach ($fnbs AS $fnb)
	require('views/menu.phtml');
?>
