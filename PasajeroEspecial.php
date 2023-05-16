<?php


class PasajeroEspecial extends Pasajero
{
    private $requiereSillaDeRuedas;
    private $requiereAsistencia;
    private $requiereAlimentacionEspecial;

    public function __construct($nombre, $numeroAsiento, $numeroTicket, $requiereSillaDeRuedas, $requiereAsistencia, $requiereAlimentacionEspecial)
    {
        parent::__construct($nombre, $numeroAsiento, $numeroTicket);
        $this->requiereSillaDeRuedas = $requiereSillaDeRuedas;
        $this->requiereAsistencia = $requiereAsistencia;
        $this->requiereAlimentacionEspecial = $requiereAlimentacionEspecial;
    }

    public function getRequiereSillaDeRuedas()
    {
        return $this->requiereSillaDeRuedas;
    }

    public function setRequiereSillaDeRuedas($requiereSillaDeRuedas): self
    {
        $this->requiereSillaDeRuedas = $requiereSillaDeRuedas;

        return $this;
    }

    public function getRequiereAsistencia()
    {
        return $this->requiereAsistencia;
    }

    public function setRequiereAsistencia($requiereAsistencia): self
    {
        $this->requiereAsistencia = $requiereAsistencia;

        return $this;
    }

    public function getRequiereAlimentacionEspecial()
    {
        return $this->requiereAlimentacionEspecial;
    }

    public function setRequiereAlimentacionEspecial($requiereAlimentacionEspecial): self
    {
        $this->requiereAlimentacionEspecial = $requiereAlimentacionEspecial;

        return $this;
    }

    public function __toString()
    {
        return parent::__toString()
        . "\nRequiere silla de ruedas: " . $this->getRequiereSillaDeRuedas()
        . "\nRequiere asistencia especial: " . $this->getRequiereAsistencia()
        . "\nRequiere alimentación especial: " . $this->getRequiereAsistencia();
    }

    public function darPorcentajeIncremento()
    {
        $cantidadServicios = 0;
        $porcentaje = parent::darPorcentajeIncremento();
        if ($this->getRequiereSillaDeRuedas()) {
            $cantidadServicios++;
        }
        if ($this->getRequiereAsistencia()) {
            $cantidadServicios++;
        }
        if ($this->getRequiereAlimentacionEspecial()) {
            $cantidadServicios++;
        }
        if ($cantidadServicios == 1) {
            $porcentaje += 5;
        } elseif ($cantidadServicios >= 2) {
            $porcentaje += 20;
        }
        return $porcentaje;
    }
}
