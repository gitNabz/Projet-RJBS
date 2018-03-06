<?php
if (isset($_SESSION['id']))
    require('views/footer_admin.phtml');
 else
   require('views/footer.phtml');
 ?>
