<?php

use Pasajero;

class PasajeroVip extends Pasajero
{
    private $numeroViajeroFrecuente;
    private $cantidadMillasPasajero;

    public function __construct($nombre, $numeroAsiento, $numeroTicket, $numeroViajeroFrecuente, $cantidadMillasPasajero)
    {
        parent::__construct($nombre, $numeroAsiento, $numeroTicket);
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
        $this->cantidadMillasPasajero = $cantidadMillasPasajero;
    }

    public function getNumeroViajeroFrecuente()
    {
        return $this->numeroViajeroFrecuente;
    }

    public function setNumeroViajeroFrecuente($numeroViajeroFrecuente): self
    {
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;

        return $this;
    }

    public function getCantidadMillasPasajero()
    {
        return $this->cantidadMillasPasajero;
    }

    public function setCantidadMillasPasajero($cantidadMillasPasajero): self
    {
        $this->cantidadMillasPasajero = $cantidadMillasPasajero;

        return $this;
    }

    public function __toString()
    {
        return parent::__toString()
        . "\nNúmero de viajero frecuente: " . $this->getNumeroViajeroFrecuente()
        . "\nCantidad de millas de pasajero: " . $this->getCantidadMillasPasajero();
    }

    public function darPorcentajeIncremento()
    {
        $porcentaje = parent::darPorcentajeIncremento();
        $porcentaje += 25;
        if ($this->getCantidadMillasPasajero() > 300) {
            $porcentaje = 30;
        }

        return $porcentaje;
    }
}
?>

<!--/*  Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%.  */
