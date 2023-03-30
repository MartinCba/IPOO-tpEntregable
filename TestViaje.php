<?php
include("Viaje.php");

/**
 * Imprime en pantalla un menú de opciones y
 * retorna un entero que representa la opcion elegida
 * @return int
 */
function dropdownMenu()
{
    // int $chosenOption

    do {
        echo "--------------------------------------------------------------------------------\n";
        echo "||                              MENÚ PRINCIPAL                                ||\n";
        echo "||                                                                            ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la opción elegida:         ||\n";
        echo "||                                                                            ||\n";
        echo "|| [1] Para ejecutar la operación 1                                           ||\n";
        echo "|| [2] Para ejecutar la operación 2                                           ||\n";
        echo "|| [3] Para ejecutar la operación 3                                           ||\n";
        echo "|| [4] Para ejecutar la operación 4                                           ||\n";
        echo "|| [5] Para ejecutar la operación 5                                           ||\n";
        echo "|| [0] Para finaizar el programa                                              ||\n";
        echo "||                                                                            ||\n";
        echo "--------------------------------------------------------------------------------\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $chosenOption = trim(fgets(STDIN));

        // OBSERVAR: el rango varía según cantidad de opciones
        if ($chosenOption < 0 || $chosenOption > 5) {
            echo "\n";
            // Mensaje de error cuando la opción elegida está fuera de rango
            echo "--------------------------------------------------------------------------------\n";
            echo "|| ¡ERROR! Usted ha ingresado un valor NO válido,                             ||\n";
            echo "|| verifique las opciones del menú nuevamente.                                ||\n";
            echo "--------------------------------------------------------------------------------\n";
            stopExecution();
        }
        // OBSERVAR: el rango varía según cantidad de opciones
    } while ($chosenOption < 0 || $chosenOption > 5);

    echo "\n";

    return $chosenOption;
}

/**
 * Este módulo solicita que se ingrese un valor con el simple objeto
 * de detener la ejecución del programa y así poder leer resultados.
 */
function stopExecution()
{
    // string $pressIntro

    echo "\n";

    do {
        // Mensaje de parada para leer los resultados
        echo "Presione [ENTER] para continuar. ";
        // Obligación de ingresar un valor para continuar la ejecución del código
        $pressIntro = trim(fgets(STDIN));
    } while ($pressIntro != "");

    echo "\n";
}

/**
 * OPERACIÓN 1 GENÉRICA
 * (Formato de un comentario genérico)
 * @param int $elemento1
 * @param float $elemento2
 * @param string $elemento3
 * @param boolean $elemento4
 * @param array $elemento5
 * @return int
 */
function operacionGenerica1($elemento1, $elemento2)
{
    // int $elementoRetornado

    $elementoRetornado = 1;

    return $elementoRetornado;
}

/********************************************************************************/
/***************************** Main Program *************************************/
/********************************************************************************/

$viaje = new Viaje(1, "Cordoba", 40);

// pasajeros[x] = ["numero de documento" => $dniNumber, "nombre" => $name, "apellido" => $lastName];
$boolean = $viaje->addPassenger(["numero de documento" => 25000, "nombre" => "Sultanito", "apellido" => "sultanez"]);
echo "Agrego pasajero: " . $boolean . "\n";
$boolean = $viaje->addPassenger(["numero de documento" => 25000, "nombre" => "Sultanito", "apellido" => "sultanez"]);
echo "Agrego pasajero: " . $boolean . "\n";

do {
    $menuOption = dropdownMenu();

    switch ($menuOption) {
        case 1:
            // Ejecuta la operación 1
            break;
        case 2:
            // Ejecuta la operación 2
            break;
        case 3:
            // Ejecuta la operación 3
            break;
        case 4:
            // Ejecuta la operación 4
            break;
        case 5:
            // Ejecuta la operación 5
            break;
        case 0:
            // Finaliza el programa
            break;
        default:
            // En caso de error (imposible) accederá a esta opción
            break;
    }
} while ($menuOption != 0);

echo "¡PROGRAMA FINALIZADO!\n";
echo "\n";
