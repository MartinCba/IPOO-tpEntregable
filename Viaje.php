<?php

class Viaje
{
    // ATRIBUTOS
    private $passengers;
    private $code;
    private $destination;
    private $maxQuantity;
    // Composición del arreglo de passengers
    // passengers[x] = ["numero de documento" => $DniNumber, "nombre" => $name, "apellido" => $lastName];

    // CONSTRUCTOR
    public function __construct($newCode, $newDestination, $ability)
    {
        $this->passengers = [];
        $this->code = $newCode;
        $this->destination = $newDestination;
        $this->maxQuantity = $ability;
    }

    // MODIFICADORES
    public function setDestination($newDestination)
    {
        $this->destination = $newDestination;
    }

    // NO SE DEBERÍA MODIFICAR EL CÓDIGO DE UN VIAJE YA QUE SE ASUME QUE ES ÚNICO
    // (En tal caso se debe borrar y crear un viaje nuevo)
    /*
    public function setCode($newCode){
        $this -> code = $newCode;
    }
    */

    public function setPassengers($passengersArray)
    {
        $this->passengers = $passengersArray;
    }

    // OBSERVADORES
    public function getDestination()
    {
        return $this->destination;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getPassengers()
    {
        return $this->passengers;
    }

    public function getMaxQuantity()
    {
        return $this->maxQuantity;
    }

    // PROPIAS DE TIPO
    /**
     * Si hay espacio en el viaje agrega un nuevo pasajero
     * Retorna true si es posible, false en caso contrario
     * @param array $newPassenger
     * @return boolean
     */
    public function addPassenger($newPassenger)
    {
        // boolean $addable

        if (count($this->passengers) == $this->maxQuantity) {
            $addable = false;
        } else {
            $addable = true;
            array_push($this->passengers, $newPassenger);
        }

        return $addable;
    }

    /**
     * Recibe el dni del pasajero a quitar
     * Retorna true si es posible, false en caso contrario
     * @param int $removeDni
     * @return boolean
     */
    public function removePassengerByDni($removeDni)
    {
        // int $passengerPosition
        // boolean $removable

        $passengerPosition = $this->searchPassengerByDni($removeDni);

        if ($passengerPosition == -1) {
            $removable = false;
        } else {
            $removable = true;
            unset($this->passengers[$passengerPosition]);
            array_values($this->passengers);
        }
        return $removable;
    }

    /**
     * Modifica el nombre de un pasajero por su número de DNI
     * Retorna true si es posible, false en caso contrario
     * @param int $dniNumber
     * @param string $newName
     * @return boolean
     */
    public function modifyNameByDni($dniNumber, $newName)
    {
        // int $passengerPosition
        // boolean $modifiable

        $passengerPosition = $this->searchPassengerByDni($dniNumber);

        if ($passengerPosition == -1) {
            $modifiable = false;
        } else {
            $modifiable = true;
            $this->passengers[$passengerPosition]["nombre"] = $newName;
        }
        return $modifiable;
    }

    /**
     * Modifica el apellido de un pasajero por su número de DNI
     * Retorna true si es posible, false en caso contrario
     * @param int $dniNumber
     * @param string $newLastName
     * @return boolean
     */
    public function modifyLastNameByDni($dniNumber, $newLastName)
    {
        // int $passengerPosition
        // boolean $modifiable

        $passengerPosition = $this->searchPassengerByDni($dniNumber);

        if ($passengerPosition == -1) {
            $modifiable = false;
        } else {
            $modifiable = true;
            $this->passengers[$passengerPosition]["apellido"] = $newLastName;
        }
        return $modifiable;
    }

    private function searchPassengerByDni($dniNumber)
    {
        // boolean $exists
        // int $passengerPosition

        $exists = false;
        $passengerPosition = 0;

        while ($exists == false && $passengerPosition < count($this->passengers)) {
            if ($dniNumber == $this->passengers[$passengerPosition]["numero de documento"]) {
                $exists = true;
            }
            $passengerPosition++;
        }
        if ($passengerPosition == count($this->passengers)) {
            $passengerPosition = -1;
        }

        return $passengerPosition;
    }

    // NO SE DEBERÍA MODIFICAR EL DNI DE UN PASAJERO YA QUE SE ASUME QUE ES ÚNICO
    // (En tal caso se debe borrar y crear un pasajero nuevo)
}
