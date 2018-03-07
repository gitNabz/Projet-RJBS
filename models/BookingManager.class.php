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
		$query = $this->pdo->prepare("SELECT * FROM booking WHERE id=?");
		$query->execute([$id]);
		$booking = $query->fetchObject('Booking');
		return $booking;
	}

	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM booking");
		$bookings = $query->fetchAll(PDO::FETCH_CLASS, 'Booking');
		return $bookings;
	}

	public function remove(Booking $booking)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM booking WHERE id=?");
		$query->execute([$booking->getId()]);
	}
	public function create($name, $phone, $date, $hours, $number, $comment)
	{
		$booking = new Booking($this->pdo);
		$booking->setName($name);
		$booking->setPhone($phone);
		$booking->setDate($date);
		$booking->setHours($hours);
		$booking->setNumber($number);
		$booking->setComment($comment);
		$query = $this->pdo->prepare("INSERT INTO booking (name, phone, date, hours, number, comment) VALUES(?, ?, ?, ?, ?, ?)");
		$query->execute([$name, $phone, $date, $booking->getHours(), $number, $comment]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function save(Booking $booking)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE booking SET name=?, phone=?, date=?, hours=?, number=?, comment=? WHERE id=?");
		$query->execute([$booking->getName(), $booking->getPhone(), $booking->getDate(), $booking->getHours(), $booking->getNumber(), $booking->getComment(), $booking->getId()]);
		return $this->find($booking->getId());
	}
	public function findNext()
	{
		$query = $this->pdo->query("SELECT * FROM booking WHERE date>=CURDATE()");
		$bookings = $query->fetchAll(PDO::FETCH_CLASS, 'Booking');
		return $bookings;
	}
}
?>