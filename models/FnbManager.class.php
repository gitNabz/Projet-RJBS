<?php
class FnbManager
{
	private $pdo;
	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM fnb WHERE id=?");
		$query->execute([$id]);
		$fnb = $query->fetchObject('Fnb',[$this->pdo]);
		return $fnb;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM fnb");
		$fnb = $query->fetchAll(PDO::FETCH_CLASS, 'Fnb',[$this->pdo]);
		return $fnb;
	}
	public function findRandom()
	{
		$query = $this->pdo->query("SELECT * FROM fnb ORDER BY RAND() LIMIT 1");
		$fnb = $query->fetchObject('Fnb',[$this->pdo]);
		return $fnb;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function create($type, $name,$description, $image, $price)
	{
		$query = $this->pdo->prepare("INSERT INTO fnb (type ,name, description, image, price) VALUES(?, ?, ?, ?, ?)");
		$query->execute([$type, $name, $description, $image, $price]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function remove(Fnb $fnb)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM fnb WHERE id=?");
		$query->execute([$fnb->getId()]);
	}
	/*public function save(Fnb $fnb)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE fnb SET type=?, name=?, description=?, image=?, price=? WHERE id=?");
		$query->execute([$fen->getType(), $fnb->getName(),$fnb->getDescription $fnb->getImage(), $fnb->getPrice(), $fnb->getId()]);
		return $this->find($fnb->getId());
	}*/
	public function findByType($type)
	{
		$query = $this->pdo->prepare("SELECT * FROM fnb WHERE type=?");
		$query->execute([$type]);
		$fnbs = $query->fetchAll(PDO::FETCH_CLASS, 'Fnb',[$this->pdo]);
		return $fnbs;
	}
	public function findByDelivery(Delivery $delivery)
	{
		$query = $this->pdo->prepare("SELECT fnb.*, COUNT(fnb.id) AS quantity FROM fnb LEFT JOIN link_delivery_fnb ON link_delivery_fnb.id_fnb=fnb.id WHERE link_delivery_fnb.id_delivery=? GROUP BY fnb.id");
		$query->execute([$delivery->getId()]);
		$fnbs = $query->fetchAll(PDO::FETCH_CLASS, 'Fnb',[$this->pdo]);
		return $fnbs;
	}
	
}
?>