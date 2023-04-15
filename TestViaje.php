<?php
include("Viaje.php");


function menu()
{
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
        echo "|| [2] Crear un viaje nuevo                                                        ||\n";
        echo "|| [3] Agregar un nuevo pasajero al viaje                                          ||\n";
        echo "|| [4] Quitar un pasajero del viaje                      ||\n";
        echo "|| [5] Modificar el nombre de un pasajero                ||\n";
        echo "|| [6] Modificar el apellido de un pasajero             ||\n";
        echo "|| [7] Modificar el código del viaje actual                                        ||\n";
        echo "|| [8] Modificar el destino del viaje actual                                       ||\n";
        echo "|| [9] Modificar la capacidad máxima de pasajeros del viaje actual                ||\n";
        echo "|| [10] Mostrar el código del viaje actual                                         ||\n";
        echo "|| [11] Mostrar el destino del viaje actual                                        ||\n";
        echo "|| [12] Mostrar la cantidad máxima permitida de pasajeros para este viaje          ||\n";
        echo "|| [13] Mostrar todos los pasajeros que se encuentran en el viaje actual           ||\n";
        echo "|| [0] Para finaizar el programa                                                   ||\n";
        echo "||                                                                                 ||\n";
        echo "-------------------------------------------------------------------------------------\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcion = trim(fgets(STDIN));

        if ($opcion < 0 || $opcion > 13 || !ctype_digit($opcion)) {
            echo "\n";
            echo "-------------------------------------------------------------------------------------\n";
            echo "|| ¡ERROR! Usted ha ingresado un valor NO válido,                                  ||\n";
            echo "|| verifique las opciones del menú nuevamente.                                     ||\n";
            echo "-------------------------------------------------------------------------------------\n";
            detenerEjecucion();
        }
    } while ($opcion < 0 || $opcion > 13);

    echo "\n";

    return $opcion;
}

function detenerEjecucion()
{
    echo "\n";

    do {
        echo "Presione [ENTER] para continuar. ";
        $enter = trim(fgets(STDIN));
    } while ($enter != "");
    echo "\n";
}

/********************************************************************************/
/***************************** PROGRAMA PRINCIPAL *******************************/
/********************************************************************************/

$viaje = new Viaje(513, "Madrid", 260);
$arrayPasajeros[0] = ["numero de documento" => 33456789, "nombre" => "Pepe", "apellido" => "Sanchez"];
$arrayPasajeros[1] = ["numero de documento" => 34567890, "nombre" => "Juan", "apellido" => "Gomez"];
$arrayPasajeros[2] = ["numero de documento" => 30123456, "nombre" => "Marcos", "apellido" => "Garcia"];
$viaje->setPasajeros($arrayPasajeros);
echo "El programa cuenta con un primer viaje precargado\n";
echo "\n";

do {
    $opcionMenu = menu();

    switch ($opcionMenu) {
        case 1:
            // Muestra el viaje cargado actualmente
            echo $viaje;
            echo "\n";
            detenerEjecucion();
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
            detenerEjecucion();
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
            $puedeAgregar = $viaje->agregarPasajero($pasajero);

            if ($puedeAgregar) {
                echo "El pasajero se agrego con exito\n";
            } else {
                if (count($viaje->getPasajeros()) == $viaje->getCantMaxPasajeros()) {
                    echo "ERROR: el viaje se encuentra en su capacidad máxima de pasajeros\n";
                } else {
                    echo "ERROR: el documento del pasajero ya se encuentra registrado dentro del viaje\n";
                }
            }
            detenerEjecucion();
            break;
        case 4:
            // Quita un pasajero del viaje por número de documento
            echo "Ingrese el número de documento del pasajero que desea quitar del viaje: ";
            $documento = trim(fgets(STDIN));
            $esPosible = $viaje->quitarPasajeroPorDocumento($documento);

            if ($esPosible) {
                echo "Pasajero quitado del viaje exitosamente\n";
            } else {
                echo "No se pudo quitar el pasajero del viaje (no se encontro el documento cargado en el viaje actual)\n";
            }
            detenerEjecucion();
            break;
        case 5:
            // Modifica el nombre de un pasajero por número de documento
            echo "Ingrese el número de documento del pasajero al que desea cambiar su nombre: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre que desea asignar al pasajero: ";
            $nombre = trim(fgets(STDIN));
            $esPosible = $viaje->modificarNombrePorDocumento($documento, $nombre);

            if ($esPosible) {
                echo "Se modifico el nombre del pasajero exitosamente\n";
            } else {
                echo "No se pudo modificar el nombre del pasajero (no se encontro el documento cargado en el viaje actual)\n";
            }
            detenerEjecucion();
            break;
        case 6:
            // Modifica el apellido de un pasajero por número de documento
            echo "Ingrese el número de documento del pasajero al que desea cambiar su apellido: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido que desea asignar al pasajero: ";
            $apellido = trim(fgets(STDIN));
            $esPosible = $viaje->modificarApellidoPorDocumento($documento, $apellido);

            if ($esPosible) {
                echo "Se modifico el apellido del pasajero exitosamente\n";
            } else {
                echo "No se pudo modificar el apellido del pasajero (no se encontro el documento cargado en el viaje actual)\n";
            }
            detenerEjecucion();
            break;
        case 7:
            // Modifica el código del viaje actual
            echo "Ingrese un nuevo código para el viaje actual: ";
            $codigo = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            echo "Código de viaje modificado exitosamente";
            detenerEjecucion();
            break;
        case 8:
            // Modifica el destino del viaje
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);
            echo "Destino modificado exitosamente\n";
            detenerEjecucion();
            break;
        case 9:
            // Modifica la cantidad máxima permitida de pasajeros en el viaje
            echo "Ingrese la nueva cantidad máxima permitida de pasajeros para este viaje: ";
            $capMaxima = trim(fgets(STDIN));
            if (ctype_digit($capMaxima)) {
                $viaje->setCantMaxPasajeros($capMaxima);
                echo "Cantidad máxima de pasajeros para este viaje modificada exitosamente\n";
            } else {
                echo "Error: valor ingresado para cantidad máxima de pasajeros invalido\n";
            }
            detenerEjecucion();
            break;
        case 10:
            // Muestra el código del viaje actual
            echo "El código del viaje actual es: " . $viaje->getCodigo() . "\n";
            detenerEjecucion();
            break;
        case 11:
            // Muestra el destino del viaje actual
            echo "El destino del viaje actual es: " . $viaje->getDestino() . "\n";
            detenerEjecucion();
            break;
        case 12:
            // Muestra la cantidad máxima de pasajeros permitida para el viaje actual
            echo "La cantidad máxima de pasajeros permitida para el viaje actual es: " . $viaje->getCantMaxPasajeros() . "\n";
            detenerEjecucion();
            break;
        case 13:
            // Muestra el arreglo de pasajeros del viaje actual
            echo "El arreglo de pasajeros del viaje actual es:\n";
            print_r($viaje->getPasajeros());
            echo "\n";
            detenerEjecucion();
            break;
        case 0:
            // Finaliza el programa
            break;
        default:
            // En caso de error (imposible) accederá a esta opción y se finalizará el programa
            break;
    }
} while ($opcionMenu != 0);

echo "¡PROGRAMA FINALIZADO!\n";
echo "\n";
