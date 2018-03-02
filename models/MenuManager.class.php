<?php
class MenuManager
{
	// Pour corriger le bug de pdo inexistant il faut :
	// Ajouter $pdo aux propriétés des managers
	// Ajouter le constructeur aux managers
	// Modifier chaque création de Manager $xxx = new XxxManager(); par $xxx = new XxxManager($pdo);
	private $pdo;

	public function __construct($pdo)// new ArticleManager($pdo);
	{
		$this->pdo = $pdo;
	}
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM menu WHERE id=?");
		$query->execute([$id]);
		$menu = $query->fetchObject('menu', [$this->pdo]);
		return $menu;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM menu");
		$articles = $query->fetchAll(PDO::FETCH_CLASS, 'Menu', [$this->pdo]);
		return $menu;
	}
	public function findRandom()
	{
		$query = $this->pdo->query("SELECT * FROM menu ORDER BY RAND() LIMIT 1");
		$article = $query->fetchObject('menu', [$this->pdo]);
		return $menu;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function create($name, $description, $price, $id_fnb)
	{
		$query = $this->pdo->prepare("INSERT INTO menu (name, description, price, id_fnb) VALUES(?, ?, ?, ?)");
		$query->execute([$name, $description, $price, $id_fnb]);
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
		$query = $this->pdo->prepare("UPDATE menu SET name=?, description=?, price=?, id_fnb=? WHERE id=?");
		$query->execute([$menu->getName(), $menu->getDescription(), $menu->getPrice(), $menu->getIdFnb(), $menu->getId()]);
		return $this->find($menu->getId());
	}
}
?>