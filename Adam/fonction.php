


<?php

function get_all_donates($bdd)
{

    $poo = $bdd->prepare("SELECT * FROM tab_donneur");
    $result = $poo->execute();
    $result = $poo->fetchAll();
    foreach ($result as $row) {
        var_dump($row);
    }
}



function get_value_corremation_donate($bdd, $id_donate)
{
    //Create tab questionaire
    $tab_questionaire = array(
        'orientation_sexuelle' => 'hetero',
        'age' => '18',
        'origine' => 'france',
        'taille' => '180',
        'couleur_yeux' => 'bleu',
        'pilosité' => 'faible',
        'couleur_cheveux' => 'blond',
        'sport_semaine' => '0',
        'leadership' => '50',
        'manuel' => '35',
        'litterature' => '55',
        'pensee_analytique' => '32',
        'humour' => '68'
    );
    //push information in tab


    $poo = $bdd->prepare("SELECT * FROM tab_donneur WHERE id_donate = :id_donate");
    $poo->bindParam(':id_donate', $id_donate);
    $result = $poo->execute();
    $result = $poo->fetch();
    var_dump($result);








    $score = 0;


    #On affiche toutes les données que l'on récupère

}
