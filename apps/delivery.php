<?php
$manager = new FnbManager($pdo);
$fnbs = $manager->findAll();
require('views/delivery_step1.phtml');
?>