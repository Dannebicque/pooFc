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
$plateau->placerCreature($archer, new Coordonnee(4, 4));

Affichage::afficherPlateau($plateau);

//echo "<h2>=== Déplacement du guérrier sur le plateau ===</h2>";
//$plateau->deplacerCreature($guerrier, new Coordonnee(2, 1));
//Affichage::afficherPlateau($plateau);
//
//echo "<h2>=== Vérification des créatures adjacentes et lancement du combat ===</h2>";
//if ($plateau->sontAdjacentes($guerrier, $mage)) {
//    echo "<h2>=== Combat entre {$guerrier->getNom()} et {$mage->getNom()} ===</h2>";
//    $arene = new Arene();
//    $perdant = $arene->lancerCombat($guerrier, $mage);
//    $plateau->retirerCreature($perdant);
//    Affichage::afficherPlateau($plateau);
//} else {
//    echo "<p>Les créatures ne sont pas adjacentes, pas de combat.</p>";
//}

$creatures = [$guerrier, $mage, $archer];

while (count($creatures) > 1) {
    echo "<h2>=== Déplacement aléatoire des créatures ===</h2>";
    foreach ($creatures as $creature) {
        $plateau->deplacerAleatoirement($creature);
    }
    Affichage::afficherPlateau($plateau);

    echo "<h2>=== Vérification des créatures adjacentes et lancement des combats ===</h2>";
    for ($i = 0; $i < count($creatures); $i++) {
        for ($j = $i + 1; $j < count($creatures); $j++) {
            if ($plateau->sontAdjacentes($creatures[$i], $creatures[$j])) {
                echo "<h2>=== Combat entre {$creatures[$i]->getNom()} et {$creatures[$j]->getNom()} ===</h2>";
                $arene = new Arene();
                $perdant = $arene->lancerCombat($creatures[$i], $creatures[$j]);
                $plateau->retirerCreature($perdant);
                $creatures = array_filter($creatures, fn($c) => $c !== $perdant);
                Affichage::afficherPlateau($plateau);
                break 2; // Sortir des deux boucles
            }
        }
    }
}
?>
</body>
</html>
