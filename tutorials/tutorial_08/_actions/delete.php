<?php

include("../vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$table = new MembersTable(new MySQL());

$id = $_GET['id'];
$table->delete($id);

header('location: ../family_table.php');
