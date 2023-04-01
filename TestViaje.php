<?php
include("Viaje.php");


function dropdownMenu()
{
    // int $opcionElegida

    do {
        echo "-------------------------------------------------------------------------------------\n";
        echo "||                              [Viaje Feliz]                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "||                               Menú general                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [1] Mostrar toda la información del viaje                                       ||\n";
        echo "|| [2] Cargar un viaje nuevo                                                       ||\n";
        echo "|| [3] Agregar un nuevo pasajero al viaje                                          ||\n";
        echo "|| [4] Quitar un pasajero del viaje                                                ||\n";
        echo "|| [5] Modificar el nombre de un pasajero                                          ||\n";
        echo "|| [6] Modificar el apellido de un pasajero                                        ||\n";
        echo "|| [7] Modificar el destino del viaje actual                                       ||\n";
        echo "|| [8] Modificar la capacidad máxima de pasajeros del viaje actual                 ||\n";
        echo "|| [9] Mostrar el código del viaje actual                                          ||\n";
        echo "|| [10] Mostrar el destino del viaje actual                                        ||\n";
        echo "|| [11] Mostrar la cantidad máxima permitida de pasajeros para este viaje          ||\n";
        echo "|| [12] Mostrar todos los pasajeros que se encuentran en el viaje actual           ||\n";
        echo "|| [0] Para finaizar el programa                                                   ||\n";
        echo "||                                                                                 ||\n";
        echo "-------------------------------------------------------------------------------------\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));

        // OBSERVAR: el rango varía según cantidad de opciones
        if ($opcionElegida < 0 || $opcionElegida > 12) {
            echo "\n";
            // Mensaje de error cuando la opción elegida está fuera de rango
            echo "--------------------------------------------------------------------------------\n";
            echo "|| ¡ERROR! Usted ha ingresado un valor NO válido,                             ||\n";
            echo "|| verifique las opciones del menú nuevamente.                                ||\n";
            echo "--------------------------------------------------------------------------------\n";
            stopExecution();
        }
        // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 12);

    echo "\n";

    return $opcionElegida;
}

function stopExecution()
{
    // string $presionarEnter

    echo "\n";

    do {
        // Mensaje de parada para leer los resultados
        echo "Presione [ENTER] para continuar. ";
        // Obligación de ingresar un valor para continuar la ejecución del código
        $presionarEnter = trim(fgets(STDIN));
    } while ($presionarEnter != "");

    echo "\n";
}

/********************************************************************************/
/***************************** PROGRAMA PRINCIPAL *******************************/
/********************************************************************************/

$viaje = new Viaje(513, "Madrid", 260);
$arrayPassengers[0] = ["numero de documento" => 33456789, "nombre" => "Pepe", "apellido" => "Sanchez"];
$arrayPassengers[1] = ["numero de documento" => 34567890, "nombre" => "Juan", "apellido" => "Gomez"];
$arrayPassengers[2] = ["numero de documento" => 30123456, "nombre" => "Marcos", "apellido" => "Garcia"];
$viaje->setPassengers($arrayPassengers);
echo "El programa cuenta con un primer viaje precargado\n";
echo "\n";

do {
    $opcionMenu = dropdownMenu();

    switch ($opcionMenu) {
        case 1:
            // Muestra el viaje cargado actualmente
            echo $viaje;
            echo "\n";
            stopExecution();
            break;
        case 2:
            // Crea un viaje nuevo
            echo "Ingrese el código correspondiente al nuevo viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino del nuevo viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la capacidad máxima de pasajeros para el nuevo viaje: ";
            $capMaxima = trim(fgets(STDIN));

            if (ctype_digit($capMaxima) && $capMaxima >= 0) {
                $viaje = new Viaje($codigo, $destino, $capMaxima);
                echo "Nuevo viaje creado exitosamente\n";
            } else {
                echo "ERROR: valor inválido para capacidad máxima de pasajeros\n";
            }
            stopExecution();
            break;
        case 3:
            // Agrega un nuevo pasajero al viaje actual
            echo "Ingrese el número de documento del pasajero: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));

            $pasajero = ["numero de documento" => $documento, "nombre" => $nombre, "apellido" => $apellido];
            $mensaje = $viaje->addPassenger($pasajero);
            echo $mensaje;
            stopExecution();
            break;
        case 4:
            // Quita un pasajero del viaje por número de documento
            echo "Ingrese el número de documento del pasajero que desea quitar del viaje: ";
            $documento = trim(fgets(STDIN));
            $esPosible = $viaje->removePassengerByDni($documento);

            if ($esPosible) {
                echo "Pasajero quitado del viaje exitosamente\n";
            } else {
                echo "No se pudo quitar el pasajero del viaje (no se encontro el documento cargado en el viaje actual)\n";
            }
            stopExecution();
            break;
        case 5:
            // Modifica el nombre de un pasajero por número de documento
            echo "Ingrese el número de documento del pasajero al que desea cambiar su nombre: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre que desea asignar al pasajero: ";
            $nombre = trim(fgets(STDIN));
            $esPosible = $viaje->modifyNameByDni($documento, $nombre);

            if ($esPosible) {
                echo "Se modifico el nombre del pasajero exitosamente\n";
            } else {
                echo "No se pudo modificar el nombre del pasajero (no se encontro el documento cargado en el viaje actual)\n";
            }
            stopExecution();
            break;
        case 6:
            // Modifica el apellido de un pasajero por número de documento
            echo "Ingrese el número de documento del pasajero al que desea cambiar su apellido: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido que desea asignar al pasajero: ";
            $apellido = trim(fgets(STDIN));
            $esPosible = $viaje->modifyLastNameByDni($documento, $apellido);

            if ($esPosible) {
                echo "Se modifico el apellido del pasajero exitosamente\n";
            } else {
                echo "No se pudo modificar el apellido del pasajero (no se encontro el documento cargado en el viaje actual)\n";
            }
            stopExecution();
            break;
        case 7:
            // Modifica el destino del viaje
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestination($destino);
            echo "Destino modificado exitosamente\n";
            stopExecution();
            break;
        case 8:
            // Modifica la cantidad máxima perimitida de pasajeros en el viaje
            echo "Ingrese la nueva cantidad máxima permitida de pasajeros para este viaje: ";
            $capMaxima = trim(fgets(STDIN));
            $esPosible = $viaje->setMaxQuantity($capMaxima);
            if ($esPosible) {
                echo "Cantidad máxima de pasajeros para este viaje modificada exitosamente\n";
            } else {
                echo "Error: valor ingresado para cantidad máxima de pasajeros invalido\n";
            }
            stopExecution();
            break;
        case 9:
            // Muestra el código del viaje actual
            echo "El código del viaje actual es: " . $viaje->getCode() . "\n";
            stopExecution();
            break;
        case 10:
            // Muestra el destino del viaje actual
            echo "El destino del viaje actual es: " . $viaje->getDestination() . "\n";
            stopExecution();
            break;
        case 11:
            // Muestra la cantidad máxima de pasajeros permitida para el viaje actual
            echo "La cantidad máxima de pasajeros permitida para el viaje actual es: " . $viaje->getMaxQuantity() . "\n";
            stopExecution();
            break;
        case 12:
            // Muestra el arreglo de pasajeros del viaje actual
            echo "El arreglo de pasajeros del viaje actual es:\n";
            print_r($viaje->getPassengers());
            echo "\n";
            stopExecution();
            break;
        case 0:
            // Finaliza el programa
            break;
        default:
            // En caso de error (imposible) accederá a esta opción
            break;
    }
} while ($opcionMenu != 0);

echo "¡PROGRAMA FINALIZADO!\n";
echo "\n";
