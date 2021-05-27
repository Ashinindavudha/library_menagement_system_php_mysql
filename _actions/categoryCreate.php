<?php 
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\CategoryTable;
use Helpers\HTTP;

$data = [
	"category" => $_POST['category'] ?? 'Unknown'
];

$table = new CategoryTable(new MySQL());

if ($table) {
	$table->insert($data);
	HTTP::redirect("/admin/categoryIndex.php");
} else {
	HTTP::redirect("/admin/createCategory.php");
}