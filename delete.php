<?php
// on démarre la session
session_start();
// Connexion avec pdo
require_once 'models/database.php';
include_once 'models/model.php';

include_once 'helpers/functions.php';

delete('garage');