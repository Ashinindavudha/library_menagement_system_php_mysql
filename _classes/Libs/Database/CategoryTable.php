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
        $statement = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $statement->execute([':id' => $id]);
        $row = $statement->fetch();

        return $row ?? false;
    }

//     $result = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $_GET['userid'] . "'");
// $row = mysqli_fetch_array($result);

    // public function updateCategory()
    // {
    //     $statement = $this->db->prepare(
    //         "UPDATE categories SET id = ?, category = ? WHERE id = ?");
    //     $statement->execute();

    //     return $statement->rowCount();
    // }

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
