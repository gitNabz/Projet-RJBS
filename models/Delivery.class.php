<?php
class Delivery
{
	private $id;
	private $name;
	private $email;	
	private $phone;
	private $date;
	private $hours;
	private $address;
	private $comments;
	private $postcode;
	private $city;

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
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
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
		$this->hours = $hours;
	}
	public function getAddress()
	{
		return $this->address;
	}
	public function setAddress($address)
	{
		$this->address = $address;
	}
	public function getComment()
	{
		return $this->comment;
	}
	public function setComment($comment)
	{
		$this->comment = $comment;
	}
	public function getPostcode()
	{
		return $this->postcode;
	}
	public function setPostcode($postcode)
	{
		$this->postcode = $postcode;
	}
	public function getCity()
	{
		return $this->city;
	}
	public function setCity($city)
	{
		$this->city = $city;
	}

}

?>