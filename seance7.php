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
<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

echo "<h2>=== Création des Créatures ===</h2>";
$guerrier = new Guerrier("Thor");
$mage = new Mage("Merlin");
$archer = new Archer("Robin");

echo $guerrier->crier() . "\n";
echo $mage->crier() . "\n";
echo $archer->crier() . "\n";

echo "<h2>=== Premier Combat ===</h2>";
$arene = new Arene();
$arene->lancerCombat($guerrier, $mage);

echo "<h2>=== Deuxième combat ===</h2>";
$guerrier2 = new Guerrier("Gimli");
$arene2 = new Arene();
$arene2->lancerCombat($guerrier2, $archer);

?>
</body>
</html>
