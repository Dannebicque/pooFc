<?php

abstract class Affichage {
    public static function afficherPlateau(Plateau $plateau): void {
        echo "<style>
                table { border-collapse: collapse; }
                td { width: 50px; height: 50px; text-align: center; border: 1px solid #000; }
              </style>";
        echo "<table>";
        for ($y = 0; $y < $plateau->getHauteur(); $y++) {
            echo "<tr>";
            for ($x = 0; $x < $plateau->getLargeur(); $x++) {
                $creature = $plateau->getCase(new Coordonnee($x, $y));
                echo "<td>";
                if ($creature) {
                    echo $creature->getNom();
                } else {
                    echo "&nbsp;";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

