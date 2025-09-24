<?php
require_once "php/Model/basedata2.php";
require_once 'php/Model/ModeloGraf.php';
$ModeloGraf = new ModeloGraf;

if (isset($_POST["accion"])) {

    $meses = [
        'Enero',
        'Febrero',
        'Marzo',
        'Abril',
        'Mayo',
        'Junio',
        'Julio',
        'Agosto',
        'Septiembre',
        'Octubre',
        'Noviembre',
        'Diciembre'
    ];

    $Inspecciones = $ModeloGraf->GrafInspeccion();
    $Avaluos = $ModeloGraf->GrafAvaluo();
    $Citas = $ModeloGraf->GrafCita();

    // Crear arrays para labels y datasets
    $labels = [];
    $citasData = [];
    $avaluosData = [];
    $inspeccionesData = [];

    foreach ($meses as $indice => $nombreMes) {

        $labels[] = $nombreMes;

        $numeroMes = $indice + 1;

        $citaTotal = 0;
        foreach ($Citas as $cita) {
            if (date("n", strtotime($cita['mes'])) == $numeroMes) { // 'n' devuelve el mes numérico (1-12)
                $citaTotal = $cita['total'];
                break; // Encontrado el mes, salir del bucle
            }
        }
        $citasData[] = $citaTotal;

        $avaluoTotal = 0;
        foreach ($Avaluos as $avaluo) {
            if (date("n", strtotime($avaluo['mes'])) == $numeroMes) {
                $avaluoTotal = $avaluo['total'];
                break;
            }
        }
        $avaluosData[] = $avaluoTotal;

        $inspeccionTotal = 0;
        foreach ($Inspecciones as $inspeccion) {
            if (date("n", strtotime($inspeccion['mes'])) == $numeroMes) {
                $inspeccionTotal = $inspeccion['total'];
                break;
            }
        }
        $inspeccionesData[] = $inspeccionTotal;
    }

    $responseData = [
        "labels" => $labels,
        "datasets" => [
            [
                "label" => "Avaluos",
                "backgroundColor" => "rgb(67, 53, 167)",
                "borderColor" => "rgb(67, 53, 167)",
                "data" => $avaluosData
            ],
            [
                "label" => "Inspecciones",
                "backgroundColor" => "rgb(128, 196, 233)",
                "borderColor" => "rgb(128, 196, 233)",
                "data" => $inspeccionesData
            ],
            [
                "label" => "Citas",
                "backgroundColor" => "rgb(255, 246, 233)",
                "borderColor" => "rgb(255, 246, 233)",
                "data" => $citasData
            ],
        ]
    ];

    header('Content-Type: application/json');
    echo json_encode($responseData);

}

if (isset($_POST["Inmuebles"])) {

    $InmuebleEmpa = $ModeloGraf->GrafInmuebleEmpa();
    $InmuebleFicha = $ModeloGraf->GrafInmuebleFicha();

    $donutData = [
        [
            'label' => 'Inmuebles Inscritos',
            'data' => $InmuebleFicha,
            'color' => '#4335A7'
        ],
        [
            'label' => 'Inmuebles Empadronados',
            'data' => $InmuebleEmpa,
            'color' => '#80C4E9'
        ]
    ];

    header('Content-Type: application/json'); // Indica que la respuesta es JSON
    echo json_encode($donutData);
}

if (isset($_POST["Parroquias"])) {

    $Inmueble = $ModeloGraf->GrafInmueble();
    $InmuebleFicha = 0; // Inicializar a cero
    $InmuebleEmpa = 0;

    foreach ($Inmueble as $Parroquias) {

        if ($Parroquias["parroquia"] == "002") {

            $InmuebleFicha++;

        } else {

            $InmuebleEmpa++;

        }

    }

    $x_parroquias = [
        [
            'label' => 'Inmuebles En Caña de Azúcar',
            'data' => $InmuebleFicha,
            'color' => '#FCC737'
        ],
        [
            'label' => 'Inmuebles En El Limón',
            'data' => $InmuebleEmpa,
            'color' => '#F26B0F'
        ]
    ];

    header('Content-Type: application/json'); // Indica que la respuesta es JSON
    echo json_encode($x_parroquias);
}

if (isset($_POST["Contrato"])) {

    $Inmueble = $ModeloGraf->GrafContrato();
    $InmuebleFicha = 0; // Inicializar a cero
    $InmuebleEmpa = 0;

    foreach ($Inmueble as $Tenencias) {

        if ($Tenencias["id_tipo_contrato"] == 1) {

            $InmuebleFicha++;

        } else {

            $InmuebleEmpa++;

        }

    }

    $x_tenencia = [
        [
            'label' => 'Contratos de Venta de Inmueble',
            'data' => $InmuebleFicha,
            'color' => '#E73879'
        ],
        [
            'label' => 'Contrato de Arrendamiento',
            'data' => $InmuebleEmpa,
            'color' => '#7E1891'
        ]
    ];

    header('Content-Type: application/json'); // Indica que la respuesta es JSON
    echo json_encode($x_tenencia);
}

if (isset($_POST["Clase"])) {

    $Inmueble = $ModeloGraf->GrafClase();
    $InmuebleComercial = 0; // Inicializar a cero
    $InmuebleResidencial = 0;
    $InmuebleMisxto = 0;

    foreach ($Inmueble as $Tenencias) {

        if ($Tenencias["clase_inmueble"] == "Comercial") {

            $InmuebleComercial++;

        } else if ($Tenencias["clase_inmueble"] == "Residencial") {

            $InmuebleResidencial++;

        } else {

            $InmuebleMisxto++;

        }

    }

    $x_tenencia = [
        [
            'label' => 'Inmuebles Comerciales',
            'data' => $InmuebleComercial,
            'color' => '#E73879'
        ],
        [
            'label' => 'Inmuebles Residenciales',
            'data' => $InmuebleResidencial,
            'color' => '#7E1891'
        ],
        [
            'label' => 'Inmuebles Mixtos',
            'data' => $InmuebleMisxto,
            'color' => '#F26B0F'
        ]
    ];

    header('Content-Type: application/json'); // Indica que la respuesta es JSON
    echo json_encode($x_tenencia);
}

if (isset($_POST["Tenencia"])) {

    $Inmueble = $ModeloGraf->GrafInmueble();
    $InmuebleFicha = 0; // Inicializar a cero
    $InmuebleEmpa = 0;

    foreach ($Inmueble as $Tenencias) {

        if ($Tenencias["tenencia_inmueble"] == 2) {

            $InmuebleFicha++;

        } else {

            $InmuebleEmpa++;

        }

    }

    $x_tenencia = [
        [
            'label' => 'Inmuebles Notariado',
            'data' => $InmuebleFicha,
            'color' => '#E73879'
        ],
        [
            'label' => 'Inmuebles Registrado',
            'data' => $InmuebleEmpa,
            'color' => '#7E1891'
        ]
    ];

    header('Content-Type: application/json'); // Indica que la respuesta es JSON
    echo json_encode($x_tenencia);
}

?>