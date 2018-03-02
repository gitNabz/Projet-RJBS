<?php
if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'create')
	{
if (isset($_POST['name'], $POST['phone'], $POST['date'], $POST['hours'], $POST['number'], $POST['comments']))			