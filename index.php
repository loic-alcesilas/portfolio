
<?php
session_start();
require 'Config/routeur.php';


$routeur = new OpenClassrooms\Portfolio\Routeur\Routeur();
$routeur->routerRequete();

?>