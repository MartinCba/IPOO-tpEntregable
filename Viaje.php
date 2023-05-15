<?php

include_once "Pasajero.php";
include_once "Responsable.php";

class Viaje
{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $responsable;
    private $pasajeros;

    public function __construct($codigoNuevo, $destinoNuevo, $cantMax, $responsableNuevo)
    {
        $this->codigo = $codigoNuevo;
        $this->destino = $destinoNuevo;
        $this->cantMaxPasajeros = $cantMax;
        $this->responsable = $responsableNuevo;
        $this->pasajeros = [];
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

    public function __toString()
    {
        return "\nCódigo de viaje: " . $this->getCodigo()
        . "\nDestino de viaje: " . $this->getDestino()
        . "\nCantidad máxima de pasajeros para este viaje: " . $this->getCantMaxPasajeros()
        . "\nResponsable para este viaje: " . "\n" . $this->getResponsable()
        . "\nInformación de los pasajeros del viaje: "
        . $this->mostrarPasajeros();

    }

    public function mostrarPasajeros()
    {
        $pasajeros = $this->getPasajeros();
        $texto = "\nNo se han cargado pasajeros ";
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

    public function asientoLibre()
    {
        $pasajeros = $this->getPasajeros();
        $asientos = $this->getCantMaxPasajeros();
        $asientoLibre = 1;
        $encontrado = false;
        $i = 0;

        while (!$encontrado && $i < $asientos) {
            $pasajero = $pasajeros[$i];
            if ($asientoLibre == $pasajero->getnumeroAsiento()) {
                $asientoLibre++;
            } else {
                $encontrado = true;
            }
            $i++;
        }
        if ($asientoLibre > $asientos) {
            $asientoLibre = -1;
        }
        return $asientoLibre;
    }

    public function asignarTicket()
    {
        $nuevoTicket = $this->asientoLibre() + 100;
        return $nuevoTicket;
    }

}
/*
Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.

Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario */
