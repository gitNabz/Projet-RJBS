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
	public function create($name, $phone, $date, $hours, $address, $comment, $postcode, $city, $list)
	{
		$query = $this->pdo->prepare("INSERT INTO delivery (name, phone, date, hours, address, comment, postcode, city) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
		$query->execute([$name, $phone, $date, $hours, $address, $comment, $postcode, $city]);
		$id = $this->pdo->lastInsertId();
		$query_link = $this->pdo->prepare("INSERT INTO link_delivery_fnb (id_delivery, id_fnb) VALUES(?, ?)");
		var_dump($list);
		foreach ($list AS $info)
		{
			$id_fnb = $info['id_fnb'];
			$quantity = $info['quantity'];
			while ($quantity > 0)
			{
				$query_link->execute([$id, $id_fnb]);
				$quantity--;
			}
		}
		return $this->find($id);
	}
	public function remove(Delivery $delivery)
	{
		$query = $this->pdo->prepare("DELETE FROM delivery WHERE id=?");
		$query->execute([$delivery->getId()]);
	}
	public function save(Delivery $delivery)
	{
		$query = $this->pdo->prepare("UPDATE delivery SET name=?, phone=?, date=?, hours=?, address=?, comment=?, postcode=?, city=?, WHERE id=?");
		$query->execute([$delivery->getName(), $delivery->getPhone(), $delivery->getDate(), $delivery->getHours(), $delivery->getAddress(), $delivery->getComment(), $delivery->getPostcode(),$delivery->getCity(), $delivery->getId()]);
		return $this->find($delivery->getId());
	}
}
?>
