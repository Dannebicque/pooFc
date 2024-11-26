<?php

class Plateau {
    private int $largeur;
    private int $hauteur;
    private array $cases;

    public function __construct(int $largeur, int $hauteur) {
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
        $this->cases = array_fill(0, $hauteur, array_fill(0, $largeur, null));
    }

    public function placerCreature(Creature $creature, Coordonnee $position): void {
        if ($this->estCaseLibre($position)) {
            $this->cases[$position->getY()][$position->getX()] = $creature;
            $creature->setPosition($position);
        } else {
            echo "La case {$position} est occupée ou invalide.\n";
        }
    }

    public function estCaseLibre(Coordonnee $position): bool {
        return $this->cases[$position->getY()][$position->getX()] === null;
    }





    public function deplacerCreature(Creature $creature, Coordonnee $nouvellePosition): void {
        $anciennePosition = $creature->getPosition();
        if ($anciennePosition && $this->estCaseLibre($nouvellePosition)) {
            $this->cases[$anciennePosition->getY()][$anciennePosition->getX()] = null;
            $this->cases[$nouvellePosition->getY()][$nouvellePosition->getX()] = $creature;
            $creature->setPosition($nouvellePosition);
        } else {
            echo "Impossible de déplacer la créature vers {$nouvellePosition}.\n";
        }
    }

    public function retirerCreature(Creature $creature): void {
        $position = $creature->getPosition();
        if ($position) {
            $this->cases[$position->getY()][$position->getX()] = null;
            //$creature->setPosition(null);
        }
    }


    public function getCase(Coordonnee $position): ?Creature {
        return $this->cases[$position->getY()][$position->getX()] ?? null;
    }

    public function getLargeur(): int {
        return $this->largeur;
    }

    public function getHauteur(): int {
        return $this->hauteur;
    }

    public function sontAdjacentes(Creature $c1, Creature $c2): bool {
        $pos1 = $c1->getPosition();
        $pos2 = $c2->getPosition();

        if ($pos1 && $pos2) {
            $dx = abs($pos1->getX() - $pos2->getX());
            $dy = abs($pos1->getY() - $pos2->getY());
            return ($dx <= 1 && $dy <= 1) && ($dx + $dy > 0);
        }
        return false;
    }

    public function deplacerAleatoirement(Creature $creature): void {
        $directions = [
            new Coordonnee(0, 1),  // Bas
            new Coordonnee(0, -1), // Haut
            new Coordonnee(1, 0),  // Droite
            new Coordonnee(-1, 0)  // Gauche
        ];
        $anciennePosition = $creature->getPosition();
        if ($anciennePosition) {
            shuffle($directions);
            foreach ($directions as $direction) {
                $nouvellePosition = new Coordonnee(
                    $anciennePosition->getX() + $direction->getX(),
                    $anciennePosition->getY() + $direction->getY()
                );
                if ($this->estPositionValide($nouvellePosition) && $this->estCaseLibre($nouvellePosition)) {
                    $this->deplacerCreature($creature, $nouvellePosition);
                    break;
                }
            }
        }
    }

    private function estPositionValide(Coordonnee $position): bool {
        return $position->getX() >= 0 && $position->getX() < $this->largeur &&
            $position->getY() >= 0 && $position->getY() < $this->hauteur;
    }
}

