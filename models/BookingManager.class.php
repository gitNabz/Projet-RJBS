<?php

class BookingManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM bookings WHERE id=?");
		$query->execute[$id]);
		$booking = $query->fetchObject('Booking');
		return $booking;
	}

	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM bookings");
		$booking = $query->fetchAll(PDO::FETCH_CLASS, 'Booking');
		return $bookings;
	}

	public function remove(Booking $booking)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM bookings WHERE id=?");
		$query->execute([$booking->getId()]);
	}
	public function create($name, $phone, $date, $hours, $number, $comments)
	{
		$query = $this->pdo->prepare("INSERT INTO bookings ($name, $phone, $date, $hours, $number, $comments) VALUES(?, ?, ?)");
		$query->execute([$name, $phone, $date, $hours, $number, $comments]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function save(Booking $booking)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE bookings SET name=?, phone=?, date=?, hours=?, number=?, comments=? WHERE id=?");
		$query->execute([$booking->getName(), $booking->getPhone(), $booking->getDate(), $booking->getHours(), $booking->getNumber, $booking->getComments, $booking->getId()]);
		return $this->find($booking->getId());
	}
}
?>