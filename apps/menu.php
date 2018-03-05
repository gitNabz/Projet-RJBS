<<<<<<< HEAD
<?php
=======
 <?php
<<<<<<< HEAD
=======
>>>>>>> 48aec0f4266dc1742306486324befc5209a9d239

>>>>>>> 8fc5e22ad3ea4548bba110c02ab51aa2f021426b
$manager = new FnbManager($pdo);
$fnbs = $manager->findAll();
foreach ($fnbs AS $fnb)
	require('views/menu.phtml');
?>
