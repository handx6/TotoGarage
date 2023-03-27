<?php
// récupère la connexion à la BDD
require_once 'database.php';
include_once 'helpers/functions.php';
// stocke la connexion dans $pdo
$pdo = pdo();
/**
 * Get all items in DB
 */
function getAll($table, $order = "")
{
    global $pdo;
    // 1 - Stock la requête qui sélectionne tout dans ma DB
    $sql = "SELECT * FROM $table";
    if ($order) {
        $sql .= " ORDER BY " . $order;
    }
    // 2 - Prépare la requête
    $query = $pdo->prepare($sql);
    // 3 - Éxécute la requête
    $query->execute();
    // 4 - Stocke le résultat dans une variable
    return $query->fetchAll();
}

/**
 * Get all items corresponding to criter in DB
 */

function getWhere($table, $where)
{
    global $pdo;
    // 1 - Stock la requête qui sélectionne tout dans ma DB
    $sql = "SELECT * FROM $table" . ' ' . $where;

    // 2 - Prépare la requête
    $query = $pdo->prepare($sql);
    // 3 - Éxécute la requête
    $query->execute();
    // 4 - Stocke le résultat dans une variable
    return $query->fetchAll();
}

/**
 * Get the id of item
 *
 * return int
 */
function getId()
{
    // 1- Récupère le bon id de l'élément
    if (!empty($_GET['id']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
        // On nettoie l'id
        $id = cleanInput($_GET['id']);

    } else {
        // redirection quand l'id est invalide
        // debug_array($_GET);
        $_SESSION['error'] = 'ID invalide';
        header('Location: index.php');
    }
    return $id;
}

/**
 * get a single item
 *
 * return array
 */
function get($table)
{
    global $pdo;
    $id = getId();
    // Faire la requête
    $sql = "SELECT * FROM $table WHERE id= :id";
    // Prépare la requête
    $query = $pdo->prepare($sql);
    // Associe la valeur à un paramêtre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // Execute ma requête
    $query->execute();
    // Stocke l'étudiant dans une variable
    $item = $query->fetch();
    //debug_array($student);

    // Pas de student: redirection
    if (!$item) {
        $_SESSION['error'] = "Cet élément n'existe pas";
        header('Location: listRepair.php');
    }
    return $item;
}

/**
 * Supprime le student
 */
function delete($table)
{
    global $pdo;
    $pdo = pdo();
    // On nettoie l'id
    $id = getId();
    // Faire la requête
    $sql = "DELETE FROM $table WHERE id= :id";
    // Prépare la requête
    $query = $pdo->prepare($sql);
    // Associe la valeur à un paramêtre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // Execute ma requête
    $query->execute();
    $_SESSION['success'] = 'Étudiant supprimé avec succès';
    header('Location: listRepair.php');
}

/**
 * Insert to DB
 */
function create($fName, $lName, $email, $car_name, $city, $address, $post_code, $status, $prestation, $dateRepair)
{
    global $error;
    global $pdo;
    global $success;

    if (count($error) == 0) {
        $success = true;

        // 1 - La requête
        $sql = "INSERT INTO `garage` (`id`, `client_fName`, `client_lName`, `client_email`, `client_car_name`, `client_city`, `client_address`, `client_code_postal`, `type_prestation`, `date_reparation`, `status_paiement`, `created_at`, `updated_at`) VALUES (NULL, :fName, :lName, :email, :car_name, :city, :address, :post_code, :prestation, :date_reparation, :status, NOW(), NOW());";

        // 2 - prepare la requête
        $query = $pdo->prepare($sql);
        // 3 - associe chaque parametre à sa valeur
        $query->bindValue(':fName', $fName, PDO::PARAM_STR);
        $query->bindValue(':lName', $lName, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':car_name', $car_name, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        $query->bindValue(':address', $address, PDO::PARAM_STR);
        $query->bindValue(':post_code', $post_code, PDO::PARAM_INT);
        $query->bindValue(':prestation', $prestation, PDO::PARAM_STR);
        $query->bindValue(':date_reparation', $dateRepair, PDO::PARAM_STR);
        $query->bindValue(':status', $status, PDO::PARAM_INT);

        // 4 - Execute la requête
        $query->execute();
        // 5 - redirect
        $_SESSION['success'] = "Réparation ajouté";
        header('Location: listRepair.php');
    }
}

/**
 * Update item  in DB
 */

function update($fName, $lName, $email, $car_name, $city, $address, $post_code, $status, $prestation, $dateRepair)
{
    global $error;
    global $pdo;
    global $success;

    if (count($error) == 0) {
        $success = true;

        //requete
        $sql = "UPDATE `garage` SET client_fName=:fName, client_lName=:lName, client_email=:email, client_car_name=:car_name, client_city=:city, client_address=:address, client_code_postal=:post_code, type_prestation=:prestation, date_reparation=:date_reparation, status_paiement=:status, updated_at=NOW() WHERE id=:id;";

        // 2 - prepare la requête
        $query = $pdo->prepare($sql);
        // 3 - associe chaque parametre à sa valeur
        $id = getId();
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':fName', $fName, PDO::PARAM_STR);
        $query->bindValue(':lName', $lName, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':car_name', $car_name, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        $query->bindValue(':address', $address, PDO::PARAM_STR);
        $query->bindValue(':post_code', $post_code, PDO::PARAM_STR);
        $query->bindValue(':prestation', $prestation, PDO::PARAM_STR);
        $query->bindValue(':status', $status, PDO::PARAM_INT);
        $query->bindValue(':date_reparation', $dateRepair, PDO::PARAM_STR);
        // 4 - Execute la requête
        $query->execute();
        // 5 - redirect
        $_SESSION['success'] = "Réparation modifiée";
        header('Location: listRepair.php');
    }
}