<?php
// Définition des constantes de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'expense');
define('DB_USER', 'expense-user');
define('DB_PASS', 'expense-password');

define('REGEX_NAME', '/^[a-zA-ZÀ-ÖØ-öø-ÿ\' -]+$/');
define('REGEX_WEIGHT', '/^[0-9]+$/');