<?php

abstract class Creature {
    protected string $nom;
    protected int $sante;
    protected int $force;
    protected int $defense;


    public function __construct(string $nom, int $sante, int $force, int $defense) {
        $this->nom = $nom;
        $this->sante = $sante;
        $this->force = $force;
        $this->defense = $defense;
    }

    public function attaquer(Creature $adversaire): void {
        $degats = max(0, $this->force - $adversaire->defense);
        $adversaire->recevoirDegats($degats);
        echo "<p>{$this->nom} attaque {$adversaire->nom} et inflige $degats points de dégâts !</p>";
    }

    public function recevoirDegats(int $degats): void {
        $this->sante -= $degats;
        echo "<p>{$this->nom} perd $degats points de santé. Santé restante : {$this->sante}.</p>";
    }

    public function estEnVie(): bool {
        return $this->sante > 0;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getSante(): string {
        return $this->sante;
    }

    abstract public function crier(): string;
}
