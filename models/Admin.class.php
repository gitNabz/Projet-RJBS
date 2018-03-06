<?php
// User.class.php : http://192.168.1.22/partage/User.class.php
class Admin
{
	// Propriétés (variables)
	private $id;// private = protégé de l'extérieur => encapsulation
	private $password;
	private $email;

	// Méthodes (fonctions)
	public function getId()// getter de id
	{
		return $this->id;
	}
	
	public function getHash()
	{
		return $this->password;
	}
	
	public function verifPassword($password)
	{
		// http://php.net/manual/fr/function.password-verify.php
		return password_verify($password, $this->password);
	}
	public function setPassword($password)// http://php.net/manual/fr/function.password-hash.php
	{
		if (strlen($password) > 9)// strlen = str len = string length = taille de la chaine
		{
			$this->password = password_hash($password, PASSWORD_DEFAULT, ["cost"=>11]);
		}
		else
		{
			throw new Exception("Mot de passe trop court (< 10 caractères)");
		}
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
}
?>