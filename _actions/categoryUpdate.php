<?php

include "../vendor/autoload.php";

use Helpers\HTTP;
use Libs\Database\CategoryTable;
use Libs\Database\MySQL;

// $data = [
//     "category" => $_POST['category'] ?? 'Unknown',
// ];

$table = new CategoryTable(new MySQL());

// if ($table) {
//     $table->updateCategory($updatedata);
//     HTTP::redirect("/admin/categoryIndex.php");
// } else {
//     HTTP::redirect("/admin/categoryUpdate.php", "error=true");
// }

// Update Record in category table
if(isset($_POST['update'])) {
    $table->updateCategory($_POST);
    HTTP::redirect("/admin/categoryIndex.php");

  } else {
    HTTP::redirect("/admin/categoryUpdate.php", "error=true");
} 