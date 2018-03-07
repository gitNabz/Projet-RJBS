<?php

$manager = new BookingManager($pdo);
$bookings = $manager->findNext();
foreach ($bookings AS $booking)
	require('views/display_booking.phtml');

?>