
<?php
include 'connexion_bd.php';
include 'fonction2.php';

?>

<?php

get_all_donates($bdd);

for ($i = 1; $i <= 2; $i++) {
    $score = get_value_corremation_donate($bdd, $i);
    echo $score;
    echo $i;
}


?>