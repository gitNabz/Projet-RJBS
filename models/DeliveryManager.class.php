<?php
class DeliveryManager 
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM delivery WHERE id=?");
		$query->execute ([$id]);
		$delivery = $query->fetchObject('Delivery');
		return $delivery;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM delivery");
		$deliveries = $query->fetchAll (PDO::FETCH_CLASS, 'Delivery');
		return $deliveries;
	}
	// public function findByIdDelivery($id)
	// {
	// 	$query = $this->pdo->prepare("SELECT * FROM delivery WHERE id_delivery=?");
	// 	$query->execute([$id]);
	// 	$deliveries = $query->fetchAll(PDO::FETCH_CLASS, 'Delivery');
	// 	return $deliveries;
	// }
	public function findById($id)
	{
		return $this->find($id);
	}
	public function create($name, $phone, $date, $hours, $address, $comment)
	{
		$query = $this->pdo->prepare("INSERT INTO delivery (name, phone, date, hours, address, comment) VALUES(?, ?, ?, ?, ?, ?)");
		$query->execute([$name, $phone, $date, $hours, $address, $comment]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function remove(Delivery $delivery)
	{
		$query = $this->pdo->prepare("DELETE FROM delivery WHERE id=?");
		$query->execute([$delivery->getId()]);
	}
	public function save(Delivery $delivery)
	{
		$query = $this->pdo->prepare("UPDATE delivery SET name=?, phone=?, date=?, hours=?, address=?, comment=? WHERE id=?");
		$query->execute([$delivery->getName(), $delivery->getPhone(), $delivery->getDate(), $delivery->getHours(), $delivery->getAddress(), $delivery->getComment(), $delivery->getId()]);
		return $this->find($delivery->getId());
	}
}
?>
