<?php
session_start();
require_once 'models/model.php';

// Titre de la page
$title = "Liste des réparations";

// Récupère tous les éléments en base
$repairs = getAll("garage");

// Capture du html
ob_start();
include 'views/partials/_alert.php';
include 'views/partials/_listRepair.php';

// stop la capture et stock dans content
$content = ob_get_clean();
require 'views/layout.php';