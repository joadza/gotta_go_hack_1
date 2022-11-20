
<?php include 'connexion_bd.php';
include 'fonction2.php';

?>

<?php

for ($i = 1; $i < 120; $i++) {
    try {
        $poo = $bdd->prepare("SELECT * FROM tab_donneur WHERE `id_donneur` = " . $i);
        var_dump($poo);
        $poo->execute();

        $result = $poo->fetchAll();
        var_dump($result);
        $leadership = $result[0]['leadership'];
        $manual = $result[0]['manual'];
        $literary = $result[0]['literary'];
        $analytical_thinking = $result[0]['analytical_thinking'];
        $wittiness = $result[0]['wittiness'];

        $poo = $bdd->prepare("INSERT INTO tab_graphe_giver (`id`, `id_giver`, `leadership`, `manual`, `literary`, `analytical_thinking`, `wittiness`) VALUES (NULL," . $result[0]['id_donneur'] . "," . $leadership . "," . $manual . "," . $literary . "," . $analytical_thinking . "," . $wittiness . ")");
        var_dump($poo);
        $poo->execute();
    } catch (Exception $e) {
        echo $e;
    }
}


?>