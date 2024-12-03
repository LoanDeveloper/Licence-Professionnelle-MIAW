<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR');

$date = date("d-m-Y");
$heure = date("h-i");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>
        Nous sommes le <?= $date ?>, il est <?= $heure ?>
    </h2>
</body>
</html>