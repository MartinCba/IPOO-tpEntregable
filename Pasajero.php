<?php

class Pasajero
{
    private $nombre;
    private $numeroAsiento;
    private $numeroTicket;

    public function __construct($nombre, $numeroAsiento, $numeroTicket)
    {
        $this->nombre = $nombre;
        $this->numeroAsiento = $numeroAsiento;
        $this->numeroTicket = $numeroTicket;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNumeroAsiento()
    {
        return $this->numeroAsiento;
    }

    public function setNumeroAsiento($numeroAsiento): self
    {
        $this->numeroAsiento = $numeroAsiento;

        return $this;
    }

    public function getNumeroTicket()
    {
        return $this->numeroTicket;
    }

    public function setNumeroTicket($numeroTicket): self
    {
        $this->numeroTicket = $numeroTicket;

        return $this;
    }

    public function __toString()
    {
        return "\nNombre: " . $this->getNombre()
        . "\nNúmero de asiento: " . $this->getNumeroAsiento()
        . "\nNúmero de ticket: " . $this->getNumeroTicket();
    }
}


