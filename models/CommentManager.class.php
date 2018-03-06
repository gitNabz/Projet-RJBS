<?php
class CommentManager
{
	private $pdo;

	public function __construct($pdo)// new ArticleManager($pdo);
	{
		$this->pdo = $pdo;
	}
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM comments WHERE id=?");
		$query->execute([$id]);
		$comments = $query->fetchObject('Comments');
		return $comments;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT content,name,date FROM comments");
		$comments = $query->fetchAll(PDO::FETCH_CLASS, 'Comments');
		return $comments;
	}
	public function remove(Comments $comments)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM comments WHERE id=?");
		$query->execute([$comments->getId()]);
	}
	public function create($content, $name, $email)
	{
		$query = $this->pdo->prepare("INSERT INTO comments (content, name, email) VALUES(?, ?, ?)");
		$query->execute([$content, $name, $email]);
		$id =$this->pdo->lastInsertId();
		return $this->find($id);
	}

}


	?>