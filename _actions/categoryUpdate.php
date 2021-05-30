<?php

include "../vendor/autoload.php";

use Helpers\HTTP;
use Libs\Database\CategoryTable;
use Libs\Database\MySQL;

$data = [
    "category" => $_POST['category'] ?? 'Unknown',
];

$table = new CategoryTable(new MySQL());

if ($table) {
    $table->update($id, $category);
    // $updateId = $table->prepare('SELECT * FROM categories WHERE id = ?');
    // $updateId->execute([$_GET['id']]);
    // $getId = $updateId->fetch(PDO::FETCH_ASSOC);
    $all = $table->findByCategoryId($id);
    // $result = mysqli_query($table, "SELECT * FROM categories WHERE id='" . $_GET['id'] . "'");
    // $row = mysqli_fetch_array($result);

    HTTP::redirect("/admin/categoryIndex.php");
} else {
    HTTP::redirect("/admin/categoryUpdate.php", "error=true");
}
