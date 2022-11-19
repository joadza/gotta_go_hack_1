<?php


function get_all_donates($bdd)
{

    $poo = $bdd->prepare("SELECT * FROM tab_donneur");
    $result = $poo->execute();
    $result = $poo->fetchAll();
    return $result;
}


function get_image($bdd, $id)
{
    $poo = $bdd->prepare("SELECT photo_profil FROM tab_donneur WHERE id = " + $id);
    $result = $poo->execute();
    $result = $poo->fetch();
    return $result;
}

function get_value_correlation_donate($bdd, $id_donate)
{
    $nb;
    $score = 0;
    //Create tab questionaire
    $tab_questionaire = array(
        'sexual_orientation' => 'Hetero',
        'age' => '18',
        'origine' => 'France',
        'height' => '180',
        'color_eyes' => 'Blue',
        'hairiness' => 'Low',
        'hair_color' => 'Blond',
        'sport_week' => '0',
        'leadership' => '50',
        'manual' => '35',
        'literature' => '55',
        'analytical_thinking' => '32',
        'wittiness' => '68',
    );
    //push information in tab
    $poo = $bdd->prepare("SELECT * FROM tab_donneur WHERE `id_donneur` = " . $id_donate);

    $result = $poo->execute();
    $result = $poo->fetch();

    foreach ($result as $row => $value) {

        switch ($row) {

            case 'sexual_orientation':
                if ($value == $tab_questionaire['sexual_orientation']) {
                    $score += 40;
                }
                break;
            case 'age':
                if ($value == $tab_questionaire['age']) {
                    $max_score_temp = 115;
                    $score_temp_absolu = abs($value - $tab_questionaire['age']);
                    if ($score_temp_absolu <= 5) {
                        $score += $max_score_temp;
                    } else if ($score_temp_absolu <= 10) {
                        $score += $max_score_temp - 30;
                    } else if ($score_temp_absolu <= 15) {
                        $score += $max_score_temp - 50;
                    } else if ($score_temp_absolu <= 20) {
                        $score += $max_score_temp - 75;
                    } else if ($score_temp_absolu <= 25) {
                        $score += $max_score_temp - 85;
                    }
                }
                break;
            case 'origine':
                if ($value == $tab_questionaire['origine']) {
                    $score += 75;
                }
                break;
            case 'height':
                if ($value == $tab_questionaire['height']) {
                    $score += 100;
                }
                break;
            case 'color_eyes':
                if ($value == $tab_questionaire['color_eyes']) {
                    $score += 60;
                }
                break;
            case 'hairiness':
                if ($value == $tab_questionaire['hairiness']) {
                    $score += 40;
                }
                break;
            case 'hair_color':
                if ($value == $tab_questionaire['hair_color']) {
                    $score += 15;
                }
                break;
            case 'sport_week':
                $nb = abs($value - $tab_questionaire['sport_week']);
                $score_temp = 55;
                while ($nb > 0) {
                    $score_temp /= 2;
                    $nb--;
                }
                $score += $score_temp;
                break;
            case 'leadership':
                $score += 100  - abs($value - $tab_questionaire['leadership']);
                break;
            case 'manual':
                $score += 100 - (abs($value - $tab_questionaire['manual']));
                break;
            case 'literature':
                $score += 100 - (abs($value - $tab_questionaire['literature']));
                break;
            case 'analytical_thinking':
                $score += 100 - (abs($value - $tab_questionaire['analytical_thinking']));

                break;
            case 'wittiness':

                $score += 100 - (abs($value - $tab_questionaire['wittiness']));

                break;
        }
    }



    return $score / 10;


    #On affiche toutes les données que l'on récupère

}
