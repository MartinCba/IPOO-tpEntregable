<?php

include_once "Pasajero.php";
include_once "PasajeroVip.php";
include_once "PasajeroEspecial.php";
include_once "Responsable.php";

class Viaje
{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $responsable;
    private $pasajeros;
    private $costoViaje;
    private $sumaTotalCostoPasajero;

    public function __construct($codigoNuevo, $destinoNuevo, $cantMax, $responsableNuevo, $costoViaje)
    {
        $this->codigo = $codigoNuevo;
        $this->destino = $destinoNuevo;
        $this->cantMaxPasajeros = $cantMax;
        $this->responsable = $responsableNuevo;
        $this->pasajeros = [];
        $this->costoViaje = $costoViaje;
        $this->sumaTotalCostoPasajero = 0;
    }

    public function setCodigo($codigoNuevo)
    {
        $this->codigo = $codigoNuevo;
    }
    public function setDestino($destinoNuevo)
    {
        $this->destino = $destinoNuevo;
    }
    public function setCantMaxPasajeros($cantMaxima)
    {
        $this->cantMaxPasajeros = $cantMaxima;
    }
    public function setResponsable($responsableNuevo)
    {
        $this->responsable = $responsableNuevo;
    }
    public function setPasajeros($pasajerosNuevos)
    {
        $this->pasajeros = $pasajerosNuevos;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }
    public function getResponsable()
    {
        return $this->responsable;
    }
    public function getPasajeros()
    {
        return $this->pasajeros;
    }
    public function getCostoViaje()
    {
        return $this->costoViaje;
    }

    public function setCostoViaje($costoViaje): self
    {
        $this->costoViaje = $costoViaje;

        return $this;
    }

    public function getSumaTotalCostoPasajero()
    {
        return $this->sumaTotalCostoPasajero;
    }

    public function setSumaTotalCostoPasajero($sumaTotalCostoPasajero): self
    {
        $this->sumaTotalCostoPasajero = $sumaTotalCostoPasajero;

        return $this;
    }

    public function __toString()
    {
        return "\nCódigo de viaje: " . $this->getCodigo()
        . "\nDestino de viaje: " . $this->getDestino()
        . "\nCantidad máxima de pasajeros para este viaje: " . $this->getCantMaxPasajeros()
        . "\nCosto del viaje por pasajero: $" . $this->getCostoViaje()
        . "\nCosto total de todos los pasajeros: $" . $this->getSumaTotalCostoPasajero()
        . "\nResponsable para este viaje: " . "\n" . $this->getResponsable()
        . "\nInformación de los pasajeros del viaje: "
        . $this->mostrarPasajeros();

    }

    public function mostrarPasajeros()
    {
        $pasajeros = $this->getPasajeros();
        $texto = "";
        $cantidad = count($pasajeros);
        for ($i = 0; $i < $cantidad; $i++) {
            $texto = $texto . "\n" . $pasajeros[$i];
        }
        return $texto;
    }

    public function agregarPasajero($nuevoPasajero)
    {
        $listaPasajeros = $this->getPasajeros();
        if (count($this->getPasajeros()) >= $this->getCantMaxPasajeros()) {
            $agregado = false;
        } else {
            array_push($listaPasajeros, $nuevoPasajero);
            $this->setPasajeros($listaPasajeros);
            $agregado = true;
        }
        return $agregado;
    }

    public function quitarPasajeroPorAsiento($asientoAQuitar)
    {
        $exito = false;
        $pasajeros = $this->getPasajeros();
        $cantidad = count($pasajeros);
        for ($i = 0; $i < $cantidad; $i++) {
            $pasajero = $pasajeros[$i];
            $asiento = $pasajero->getNumeroAsiento();
            if ($asiento == $asientoAQuitar) {
                $exito = true;
                unset($pasajeros[$i]);
                $this->setPasajeros($pasajeros);
            }
        }
        return $exito;
    }

    public function modificarNombrePorAsiento($nroAsiento, $nombreNuevo)
    {
        $exito = false;
        $pasajeros = $this->getPasajeros();
        $cantidad = count($pasajeros);
        for ($i = 0; $i < $cantidad; $i++) {
            $pasajero = $pasajeros[$i];
            $asiento = $pasajero->getNumeroAsiento();
            if ($asiento == $nroAsiento) {
                $exito = true;
                $pasajeros[$i]->setNombre($nombreNuevo);
                $this->setPasajeros($pasajeros);
            }
        }
        return $exito;
    }

    public function venderPasaje($objPasajero)
    {
        $precio = 0;
        if ($this->hayPasajesDisponibles()) {
            $porcentajeIncremento = $objPasajero->darPorcentajeIncremento();
            $costo = $this->getCostoViaje();
            $porcentajeDecimal = $porcentajeIncremento / 100;
            $porcentajeValor = $porcentajeDecimal * $costo;
            $precio = $porcentajeValor + $costo;
            $sumaCostos = $this->getSumaTotalCostoPasajero();
            $sumaCostos = $sumaCostos + $precio;
            $this->setSumaTotalCostoPasajero($sumaCostos);
            $this->agregarPasajero($objPasajero);
        }
        return $precio;
    }

    public function hayPasajesDisponibles()
    {
        $hayPasajes = false;
        $cantidadPasajeros = count($this->getPasajeros());
        if ($cantidadPasajeros < $this->getCantMaxPasajeros()) {
            $hayPasajes = true;
        }
        return $hayPasajes;
    }
}
