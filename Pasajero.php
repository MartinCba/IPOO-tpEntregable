<?php

class Pasajero
{
    // ATRIBUTOS
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;

    // CONSTRUCTOR
    public function __construct($nombreNuevo, $apellidoNuevo, $numDocumentoNuevo, $telefonoNuevo)
    {
        $this->nombre = $nombreNuevo;
        $this->apellido = $apellidoNuevo;
        $this->numDocumento = $numDocumentoNuevo;
        $this->telefono = $telefonoNuevo;
    }

    // MODIFICADORES
    public function setNombre($nombreNuevo)
    {
        $this->nombre = $nombreNuevo;
    }
    public function setApellido($apellidoNuevo)
    {
        $this->apellido = $apellidoNuevo;
    }
    public function setNumDocumento($numDocumentoNuevo)
    {
        $this->numDocumento = $numDocumentoNuevo;
    }
    public function setTelefono($telefonoNuevo)
    {
        $this->telefono = $telefonoNuevo;
    }

    // OBSERVADORES
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return  $this->apellido;
    }
    public function getNumDocumento()
    {
        return $this->numDocumento;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    // PROPIAS DE TIPO
    public function __toString()
    {
        $persona = "Nombre: " . $this->nombre . "\n" .
            "Apellido: " . $this->apellido . "\n" .
            "Número de documento: " . $this->numDocumento . "\n" .
            "Teléfono: " . $this->telefono . "\n";
        return $persona;
    }
}
