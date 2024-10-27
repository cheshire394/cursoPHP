<?php

class Empleado {
    private $nombre;
    private $id;
    private $sueldo;
    private $antiguedad;
    private $recaudacion;

    public function __construct($nombre, $id, $sueldo, $antiguedad) {
        $this->nombre = $nombre;
        $this->id = $id;
        $this->sueldo = $sueldo;
        $this->antiguedad = $antiguedad;
        $this->recaudacion = 0;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSueldo() {
        return $this->sueldo;
    }

    public function setSueldo($sueldo) {
        $this->sueldo = $sueldo;
    }

    public function getAntiguedad() {
        return $this->antiguedad;
    }

    public function setAntiguedad($antiguedad) {
        $this->antiguedad = $antiguedad;
    }

    public function getRecaudacion() {
        return $this->recaudacion;
    }

    public function venta($monto) {
        $this->recaudacion += $monto;
        $this->sueldo += $monto * 0.05;
    }
}



?>