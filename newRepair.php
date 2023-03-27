<?php
session_start();
$title = "Nouvelle réparation";

ob_start();

include 'views/newRepair.php';

$content = ob_get_clean();

require "views/layout.php";