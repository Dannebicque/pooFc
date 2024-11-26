<?php

class Arene {
    public function lancerCombat(Creature $c1, Creature $c2): Creature {
        echo "Début du combat entre {$c1->getNom()} et {$c2->getNom()} !\n";

        while ($c1->estEnVie() && $c2->estEnVie()) {
            $c1->attaquer($c2);
            if ($c2->estEnVie()) {
                $c2->attaquer($c1);
            }
        }

        $gagnant = $c1->estEnVie() ? $c1 : $c2;
        $perdant = $c1->estEnVie() ? $c2 : $c1;
        echo "<p>Le combat est terminé ! Le gagnant est : {$gagnant->getNom()}.</p>";

        return $perdant;
    }
}

