<?php
/**
 * @param int $age
 * @param int $reduction
 * @param int $jour
 * @return int
 */
function prixCinema($age, $reduction, $jour){
    $prix = 0;
    if ($age <= 14){
        $prix = 4;
    }else if($age < 18){
        $prix = 5;
    }else{
        if ($reduction == false){
            if ($jour == 1){
                $prix = 6;
            }else{
                $prix = 8;
            }
        }else{  //réduction true
            if ($jour == 1){
                $prix = 6;
            }else{
                $prix = 7;
            }
        }
    }
    return $prix;
}

function affichePays($nomPays = ''){
    global $citizenships;
    $option = '<select name="" id="">';

    foreach ($citizenships as $code => $array){

        $option .= "<option value='". $array['pays'] . " : " . $array['nationalite'] ." '>".$code."</option>";

    }
    $option .= "</select>";
    return $option;
}

?>
