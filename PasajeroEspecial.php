<?php
class PasajeroEspecial extends Pasajero
{
    private $servicioEspecial;
    private $alimentacionEspecial;

    public function __construct($nombre, $numeroAsiento, $numeroTicket, $servicioEspecial, $alimentacionEspecial)
    {
        parent::__construct($nombre, $numeroAsiento, $numeroTicket);
        $this->servicioEspecial = $servicioEspecial;
        $this->alimentacionEspecial = $alimentacionEspecial;
    }

    public function getServicioEspecial()
    {
        return $this->servicioEspecial;
    }

    public function setServicioEspecial($servicioEspecial): self
    {
        $this->servicioEspecial = $servicioEspecial;

        return $this;
    }

    public function getAlimentacionEspecial()
    {
        return $this->alimentacionEspecial;
    }

    public function setAlimentacionEspecial($alimentacionEspecial): self
    {
        $this->alimentacionEspecial = $alimentacionEspecial;

        return $this;
    }

    public function __toString()
    {
        return parent::__toString()
        . "\nServicio especial: " . $this->getServicioEspecial()
        . "\nAlimentación especial: " . $this->getAlimentacionEspecial();
    }
}
?>

<!-- La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias -->
