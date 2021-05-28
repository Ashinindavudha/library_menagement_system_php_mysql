<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\CategoryTable;
use Helpers\HTTP;
use Helpers\Auth;

$auth = Auth::check();

$table = new CategoryTable(new MySQL());

$id = $_GET['id'];
$table->delete($id);

HTTP::redirect("/admin/categoryIndex.php");
