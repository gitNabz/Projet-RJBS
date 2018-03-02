<?php
class Booking
{
	private $id;
	private $name;
	private $phone;
	private $date;
	private $hours;
	private $number;
	private $comments;

	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setName($Name)
	{
		$this->name = $name;
	}
	public function getPhone()
	{
		return $this->phone;
	}
	public function setPhone($Phone)
	{
		$this->phone = $phone;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function setDate($Date)
	{
		$this->date = $date;
	}
	public function getHours()
	{
		return $this->hours;
	}
	public function setHours($Hours)
	{
		$this->hours = $hours;
	}
	public function getNumber()
	{
		return $this->number;
	}
	public function setNumber($Number)
	{
		$this->number = $number;
	}
	public function getComments()
	{
		return $this->comments;
	}
	public function setComments($Comments)
	{
		$this->comments = $comments;
	}

}




?>