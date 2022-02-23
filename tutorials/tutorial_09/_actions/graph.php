<?php

include("../vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$table = new MembersTable(new MySQL());
$all = $table->getAll();

header('Content-Type: application/json');
echo json_encode($all);