<?php

class Viaje
{
    // ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros = [];
    private $responsable;

    // CONSTRUCTOR
    public function __construct($codigoNuevo, $destinoNuevo, $cantMax, $responsableNuevo)
    {
        $this->codigo = $codigoNuevo;
        $this->destino = $destinoNuevo;
        $this->cantMaxPasajeros = $cantMax;
        $this->responsable = $responsableNuevo;
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
    public function setPasajeros($arregloPasajeros)
    {
        $this->pasajeros = $arregloPasajeros;
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
        $viaje = "Código de viaje: " . $this->getCodigo() . "\n";
        $viaje = $viaje . "Destino de viaje: " . $this->getDestino() . "\n";
        $viaje = $viaje . "Cantidad máxima de pasajeros para este viaje: " . $this->getCantMaxPasajeros() . "\n";
        $viaje = $viaje . "Responsable para este viaje: " . "\n" . $this->getResponsable() . "\n";
        //$viaje = $viaje . "Información de los pasajeros del viaje: \n";
        //$viaje = $viaje . $this->pasajerosAString();

        return $viaje;
    }

    //public function pasajerosAString()
    //{
    //    $cadenaPasajeros = "";

    //   for ($i = 0; $i < count($this->getPasajeros()); $i++) {
    //       $documento = $this->getPasajeros()[$i]["numero de documento"];
    //       $nombre = $this->getPasajeros()[$i]["nombre"];
    //       $apellido = $this->getPasajeros()[$i]["apellido"];
    //       $cadenaPasajeros = $cadenaPasajeros . "Pasajero " . $i + 1 . ": [Documento: " . $documento . ", Nombre: " . $nombre . ", Apellido: " . $apellido . "]\n";
    //   }
    //   return $cadenaPasajeros;
    // }

    public function agregarPasajero($nuevoPasajero)
    {
        if (count($this->getPasajeros()) == $this->getCantMaxPasajeros()) {
            $exito = false;
        } else {
            if ($this->buscaPasajero($nuevoPasajero["numero de documento"]) != -1) {
                $exito = false;
            } else {
                $exito = true;
                array_push($this->pasajeros, $nuevoPasajero);
            }
        }
        return $exito;
    }

    public function quitarPasajeroPorDocumento($documentoQuitar)
    {
        $posPasajero = $this->buscaPasajero($documentoQuitar);

        if ($posPasajero == -1) {
            $puedeQuitar = false;
        } else {
            $puedeQuitar = true;
            unset($this->pasajeros[$posPasajero]);
            $this->pasajeros = array_values($this->pasajeros);
        }
        return $puedeQuitar;
    }

    public function modificarNombrePorDocumento($nroDocumento, $nombreNuevo)
    {
        $posPasajero = $this->buscaPasajero($nroDocumento);

        if ($posPasajero == -1) {
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $this->pasajeros[$posPasajero]["nombre"] = $nombreNuevo;
        }
        return $puedeModificar;
    }

    public function modificarApellidoPorDocumento($nroDocumento, $apellidoNuevo)
    {
        $posPasajero = $this->buscaPasajero($nroDocumento);

        if ($posPasajero == -1) {
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $this->pasajeros[$posPasajero]["apellido"] = $apellidoNuevo;
        }
        return $puedeModificar;
    }

    private function buscaPasajero($nroDocumento)
    {
        $existePasajero = false;
        $posPasajero = 0;

        while ($existePasajero == false && $posPasajero < count($this->getPasajeros())) {
            if ($nroDocumento == $this->getPasajeros()[$posPasajero]["numero de documento"]) {
                $existePasajero = true;
                $posPasajero--;
            }
            $posPasajero++;
        }
        if ($posPasajero == count($this->getPasajeros())) {
            $posPasajero = -1;
        }
        return $posPasajero;
    }
}
