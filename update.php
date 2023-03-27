<?php
session_start();
require_once 'models/model.php';

$title = "Modifier la réparation";
$repair = get("garage");

ob_start();

include 'views/updateRepair.php';

$content = ob_get_clean();

require "views/layout.php";