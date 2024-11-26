<?php

class Archer extends Creature {
    public function __construct(string $nom) {
        parent::__construct($nom, 120, 15, 8);
    }

    public function esquiver(): bool {
        $pourcentage = rand(1, 100); // 30% de chances d'esquiver
        if ($pourcentage <= 30) {
            echo "<p>{$this->nom} esquive l'attaque !</p>";
            $chance = true;
        } else {
            $chance = false; //pas d'esquive
        }

        return $chance;
    }

    public function recevoirDegats(int $degats): void {
        if (!$this->esquiver()) {
            parent::recevoirDegats($degats);
        }
    }

    public function crier(): string {
        return "<p>Prêt à viser !</p>";
    }
}

