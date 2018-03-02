<?php
class MenuManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM menu WHERE id=?");
		$query->execute([$id]);
		$menu = $query->fetchObject('Menu', [$this->pdo]);
		return $menu;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM menu");
		$menus = $query->fetchAll(PDO::FETCH_CLASS, 'Menu', [$this->pdo]);
		return $menus;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function create($name, $description, $price)
	{
		$query = $this->pdo->prepare("INSERT INTO menu (name, description, price) VALUES(?, ?, ?)");
		$query->execute([$name, $description, $price]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function remove(Menu $menu)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM menu WHERE id=?");
		$query->execute([$menu->getId()]);
	}
	public function save(Menu $menu)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE menu SET name=?, description=?, price=?  WHERE id=?");
		$query->execute([$menu->getName(), $menu->getDescription(), $menu->getPrice(), $menu->getId()]);
		return $this->find($menu->getId());
	}
}
?>