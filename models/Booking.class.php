<?php
class Booking
{
	private $id;
	private $name;
	private $phone;
	private $date;
	private $hours;
	private $number;
	private $comment;

	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getPhone()
	{
		return $this->phone;
	}
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function setDate($date)
	{
		$this->date = $date;
	}
	public function getHours()
	{
		return $this->hours;
	}
	public function setHours($hours)
	{
		$hours = str_replace('h', ':', $hours).':00';
		$this->hours = $hours;
	}
	public function getNumber()
	{
		return $this->number;
	}
	public function setNumber($number)
	{
		$this->number = $number;
	}
	public function getComment()
	{
		return $this->comment;
	}
	public function setComment($comment)
	{
		$this->comment = $comment;
	}

}




?>