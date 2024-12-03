<?php

/**
 * Calcul du prix du cinéma
 * On pourrait également typer directement les paramètres de la fonction.
 * @param int $age
 * @param boolean $isReduce
 * @param int $day
 * @return $prix
 */
function prixCinema($age, $isReduce, $day) {
    /**
     * Initialisation du prix le plus élevé pour le calcul final
     */
    $prix = 8;

    if($age <= 14) :
        $prix_age = 4;
    elseif ($age < 18) :
        $prix_age = 5;
    elseif($day === 1) :
        $prix_day = 6;
    elseif($isReduce) :
        $prix_age = 7;
    endif;

    // Retour du prix final
    return $prix;
}

/**
 * Création du formulaire des pays
 * @param array $citizenships
 * @return $txt
 */
function affichePays($paysChoisi) {
    // on utilise global pour récupérer une variable non définie dans la fonction mais définie en dehors.
    global $citizenships
    // on utilise Herodoc pour créer la chaine. EOS pour End Of String mais on pourrait mettre ce que l'on veut.
    $txt = <<<EOS
<form method="post">
<select name="pays">
EOS;
    $inc = 0;
    $color = "rouge";
    foreach($citizenships as $citizen=>$infos):
        $nationalite = $infos['nationalite'];
        $pays = $infos["pays"];
        $txt .= <<<EOS
<option class="$color" value="$citizen : $nationalite"
EOS;
        if($pays == $paysChoisi) :
            $txt .= " selected";
        endif;
        $txt .= <<<EOS
>$pays</option>
EOS;
        $inc++;
        $color = colorPrev($color);
    endforeach;
    $txt .= <<<EOS
</select>
</form>
EOS;
    return $txt;
}

function colorPrev($color) {
    // le changement de classe pour option n'est pas très utile car difficielement applicable en css mais l'algo est intéressant.
    if($color == "rouge" ) :
        $color = "vert";
    elseif( $color == "vert"): 
        $color = "bleu";
    else:
        $color = "rouge";
    endif;

    return $color;
}

?>
