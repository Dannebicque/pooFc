<?php

class Coordonnee {
    private int $x;
    private int $y;

    public function __construct(int $x, int $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int {
        return $this->x;
    }

    public function getY(): int {
        return $this->y;
    }

    public function setX(int $x): void {
        $this->x = $x;
    }

    public function setY(int $y): void {
        $this->y = $y;
    }

    public function estAdjacente(Coordonnee $autre): bool {
        return abs($this->x - $autre->getX()) <= 1 && abs($this->y - $autre->getY()) <= 1;
    }

    public function __toString(): string {
        return '('.$this->x.', '.$this->y.')';
    }
}

