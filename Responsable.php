<?php
class Responsable
{
    // ATRIBUTOS
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    // CONSTRUCTOR
    public function __construct($numEmpleadoNuevo, $numLicenciaNuevo, $nombreNuevo, $apellidoNuevo)
    {
        $this->numEmpleado = $numEmpleadoNuevo;
        $this->numLicencia = $numLicenciaNuevo;
        $this->nombre = $nombreNuevo;
        $this->apellido = $apellidoNuevo;
    }

    // MODIFICADORES
    public function setNumEmpleado($numEmpleadoNuevo)
    {
        $this->numEmpleado = $numEmpleadoNuevo;
    }
    public function setNumLicencia($numLicenciaNuevo)
    {
        $this->numLicencia = $numLicenciaNuevo;
    }
    public function setNombre($nombreNuevo)
    {
        $this->nombre = $nombreNuevo;
    }
    public function setApellido($apellidoNuevo)
    {
        $this->apellido = $apellidoNuevo;
    }

    // OBSERVADORES
    public function getNumEmpleado()
    {
        return $this->numEmpleado;
    }
    public function getNumLicencia()
    {
        return $this->numLicencia;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }

    // PROPIAS DE TIPO
    public function __toString()
    {
        $responsable = "Número de empleado: " . $this->numEmpleado . "\n" .
            "Número de licencia: " . $this->numLicencia . "\n" .
            "Nombre: " . $this->nombre . "\n" .
            "apellido: " . $this->apellido . "\n";
        return $responsable;
    }
}
