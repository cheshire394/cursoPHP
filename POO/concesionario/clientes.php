<?php

class Cliente {
    private $nombre;
    private $telefono;
    private $dni;
    private $matriculas;

    public function __construct($nombre, $telefono, $dni) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->matriculas = [];
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getMatriculas() {
        return $this->matriculas;
    }

    public function agregarMatricula($matricula) {
        $this->matriculas[] = $matricula;
    }

    public function devolver_vehiculo($matricula) {
        $index = array_search($matricula, $this->matriculas);
        if ($index !== false) {
            unset($this->matriculas[$index]);
            $this->matriculas = array_values($this->matriculas); // reindexar el array
        }
    }
}



?>