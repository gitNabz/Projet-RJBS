<?php
class Menu
{
	private $id;
	private $name;
	private $description;
	private $price;

    private $pdo;
    
    public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
    
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
	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		$this->description = $description;
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