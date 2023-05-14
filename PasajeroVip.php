<?php
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

        return $porcentaje;
    }
}
?>

<!--/* Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %. */