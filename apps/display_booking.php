<?php

$manager = new BookingManager($pdo);
$bookings = $manager->findAll();

foreach ($bookings AS $booking)
require('views/display_booking.phtml');

?>