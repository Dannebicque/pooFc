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

echo "<h2>=== Placement sur le plateau ===</h2>";
$plateau = new Plateau(5, 5);
$plateau->placerCreature($guerrier, new Coordonnee(1, 1));
$plateau->placerCreature($mage, new Coordonnee(3, 1));
Affichage::afficherPlateau($plateau);

echo "<h2>=== Déplacement du guérrier sur le plateau ===</h2>";
$plateau->deplacerCreature($guerrier, new Coordonnee(2, 1));
Affichage::afficherPlateau($plateau);

echo "<h2>=== Premier Combat ===</h2>";
$arene = new Arene();
$perdant = $arene->lancerCombat($guerrier, $mage);
$plateau->retirerCreature($perdant);
Affichage::afficherPlateau($plateau);
//echo "<h2>=== Deuxième combat ===</h2>";
//$guerrier2 = new Guerrier("Gimli");
//$arene2 = new Arene();
//$arene2->lancerCombat($guerrier2, $archer);

?>
</body>
</html>
