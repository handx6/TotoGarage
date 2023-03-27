<?php
session_start();
require_once 'models/model.php';

// Titre de la page
$title = "Liste des réparations en attente de paiment";

// Récupère tous les éléments en base
$repairs = getWhere("garage", "WHERE status_paiement=0");
if (count($repairs) == 0) {
    $_SESSION['error'] = "Pas de réparation en attente de paiement";
}
// Capture du html
ob_start();
include 'views/partials/_alert.php';
include 'views/partials/_listRepair.php';

// stop la capture et stock dans content
$content = ob_get_clean();
require 'views/layout.php';