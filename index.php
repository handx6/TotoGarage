<?php
session_start();
$title = "Accueil";
ob_start();
$content = ob_get_clean();
require 'views/layout.php';