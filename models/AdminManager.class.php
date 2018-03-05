<?php
class AdminManager
{

	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM admin WHERE id=?");
		$query->execute([$id]);
		$admin = $query->fetchObject('Admin');
		return $admin;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM admin");
		$admin = $query->fetchAll(PDO::FETCH_CLASS, 'Admin');
		return $admin;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	
	public function findByEmail($email)// getByEmail
	{
		$query = $this->pdo->prepare("SELECT * FROM admin WHERE email=?");
		$query->execute([$email]);
		$admin = $query->fetchObject('Admin');
		return $admin;
	}
	public function create($password, $email)
	{
		$admin = new Admin(/*$this->db*/);
		$admin->setPassword($password);
		$admin->setEmail($email);
		//var_dump($user);
		$query = $this->pdo->prepare("INSERT INTO admin (password, email) VALUES(?, ?, ?)");
		$query->execute([$admin->getHash(), $admin->getEmail()]);
		//var_dump($this->pdo->errorInfo());
		$id = $this->pdo->lastInsertId();
		//var_dump($id);
		return $this->find($id);
	}
	public function remove(Admin $admin)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM admin WHERE id=?");
		$query->execute([$admin->getId()]);
	}
	public function save(Admin $admin)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE admin SET password=?, email=? WHERE id=?");
		$query->execute([$admin->getHash(), $admin->getEmail(), $admin->getId()]);
		return $this->find($admin->getId());
	}
}
?>