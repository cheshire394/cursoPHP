<?php

class Vehiculo {
    private $matricula;
    private $km;
    private $precioBase;
    private $color;
    private $marca;

    public function __construct($matricula, $km, $precioBase, $color, $marca) {
        $this->matricula = $matricula;
        $this->km = $km;
        $this->precioBase = $precioBase;
        $this->color = $color;
        $this->marca = $marca;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getKm() {
        return $this->km;
    }

    public function setKm($km) {
        $this->km = $km;
    }

    public function getPrecioBase() {
        return $this->precioBase;
    }

    public function setPrecioBase($precioBase) {
        $this->precioBase = $precioBase;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function precio_final($extras) {
        return $this->precioBase + $extras;
    }
}




?>