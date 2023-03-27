<?php
// 3- protege contre faille xss
///////////////////////////////
$fName = trim(htmlspecialchars($_POST['fName']));
$lName = trim(htmlspecialchars($_POST['lName']));
$email = trim(htmlspecialchars($_POST['email']));
$car_name = trim(htmlspecialchars($_POST['car_name']));
$city = trim(htmlspecialchars($_POST['city']));
$address = trim(htmlspecialchars($_POST['address']));
$post_code = trim(htmlspecialchars($_POST['post_code']));
$status = isset($_POST['status']) ? trim(htmlspecialchars($_POST['status'])) : 0;
$prestation = isset($_POST['prestation']) ? trim(htmlspecialchars($_POST['prestation'])) : "";
$dateRepair = trim(htmlspecialchars($_POST['date_repair']));

// Validation des champs
// fName
if (empty($fName)) {
    $error['fName'] = $errMsgRequire;
} elseif (strlen($fName) < 4 || strlen($fName) > 40) {
    $error['fName'] = "<span class='text-red-500'>Le prénom doit contenir entre 4 et 40 caractères</>";
}
// lName
if (empty($lName)) {
    $error['lName'] = $errMsgRequire;
} elseif (strlen($lName) < 4 || strlen($lName) > 40) {
    $error['lName'] = "<span class='text-red-500'>Le nom doit contenir entre 4 et 40 caractères</>";
}

// email
if (!empty($email)) {
    // verifie le bon format de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "<span class='text-red-500'>Email invalide</>";
    }
} else {
    $error['email'] = $errMsgRequire;
}

// car_name
// verifie que user a bien rempli le champs
if (empty($car_name)) {
    $error['car_name'] = $errMsgRequire;
} elseif (strlen($car_name) < 4 || strlen($car_name) > 40) {
    $error['car_name'] = "<span class='text-red-500'>Le nom doit contenir entre 4 et 40 caractères</>";
}

// lName
if (empty($city)) {
    $error['city'] = $errMsgRequire;
} elseif (strlen($city) < 2 || strlen($city) > 40) {
    $error['city'] = "<span class='text-red-500'>Le nom de la ville doit contenir entre 2 et 40 caractères</>";
}

// address
if (empty($address)) {
    $error['address'] = $errMsgRequire;
} elseif (strlen($address) < 10 || strlen($address) > 250) {
    $error['address'] = "<span class='text-red-500'>L'adresse' doit contenir entre 10 et 250 caractères</>";
}

// Code postal
// verifie que user a bien rempli le champs
if (!empty($post_code)) {
    // verifie que l'age est un nombre entier
    if (!is_numeric($post_code)) {
        $error['post_code'] =
            "<span class='text-red-500'>Merci de rentrer un code postal correct</span>";
        // verifie qu'il est majeur
    }
} else {
    $error['post_code'] = $errMsgRequire;
}

// prestation
if (empty($prestation)) {
    $error['prestation'] = "<span class='text-red-500'>Veuillez sélectionner une prestation</span>";
}

// status
// verifie que user a bien rempli le champs
if (!empty($status)) {
    // verifie que le statut est compris entre 0 et 1
    if (!is_numeric($status) || $status < 0 || $status > 1) {
        $error['status'] =
            "<span class='text-red-500'>Statut invalide</span>";
    }
} elseif (!isset($_POST['status'])) {
    $error['status'] = $errMsgRequire;
}

// date
if (empty($dateRepair)) {
    $error['date_repair'] = $errMsgRequire;
}