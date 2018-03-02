<?php
class Products
{
	private $id;
	private $type;
	private $name;
	private $description;
	private $image;
	private $price;

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
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function setImage($image)
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