<?php

include_once("Pasajero.php");
include_once("Responsable.php");

class Viaje
{
    // ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $responsable;
    private $pasajeros;

    // CONSTRUCTOR
    public function __construct($codigoNuevo, $destinoNuevo, $cantMax, $responsableNuevo)
    {
        $this->codigo = $codigoNuevo;
        $this->destino = $destinoNuevo;
        $this->cantMaxPasajeros = $cantMax;
        $this->responsable = $responsableNuevo;
        $this->pasajeros = [];
    }

    // MODIFICADORES
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

    // OBSERVADORES
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

    // PROPIAS DE TIPO

    public function __toString()
    {
        $viaje = "Código de viaje: " . $this->getCodigo() . "\n"
            . "Destino de viaje: " . $this->getDestino() . "\n"
            . "Cantidad máxima de pasajeros para este viaje: " . $this->getCantMaxPasajeros() . "\n"
            . "Responsable para este viaje: " . "\n" . $this->getResponsable() . "\n"
            . "Información de los pasajeros del viaje: \n"
            . $this->mostrarPasajeros();

        return $viaje;
    }

    public function mostrarPasajeros()
    {
        $pasajeros = $this->getPasajeros();
        $texto = "No se han cargado pasajeros .\n";
        $cantidad = count($pasajeros);
        for ($i = 0; $i < $cantidad; $i++) {
            $texto = $texto . $pasajeros[$i];
        }
        return $texto;
    }

    public function agregarPasajero($nuevoPasajero)
    {
        $pasajeroNuevo = [];
        if (count($this->getPasajeros()) == $this->getCantMaxPasajeros()) {
            $agregado = false;
        } else {
            if ($this->buscaPasajero($nuevoPasajero->getDocumento()) != -1) {
                $agregado = false;
            } else {
                $agregado = true;
                $pasajeroNuevo = $this->getPasajeros();
                array_push($pasajeroNuevo, $nuevoPasajero);
                $this->setPasajeros($pasajeroNuevo);
            }
        }
        return $agregado;
    }

    public function quitarPasajeroPorDocumento($documentoAQuitar)
    {
        $posicionPasajero = $this->buscaPasajero($documentoAQuitar);

        if ($posicionPasajero == -1) {
            $puedeQuitar = false;
        } else {
            $puedeQuitar = true;
            $pasajeros = $this->getPasajeros();
            unset($pasajeros[$posicionPasajero]);
            $this->setPasajeros($pasajeros);
        }
        return $puedeQuitar;
    }

    public function modificarNombrePorDocumento($nroDocumento, $nombreNuevo)
    {
        $posicionPasajero = $this->buscaPasajero($nroDocumento);

        if ($posicionPasajero == -1) {
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $pasajeros = $this->getPasajeros();
            $pasajeros[$posicionPasajero]->setNombre();
            $this->setPasajeros($pasajeros);
        }
        return $puedeModificar;
    }

    public function modificarApellidoPorDocumento($nroDocumento, $apellidoNuevo)
    {
        $posicionPasajero = $this->buscaPasajero($nroDocumento);

        if ($posicionPasajero == -1) {
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $pasajeros = $this->getPasajeros();
            $pasajeros[$posicionPasajero]->setApellido();
            $this->setPasajeros($pasajeros);
        }
        return $puedeModificar;
    }

    private function buscaPasajero($nroDocumento)
    {
        $existePasajero = false;
        $posicionPasajero = 0;

        while ($existePasajero == false && $posicionPasajero < count($this->getPasajeros())) {
            $documentoPasajero = ($this->getPasajeros()[$posicionPasajero])->getDocumento();

            if ($nroDocumento == $documentoPasajero){
                $existePasajero = true;
                $posicionPasajero--;
            }
            $posicionPasajero++;
        }
        if ($posicionPasajero == count($this->getPasajeros())) {
            $posicionPasajero = -1;
        }
        return $posicionPasajero;
    }

    public function existePasajero($documento){
        $existe = false;
        if($this->buscaPasajero($documento) != -1){
            $existe = true;
        }
        return $existe;
    }
}
