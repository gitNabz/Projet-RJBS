<?php
$manager=new CommentManager($pdo);
$comment = $manager->findAll();
foreach ($comment AS $comments)
require('views/display_comments.phtml');
?>