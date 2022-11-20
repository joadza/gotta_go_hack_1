<?php
include 'connexion_bd.php';
include 'fonction2.php';

?>
<img class="fit-picture" src="media/1.jpg" alt="Grapefruit slice atop a pile of other slices">

<?php

$result = get_all_donates($bdd);

foreach ($result as $row) {
    var_dump($row);
}


?>