<?php

include "Viaje.php";

function menu()
{
    do {
        echo "||---------------------------------------------------------------------------------||\n";
        echo "||                              [Viaje Feliz]                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "||                               Menú general                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [1] Mostrar toda la información del viaje                                       ||\n";
        echo "|| [2] Crear un viaje nuevo                                                        ||\n";
        echo "|| [3] Vender un Ticket                                                            ||\n";
        echo "|| [4] Quitar un pasajero del viaje                                                ||\n";
        echo "|| [5] Modificar el nombre de un pasajero                                          ||\n";
        echo "|| [6] Modificar el código del viaje actual                                        ||\n";
        echo "|| [7] Modificar el destino del viaje actual                                       ||\n";
        echo "|| [8] Modificar el responsable del viaje actual                                   ||\n";
        echo "|| [9] Modificar la capacidad máxima de pasajeros del viaje actual                 ||\n";
        echo "|| [10] Mostrar el código del viaje actual                                         ||\n";
        echo "|| [11] Mostrar el destino del viaje actual                                        ||\n";
        echo "|| [12] Mostrar la cantidad máxima permitida de pasajeros para este viaje          ||\n";
        echo "|| [13] Mostrar todos los pasajeros que se encuentran en el viaje actual           ||\n";
        echo "|| [14] Mostrar quien es el responsable del viaje actual                           ||\n";
        echo "|| [0] Para finaizar el programa                                                   ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcion = trim(fgets(STDIN));

        if ($opcion < 0 || $opcion > 14 || !ctype_digit($opcion)) {
            echo "\n";
            echo "-------------------------------------------------------------------------------------\n";
            echo "|| ¡ERROR! Usted ha ingresado un valor NO válido,                                  ||\n";
            echo "|| verifique las opciones del menú nuevamente.                                     ||\n";
            echo "-------------------------------------------------------------------------------------\n";
            detenerEjecucion();
        }
    } while ($opcion < 0 || $opcion > 14);

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

function menuVenderViaje()
{
    do {
        echo "||---------------------------------------------------------------------------------||\n";
        echo "||                              [Viaje Feliz]                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "||                           Menú venta de Tickets                                 ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [1] Ticket de pasajero estandar                                                 ||\n";
        echo "|| [2] Ticket de pasajero V.I.P                                                    ||\n";
        echo "|| [3] Ticket de pasajero con servicios especiales                                 ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcion = trim(fgets(STDIN));

        if ($opcion < 1 || $opcion > 3 || !ctype_digit($opcion)) {
            echo "\n";
            echo "-------------------------------------------------------------------------------------\n";
            echo "|| ¡ERROR! Usted ha ingresado un valor NO válido,                                  ||\n";
            echo "|| verifique las opciones del menú nuevamente.                                     ||\n";
            echo "-------------------------------------------------------------------------------------\n";
            detenerEjecucion();
        }
    } while ($opcion < 1 || $opcion > 3);

    echo "\n";

    return $opcion;
}

function stringToBoolean($string)
{
    $boolean = false;
    if ($string == "s") {
        $boolean = true;
    }
    return $boolean;
}

/********************************************************************************/
/***************************** PROGRAMA PRINCIPAL *******************************/
/********************************************************************************/
$pasajero1 = new Pasajero("Juan Lopez", 1, 101);
$pasajero2 = new PasajeroVip("Julian Gomez", 2, 102, 99, 2500);
$pasajero3 = new Pasajero("Teresa Carrion", 3, 103);
$pasajero4 = new PasajeroVip("Julieta Lascano", 4, 104, 77, 5000);
$pasajero5 = new PasajeroEspecial("Raul Unzaga", 5, 105, true, true, false);

$responsable = new Responsable(7, 123, "Mario", "Fernandez");
$viaje = new Viaje(513, "Cordoba", 60, $responsable, 100);

$vendido = $viaje->venderPasaje($pasajero1);
$vendido = $viaje->venderPasaje($pasajero2);
$vendido = $viaje->venderPasaje($pasajero3);
$vendido = $viaje->venderPasaje($pasajero4);
$vendido = $viaje->venderPasaje($pasajero5);

$arrayPasajeros[0] = $pasajero1;
$arrayPasajeros[1] = $pasajero2;
$arrayPasajeros[2] = $pasajero3;
$arrayPasajeros[3] = $pasajero4;
$arrayPasajeros[4] = $pasajero5;
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
            echo "Ingrese el costo para el nuevo viaje: ";
            $costo = trim(fgets(STDIN));
            echo "Ingrese los datos del responsable:\n";
            echo "Nombre responsable: ";
            $nombre = trim(fgets(STDIN));
            echo "Apellido responsable: ";
            $apellido = trim(fgets(STDIN));
            echo "Número de empleado: ";
            $numeroEmpleado = trim(fgets(STDIN));
            echo "Número de licencia: ";
            $numeroLicencia = trim(fgets(STDIN));

            $responsable = new Responsable($numeroEmpleado, $numeroLicencia, $nombre, $apellido);

            if (ctype_digit($capMaxima) && $capMaxima >= 0) {
                $viaje = new Viaje($codigo, $destino, $capMaxima, $responsable, $costo);
                echo "Nuevo viaje creado exitosamente\n";
            } else {
                echo "ERROR: valor inválido para capacidad máxima de pasajeros\n";
            }
            detenerEjecucion();
            break;
        case 3:
            $opcionMenuVenta = menuVenderViaje();
            switch ($opcionMenuVenta) {
                case 1:
                    // Agrega un nuevo pasajero al viaje actual
                    echo "Ingrese el nombre del pasajero: ";
                    $nombre = trim(fgets(STDIN));
                    echo "Ingrese el número de asiento: ";
                    $asiento = trim(fgets(STDIN));
                    echo "Ingrese el número de ticket: ";
                    $ticket = trim(fgets(STDIN));
                    $pasajero = new Pasajero($nombre, $asiento, $ticket);
                    $vendido = $viaje->venderPasaje($pasajero);
                    if ($vendido != 0) {
                        echo "El pasajero se agregó con exito\n";
                        echo "El pasaje costo: \n" . $vendido;
                    } else {
                        if (count($viaje->getPasajeros()) == $viaje->getCantMaxPasajeros()) {
                            echo "ERROR: el viaje se encuentra en su capacidad máxima de pasajeros\n";
                        } else {
                            echo "ERROR: El pasajero ya se encuentra registrado dentro del viaje\n";
                        }
                    }
                    detenerEjecucion();
                    break;
                case 2:
                    // Agrega un nuevo pasajero VIP al viaje actual
                    echo "Ingrese el nombre del pasajero: ";
                    $nombre = trim(fgets(STDIN));
                    echo "Ingrese el número de asiento: ";
                    $asiento = trim(fgets(STDIN));
                    echo "Ingrese el número de ticket: ";
                    $ticket = trim(fgets(STDIN));
                    echo "Ingrese el número de viajero frecuente: ";
                    $numeroViajeroFracuente = trim(fgets(STDIN));
                    echo "Ingrese la cantidad de millas de viajero frecuente: ";
                    $cantidadMillasPasajero = trim(fgets(STDIN));
                    $pasajero = new PasajeroVip($nombre, $asiento, $ticket, $numeroViajeroFracuente, $cantidadMillasPasajero);
                    $vendido = $viaje->venderPasaje($pasajero);
                    if ($vendido != 0) {
                        echo "El pasajero se agregó con exito\n";
                        echo "El pasaje costo: \n" . $vendido;
                    } else {
                        if (count($viaje->getPasajeros()) == $viaje->getCantMaxPasajeros()) {
                            echo "ERROR: el viaje se encuentra en su capacidad máxima de pasajeros\n";
                        } else {
                            echo "ERROR: El pasajero ya se encuentra registrado dentro del viaje\n";
                        }
                    }
                    detenerEjecucion();
                    break;
                case 3:
                    // Agrega un nuevo pasajero especial al viaje actual
                    echo "Ingrese el nombre del pasajero: ";
                    $nombre = trim(fgets(STDIN));
                    echo "Ingrese el número de asiento: ";
                    $asiento = trim(fgets(STDIN));
                    echo "Ingrese el número de ticket: ";
                    $ticket = trim(fgets(STDIN));
                    echo "Requiere silla de ruedas? (s/n): ";
                    $string1 = trim(fgets(STDIN));
                    $requiereSillaDeRuedas = stringToBoolean($string1);

                    echo "Requiere asistencia especial? (s/n):";
                    $string2 = trim(fgets(STDIN));
                    $requiereAsistencia = stringToBoolean($string2);

                    echo "Requiere alimentacion especial? (s/n):";
                    $string3 = trim(fgets(STDIN));
                    $requiereAlimentacionEspecial = stringToBoolean($string3);

                    $pasajero = new PasajeroEspecial($nombre, $asiento, $ticket, $requiereSillaDeRuedas, $requiereAsistencia, $requiereAlimentacionEspecial);
                    $vendido = $viaje->venderPasaje($pasajero);
                    if ($vendido != 0) {
                        echo "El pasajero se agregó con exito\n";
                        echo "El pasaje costo: \n" . $vendido;
                    } else {
                        if (count($viaje->getPasajeros()) == $viaje->getCantMaxPasajeros()) {
                            echo "ERROR: el viaje se encuentra en su capacidad máxima de pasajeros\n";
                        } else {
                            echo "ERROR: El pasajero ya se encuentra registrado dentro del viaje\n";
                        }
                    }
                    detenerEjecucion();
                    break;
                default:
                    break;
            }
            break;
        case 4:
            // Quita un pasajero del viaje por número de asiento
            echo "Ingrese el número de asiento del pasajero que desea quitar del viaje: ";
            $asiento = trim(fgets(STDIN));
            $esPosible = $viaje->quitarPasajeroPorAsiento($asiento);

            if ($esPosible) {
                echo "Pasajero quitado del viaje exitosamente\n";
            } else {
                echo "No se pudo quitar el pasajero del viaje (no se encontro el asiento cargado en el viaje actual)\n";
            }
            detenerEjecucion();
            break;
        case 5:
            // Modifica el nombre de un pasajero por número de asiento
            echo "Ingrese el número de asiento del pasajero al que desea cambiar su nombre: ";
            $asiento = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre que desea asignar al pasajero: ";
            $nombre = trim(fgets(STDIN));
            $esPosible = $viaje->modificarNombrePorAsiento($asiento, $nombre);

            if ($esPosible) {
                echo "Se modifico el nombre del pasajero exitosamente\n";
            } else {
                echo "No se pudo modificar el nombre del pasajero (no se encontro el asiento cargado en el viaje actual)\n";
            }
            detenerEjecucion();
            break;
        case 6:
            // Modifica el código del viaje actual
            echo "Ingrese un nuevo código para el viaje actual: ";
            $codigo = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            echo "Código de viaje modificado exitosamente";
            detenerEjecucion();
            break;
        case 7:
            // Modifica el destino del viaje
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);
            echo "Destino modificado exitosamente\n";
            detenerEjecucion();
            break;
        case 8:
            // Modifica al responsable actual del viaje
            echo "Ingrese el nombre del nuevo responsable: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del nuevo responsable: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el número de empleado del nuevo responsable: ";
            $numeroEmpleado = trim(fgets(STDIN));
            echo "Ingrese el número de licencia del nuevo responsable: ";
            $numeroLicencia = trim(fgets(STDIN));

            $responsable = new Responsable($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
            $viaje->setResponsable($responsable);

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
            echo $viaje->mostrarPasajeros();
            echo "\n";
            detenerEjecucion();
            break;
        case 14:
            // Muestra quien es el responsable de este viaje
            echo "El responsable del viaje actual es: \n";
            echo $viaje->getResponsable() . "\n";
            echo "\n";
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
