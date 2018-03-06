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
		$comment = $query->fetchObject('Comment');
		return $comment;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM comments");
		$comments = $query->fetchAll(PDO::FETCH_CLASS, 'Comment');
		return $comments;
	}
	public function remove(Comment $comment)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM comments WHERE id=?");
		$query->execute([$comment->getId()]);
	}
	public function create($content, $id_author, $id_article, $note)
	{
		$query = $this->pdo->prepare("INSERT INTO comments (content, name, email) VALUES(?, ?, ?)");
		$query->execute([$content, $name, $email]);
		$id =$this->pdo->lastInsertId();
		return $this->find($id);
	}




	?>