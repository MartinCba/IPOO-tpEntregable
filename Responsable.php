<?php
class Responsable
{
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numEmpleadoNuevo, $numLicenciaNuevo, $nombreNuevo, $apellidoNuevo)
    {
        $this->numEmpleado = $numEmpleadoNuevo;
        $this->numLicencia = $numLicenciaNuevo;
        $this->nombre = $nombreNuevo;
        $this->apellido = $apellidoNuevo;
    }

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

    public function __toString()
    {
        $responsable = "\nNúmero de empleado: " . $this->numEmpleado .
        "\nNúmero de licencia: " . $this->numLicencia .
        "\nNombre: " . $this->nombre .
        "\nApellido: " . $this->apellido;
        return $responsable;
    }
}
