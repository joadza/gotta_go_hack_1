<?php include 'connexion_bd.php';
include 'fonction2.php';

?>

<?php


send_hard_questonary_value($bdd, $_SESSION['user']['id_receveur'], rand() % 100, rand() % 100, rand() % 100, rand() % 100, rand() % 100);
#header('Location: index.html.php');
