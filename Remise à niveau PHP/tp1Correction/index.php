<?php
    // Initialisation des variables
    setlocale(LC_TIME, "fr_FR");
    $time = date("H:i");
    $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::FULL,'Europe/Paris',IntlDateFormatter::GREGORIAN,'EEEE dd MMMM y');
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
    <h2>Aujourd'hui nous sommes le <?= $formatter->format(time()); ?>, il est <?= $time ?></h2>
</body>
</html>