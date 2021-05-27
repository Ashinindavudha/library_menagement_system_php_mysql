<?php 

namespace Libs\Database;

use PDOException;

class CategoryTable 
{
	private $db = null;

	 public function __construct(MySQL $db)
	{
		$this->db = $db->connect();
	}

	 public function insert($data)
	{
		try {
			$query = "INSERT INTO categories (category) VALUES (:category)";
			$statement = $this->db->prepare($query);
			$statement->execute($data);
			return $this->db->lastInsertId();
		} catch (PDOException $e) {
			return $e->getMessage()();
		}
	}

	public function CategoryIndex() {
		$statement = $this->db->query("SELECT * FROM categories");
		return $statement->fetchAll();
	}
}