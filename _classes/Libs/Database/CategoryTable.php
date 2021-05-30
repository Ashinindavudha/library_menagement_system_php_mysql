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

    public function CategoryIndex()
    {
        $statement = $this->db->query("SELECT * FROM categories");
        return $statement->fetchAll();
    }

    public function findByCategoryId($id)
    {
        //$id = $_GET['id']; // get id through query string
        $statement = $this->db->prepare("SELECT * FROM categories WHERE id = '$id'");
        $statement->execute([':id' => 'id']);
        $row = $statement->fetch();

        return $row ?? false;
    }

    public function updateCategory($updatedata)
    {
        // $statement = $this->db->prepare(
        //     "UPDATE categories SET id = ?, category = ? WHERE id = ?");
        // $statement->execute();

        // return $statement->rowCount();
        $category = $this->db->mysqli_real_escape_string($_POST['category']);
        $id = $this->db->mysqli_real_escape_string($_POST['id']);
        if (!empty($id) && !empty($updatedata)) {
            $query = "UPDATE categories SET category = '$category' WHERE id = '$id'";
            $sql = $this->db->query($query);
        }
    
    }

    public function update($id, $category)
    {
        $task = [
            ':id' => $id,
            ':category' => $category];

        $sql = 'UPDATE categories SET category = :category WHERE id = :id';

        $q = $this->db->prepare($sql);

        return $q->execute($task);
    }

    public function delete($id)
    {
        $statement = $this->db->prepare("
            DELETE FROM categories WHERE id = :id
        ");

        $statement->execute([':id' => $id]);

        return $statement->rowCount();
    }
}
