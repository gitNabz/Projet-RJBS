<?php
class Fnb
{
	private $id;
	private $type;
	private $name;
	private $description;
	private $image;
	private $price;
	
	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}



	public function getId()
	{
		return $this->id;
	}
	public function getType()
	{
		return $this->type;
	}
	public function setType($Type)
	{
		$this->type = $type;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setName($Name)
	{
		$this->name = $name;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($Description)
	{
		$this->description = $description;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function setImage($Image)
	{
		$this->image = $image;
	} 
	public function getPrice()
	{
		return $this->price;
	}
	public function setPrice($Price)
	{
		$this->price = $price;
	}
	



}
?>