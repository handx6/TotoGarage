<?php
require_once 'models/model.php';

// Récupère tous les éléments en base
$repair = get("garage");

// Titre de la page
$title = "Réparation n°" . $repair['id'];

// Capture du html
ob_start();
include 'views/partials/_showRepair.php';

// stop la capture et stock dans content
$content = ob_get_clean();
require 'views/layout.php';