<?php
include "fonctions.php";
include "donnees.php";

$j = 1;
$sommeNombre = 0;

define("MAX_ITERATE", 20);

//tests ex2
$test1 = prixCinema(14,1,1);
$test2 = prixCinema(35,1,1);
$test3 = prixCinema(35,0,5);

$ageEtudiants = array();
for ($i=0; $i<10; $i++){
    $ageEtudiants[$i] = rand(18,40);
}

$ageMin= 40;
foreach ($ageEtudiants as $value){
    if ($ageMin > $value){
        $ageMin = $value;
    }
}

$ageMax = 0;
foreach ($ageEtudiants as $value){
    if ($ageMax < $value){
        $ageMax = $value;
    }
}

$ageMoyen = 0;
foreach ($ageEtudiants as $value){
    $ageMoyen += $value;
}
$ageMoyen = $ageMoyen / count($ageEtudiants);

$sommeJours = 0;

$initial = array();
$count = 0;
foreach ($citizenships as $pays => $array) {
    $initial[$count] = $pays;
    $count++;
}

    ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exercices</title>
</head>
<body>
    <h1>Exercices</h1>
    <h2>Les boucles</h2>
    <?php while($j <= MAX_ITERATE):?>

    <?= $j;?>
    <?php $j++?>
    <?php endwhile?>

    <?php for($i=1; $i<=MAX_ITERATE; $i++) :?>
        <?= $i ?>
    <?php endfor ;?>

    <p>Sommes de nb pairs : </p>
    <?php for($nombre=4; $nombre <= 200; $nombre++):?>
        <?php if($nombre % 2 == 0):?>
        <?php $sommeNombre += $nombre;?>
        <?php endif?>
    <?php endfor;?>
    <?= $sommeNombre?>

    <h2>Prix du cinéma</h2>
    <?= $test1?>
    <?= $test2?>
    <?= $test3?>

    <h2>Ages des étudiants : </h2>
    <?php foreach ($ageEtudiants as $value):?>
        <?= $value?>
    <?php endforeach;?>
    <p>ageMin : <?= $ageMin?></p>
    <p>ageMax : <?= $ageMax?></p>
    <p>ageMoyen : <?= $ageMoyen?></p>

    <h2>Calendrier</h2>
    <?php foreach ($jourMois as $key => $value): ?>
        <p><?= $key?></p>
        <?php foreach ($value as $mois => $jour):?>
            <p>Le mois de <?= $mois?> contient <?= $jour?> jours</p>
            <?php $sommeJours += $jour?>
        <?php endforeach ?>
        <p>L'année contient <?= $sommeJours?> jours</p>
        <?php $sommeJours = 0?>
    <?php endforeach;?>

    <h2>Choix de pays</h2>
    <?= affichePays()?>
    </body>
</html>
