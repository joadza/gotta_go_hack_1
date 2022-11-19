<?php
include 'connexion_bd.php';
include 'fonction2.php';

?>
<img class="fit-picture" src="media/1.jpg" alt="Grapefruit slice atop a pile of other slices">

<?php

get_all_donates($bdd);

for ($i = 1; $i <= 2; $i++) {
    $score = get_value_corremation_donate($bdd, $i);
    echo $score;
    echo $i;
}


?>