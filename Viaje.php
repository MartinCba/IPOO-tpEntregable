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
    /**
     * @param int $codigoNuevo
     * @param string $destinoNuevo
     * @param int $cantMax
     */
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

    public function setPassengers($passengersArray)
    {
        if (count($passengersArray) > $this->maxQuantity) {
            $addable = false;
        } else {
            $addable = true;
            $this->passengers = $passengersArray;
        }
        return $addable;
    }
    public function setMaxQuantity($max)
    {
        $this->maxQuantity = $max;
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
     * Retorna un string con todos los elementos que componen al viaje
     * @return string
     */
    public function __toString()
    {
        $showTrip = "- ";
        $showTrip = "- Codigo: " . $this->code . "\n" .
            $showTrip = $showTrip . "Destino: " . $this->destination . "\n" .
            $showTrip = $showTrip . "Cantidad máxima del viaje: " . $this->maxQuantity . "\n" .
            $showTrip = $showTrip . "Lista de pasajeros del viaje: \n";

        for ($i = 0; $i < count($this->passengers); $i++) {
            $dniNumber = $this->passengers[$i]["numero de documento"];
            $name = $this->passengers[$i]["nombre"];
            $lastName = $this->passengers[$i]["apellido"];
            $showTrip = $showTrip . "Pasajero " . $i + 1 . ": [Documento: " . $dniNumber . ", Nombre: " . $name . ", Apellido: " . $lastName . "]\n";
        }
        return $showTrip;
    }
    /**
     * Si hay espacio en el viaje y no existe previamente el documento del pasajero a ingresar,
     * entonces se agrega el nuevo pasajero
     * Retorna un string que indica si se agrego el pasajero exitosamente
     * o cual fue el error por el cual no se pudo agregar
     * @param array $newPassenger
     * @return string
     */
    public function addPassenger($newPassenger)
    {
        if (count($this->passengers) == $this->maxQuantity) {
            $message = "Límite máximo de pasajeros alcanzado\n";
        } else {
            if ($this->searchPassengerByDni($newPassenger["numero de documento"]) != -1) {
                $message = "Documento ya existente en el viaje\n";
            } else {
                $message = "Pasajero agregado exitosamente!\n";
                array_push($this->passengers, $newPassenger);
            }
        }
        return $message;
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
            $this->passengers = array_values($this->passengers);
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
    /**
     * Busca un pasajero por número de documento, si existe retorna su posición
     * si no existe retorna -1
     * @param $dniNumber
     * @return int
     */

    private function searchPassengerByDni($dniNumber)
    {
        // boolean $exists
        // int $passengerPosition

        $exists = false;
        $passengerPosition = 0;

        while ($exists == false && $passengerPosition < count($this->passengers)) {
            if ($dniNumber == $this->passengers[$passengerPosition]["numero de documento"]) {
                $exists = true;
                $passengerPosition--;
            }
            $passengerPosition++;
        }
        if ($passengerPosition == count($this->passengers)) {
            $passengerPosition = -1;
        }

        return $passengerPosition;
    }
}
