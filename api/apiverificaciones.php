<?php
// 
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('Content-Type: application/json');

error_reporting(0); // quitar errores

require_once("../models/usersverificaciones.php");
$base = new Base();
// obtener body
// $body = file_get_contents('php://input');
 
// Converts it into a PHP object
// $data = json_decode($json);

try {
    switch ($_SERVER['REQUEST_METHOD']) {
            // GET request
        case 'GET':
            http_response_code(405);
            print_r(json_encode(array("status" => "error", "message" => "Método incorrecto")));
            break;
            // end of GET request

            // POST request
        case 'POST':
            switch (($_GET["send"])) {
                case '':
                    http_response_code(400);
                    print_r(json_encode(array("status" => "error", "message" => "Solicitud no valida")));
                    break;
                case 'User':
                    $body = (file_get_contents('php://input'));
                    $parsiar = json_decode($body, true);
                    if ($parsiar == NULL) {
                        http_response_code(400);
                        print_r(json_encode(array("status" => "error", "message" => "Json en formato inválido, no se pudo decodificar correctamente")));
                    } else {
                        // var_dump($body);
                        $json_decode = json_decode($body);
                        // Api Key
                        $apikey = $json_decode->apikey;
                        // 
                        $em_id = $json_decode->cliente->em_id;
                        //Cedula
                        $vf_cedula_cliente = $json_decode->cliente->ci;
                        // Campos nuevos
                        $str = $json_decode->cliente->str;
                        $solicitud = $json_decode->cliente->solicitud;
                        // Campos
                        $vf_nombre_tienda = $json_decode->cliente->nombre_tienda;
                        $vf_nombre_vendedor = $json_decode->cliente->nombre_vendedor;
                        $vf_nombre_cliente = $json_decode->cliente->nombre_cliente;
                        // $vf_cedula_cliente = $json_decode->cliente->cedula_cliente;
                        $vf_nombre_vendedor = $json_decode->cliente->nombre_vendedor;
                        $vf_nombre_cliente = $json_decode->cliente->nombre_cliente;
                        // $vf_cedula_cliente = $json_decode->cliente->cedula_cliente;
                        $vf_lugar_a_verificar = $json_decode->cliente->lugar_a_verificar;
                        $dndlD_ciudad_residencia = $json_decode->cliente->ciudad_residencia;
                        $dndlD_sector_de_domicilio = $json_decode->cliente->sector_de_domicilio;
                        $dndlD_direccion_domiciliaria = $json_decode->cliente->direccion_domiciliaria;
                        $dndlD_referencia_domiciliaria = $json_decode->cliente->referencia_domiciliaria;
                        $dndlN_nombre_empresa_trabaja = $json_decode->cliente->nombre_empresa_trabaja;
                        $dndlN_actividad_laboral = $json_decode->cliente->actividad_laboral;
                        $dndlN_direccion_trabajo = $json_decode->cliente->direccion_trabajo;
                        $dndlN_telefonofijo = $json_decode->cliente->telefono_fijo;
                        $dndlN_telefonocelular = $json_decode->cliente->telefono_celular;
                        $codigoAgencia = $json_decode->cliente->codigo_agencia;

                        // Fecha de ingreso
                        $fechaIngreso = date("Y-m-d H:i:s");
                        // 
                        $mesesGarante = $json_decode->cliente->meses_garante;
                        $latitud = $json_decode->cliente->latitud;
                        $longitud = $json_decode->cliente->longitud;
                        // estado
                        $estado = 0;
                        // verificado
                        $verificado = 0;
                        // 
                        $telefonosecundario = $json_decode->cliente->telefono_secundario;
                        $flujoIngresos = $json_decode->cliente->flujo_ingresos;
                        $promedio = $json_decode->cliente->promedio;
                        // Refencias
                        // Referencia 1
                        $referencia1Telefono = $json_decode->referencia1->tel;
                        $referencia1Nombre = $json_decode->referencia1->nom;
                        $referencia1Cedula = $json_decode->referencia1->ci;
                        // Referencia 2
                        $referencia2Telefono = $json_decode->referencia1->tel;
                        $referencia2Nombre = $json_decode->referencia1->nom;
                        $referencia2Cedula = $json_decode->referencia1->ci;
                        
                        $consult1 = $base->consultUser($vf_cedula_cliente);
                        if (empty($consult1) && $apikey == "87sgtY$$98yu7t6jIo9U6yTrcx4R5Tyf_") {
                            $consult2 = $base->insertUser(
                                $em_id,
                                $str,
                                $solicitud,
                                $vf_nombre_tienda,
                                $vf_nombre_vendedor,
                                $vf_nombre_cliente,
                                $vf_cedula_cliente,
                                $vf_lugar_a_verificar,
                                $dndlD_ciudad_residencia,
                                $dndlD_sector_de_domicilio,
                                $dndlD_direccion_domiciliaria,
                                $dndlD_referencia_domiciliaria,
                                $dndlN_nombre_empresa_trabaja,
                                $dndlN_actividad_laboral,
                                $dndlN_direccion_trabajo,
                                $dndlN_telefonofijo,
                                $dndlN_telefonocelular,
                                $codigoAgencia,
                                $fechaIngreso,
                                $mesesGarante,
                                $latitud,
                                $longitud,
                                $estado,
                                $verificado,
                                $telefonosecundario,
                                $flujoIngresos,
                                $promedio,
                                $referencia1Telefono,
                                $referencia1Nombre,
                                $referencia1Cedula,
                                $referencia2Telefono,
                                $referencia2Nombre,
                                $referencia2Cedula
                            );
                            http_response_code(200);
                            print_r(json_encode(array("status" => "OK", "message" => "Usuario Ingresado correctamente")));
                        } else {
                            http_response_code(401);
                            print_r(json_encode(array("status" => "error", "message" => "Cédula ya ingresada o Key ingresada incorrectamente")));
                        }
                    }
                    // $apikey = $body->apikey;
                    // var_dump($apikey);
                    break;
                default:
                    http_response_code(400);
                    print_r(json_encode(array("status" => "error", "message" => "Solicitud no valida")));
                    break;

                    // Formato Json
                    $probando = isset($body);
                    var_dump($probando);
                    die();
            }
            break;
            // End of POST request
    }
} catch (\Throwable $th) {
    http_response_code(405);
    $message = array("ok" => "false", "message" => "error inesperado consulte con el administrador del sistema");
    echo json_encode($message);
}
