<?php

class Concesionario {
    private $vehiculos = [];
    private $empleados = [];
    private $clientes = [];

    public function agregarVehiculo($vehiculo) {
        $this->vehiculos[] = $vehiculo;
    }

    public function agregarEmpleado($empleado) {
        $this->empleados[] = $empleado;
    }

    public function agregarCliente($cliente) {
        $this->clientes[] = $cliente;
    }

    public function getVehiculos() {
        return $this->vehiculos;
    }

    public function getEmpleados() {
        return $this->empleados;
    }

    public function getClientes() {
        return $this->clientes;
    }
}


// Usar require para incluir el otro codigo
require 'vehiculos.php';
require 'empleados.php'; 
require "clientes.php"; 

// Crear instancia de Concesionario
$concesionario = new Concesionario();

// Crear vehículos
$vehiculo1 = new Vehiculo("ABC123", 10000, 15000, "Rojo", "Toyota");
$vehiculo2 = new Vehiculo("DEF456", 5000, 20000, "Azul", "Honda");
$vehiculo3 = new Vehiculo("GHI789", 0, 30000, "Negro", "BMW");
$vehiculo4 = new Vehiculo("JKL012", 15000, 12000, "Blanco", "Ford");
$vehiculo5 = new Vehiculo("MNO345", 8000, 25000, "Gris", "Mercedes");

// Agregar vehículos al concesionario
$concesionario->agregarVehiculo($vehiculo1);
$concesionario->agregarVehiculo($vehiculo2);
$concesionario->agregarVehiculo($vehiculo3);
$concesionario->agregarVehiculo($vehiculo4);
$concesionario->agregarVehiculo($vehiculo5);

// Crear empleados
$empleado1 = new Empleado("Juan", 1, 30000, 5);
$empleado2 = new Empleado("Ana", 2, 32000, 3);
$empleado3 = new Empleado("Luis", 3, 28000, 4);

// Agregar empleados al concesionario
$concesionario->agregarEmpleado($empleado1);
$concesionario->agregarEmpleado($empleado2);
$concesionario->agregarEmpleado($empleado3);

// Crear clientes
$cliente1 = new Cliente("Carlos", "123456789", "987654321A");
$cliente2 = new Cliente("María", "987654321", "123456789B");
$cliente3 = new Cliente("Pedro", "555555555", "111222333C");

// Agregar clientes al concesionario
$concesionario->agregarCliente($cliente1);
$concesionario->agregarCliente($cliente2);
$concesionario->agregarCliente($cliente3);

// Ejemplo de uso de los métodos
$cliente1->agregarMatricula("ABC123");
$cliente1->agregarMatricula("DEF456");

echo "Matriculas del cliente1: " . implode(", ", $cliente1->getMatriculas()) . "\n";

$cliente1->devolver_vehiculo("DEF456");

echo "Matriculas del cliente1 después de devolver el vehículo: " . implode(", ", $cliente1->getMatriculas()) . "\n";

$empleado1->venta($vehiculo1->precio_final(2000));

echo "Recaudación del empleado1: " . $empleado1->getRecaudacion() . "\n";
echo "Sueldo del empleado1 después de la venta: " . $empleado1->getSueldo() . "\n";

?>