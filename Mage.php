<?php

class Mage extends Creature {
    public function __construct(string $nom) {
        parent::__construct($nom, 100, 30, 5);
    }

    public function attaquer(Creature $adversaire): void {
        $degats = max(0, $this->force + 10 - $adversaire->defense); // Bonus magique
        $adversaire->recevoirDegats($degats);
        echo "<p>{$this->nom} lance un sort sur {$adversaire->nom} et inflige $degats points de dégâts magiques !</p>";
    }

    public function crier(): string {
        return "<p>Abracadabra !</p>";
    }
}

