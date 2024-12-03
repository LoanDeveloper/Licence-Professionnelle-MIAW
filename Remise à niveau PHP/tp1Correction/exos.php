<?php
    // Ex 1 - Les boucles
    define("NB_ITTERATION", 15);
        // Calcul
    $somme_pairs = 0;
    for($cc = 4; $cc<= 200; $cc++) :
        if($cc % 2 === 0) :
            $somme_pairs += $cc;
        endif;
    endfor;

    // Ex 2 - Cinéma
    include("./functions.php");

    // Ex 3 - Age des étudiants
    $ages_etudiants = array();
    for($i = 0; $i<10; $i++):
        array_push($ages_etudiants, mt_rand(18,40));
        // ou 
        // $age_etudiants[]=mt_rand(18,40);
    endfor;

    // Définition de l'age principal
    // pour le min et le max, on prend toujours le premier élément du tableau.
    $age_init = $ages_etudiants[0];
    $age_max = $age_init;
    $age_min = $age_init;
    foreach($ages_etudiants as $age) :
        if($age < $age_min):
            $age_min = $age;
        endif;
        if($age > $age_max):
            $age_max = $age;
        endif;
    endforeach;

    $i = 1;

    // Ex 4 - Calendrier
    include("./donnees.php");
    $mois_courant = intval(date('m'));
    $annee_courante = date('Y');
    foreach($jourMois as $annee=>$tab_mois) :
        if($annee == $annee_courante) :
            $count_mois = 1;
            foreach($tab_mois as $mois=>$nb_jours):
                if($count_mois == $mois_courant):
                    $mois_courant_string = $mois;
                    $nb_jours_courant = $nb_jours;
                endif;
                $count_mois++;
            endforeach;
        endif;
    endforeach;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercices</h1>
    <!--------------------Exercice 1----------->
    <h2>Les boucles</h2>
    <?php while($i <= NB_ITTERATION) : ?>
        <span><?= $i ?></span>
    <?php $i++;
    endwhile; ?>
    <p>-----------------------------</p>
    <?php for($i = 1; $i<=NB_ITTERATION; $i++) : ?>
        <span><?= $i ?></span>
    <?php endfor; ?>
    <p>-----------------------------</p>
    <p>Somme des nombres pairs entre 4 et 200 : <b><?= $somme_pairs ?></b></p>
    
    <hr/>
    <!--------------------Exercice 2----------->
    <h2>Cinéma</h2>
    <?= prixCinema(14,1,1) ?>
    <?= prixCinema(35,1,1) ?>
    <?= prixCinema(35,0,5) ?>

    <hr />
    <!--------------------Exercice 3----------->
    <h2>Âge des étudiants</h2>
    <ul>
        <?php foreach($ages_etudiants as $age) : ?>
            <li><?= $age ?></li>
        <?php endforeach; ?>
        <p>Age min : <b><?= $age_min ?></b> et âge max : <b><?= $age_max ?></b>
    </ul>

    <hr />
    <!--------------------Exercice 4----------->
    <h2>Calendrier</h2>
    <?php foreach($jourMois as $annee=>$detailAnnee): ?>
        <p><?= $annee ?></p>
        <?php $total_jours = 0; ?>
        <?php foreach($detailAnnee as $mois=>$nb_jour) : ?>  
            <p>Le mois de <?= $mois ?> contient <?= $nb_jour ?> jours.</p>
            <?php $total_jours += $nb_jour ?>
        <?php endforeach; ?>
        <p>L'année contient <?= $total_jours ?> jours.</p>
    <?php endforeach; ?>
    <p>Nous sommes au mois de <?= $mois_courant_string ?> qui contient <?= $nb_jours_courant ?> jours.</p>
    
    <hr />
    <!-------------------- Exercice 5 ------------->
    <h2>Choix de pays</h2>
    <?= affichePays("France") ?>
</body>
</html>
