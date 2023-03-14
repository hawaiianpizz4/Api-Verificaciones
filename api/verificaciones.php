<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('Content-Type: application/json');

require_once("../models/usersverificaciones.php");
require_once("../models/usersverificaciones2.php");

require_once("../models/userverificaciones4.php");

require_once("../models/userverificaciones5.php");

require_once("../models/userverificaciones6.php");

// require_once("../models/usuarios.php");
$base = new Base();
$base2 = new Base2();
$base4 = new Base4();
$base5 = new Base5();
$base6 = new Base6();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        switch ($_GET["consult"]) {
            case '':
                http_response_code(400);
                print_r(json_encode(array("status" => "error", "message" => "Falta parametros")));
                break;
                // EndPoint UsuariosVerificaciones
            case 'UsuariosVerificaciones':
                // $headers = getallheaders();
                // $apikey = $headers["x-api-key"];
                    $consult = $base->get_user();
                    // var_dump($consult);
                    // die();
                    $rest = empty($consult);
                    if ($rest == true) {
                        http_response_code(400);
                        echo json_encode(array("status" => "error", "message" => "Sin resultados"));
                    } else if ($rest == false) {
                        $consult = $base->get_user();
                        // $vf_cedula_cliente = $consult[0]->vf_cedula_cliente;
                        // $vf_nombre_tienda = $consult[0]->vf_nombre_tienda;
                        // $vf_nombre_vendedor = $consult[0]->vf_nombre_vendedor;
                        // $vf_nombre_cliente = $consult[0]->vf_nombre_cliente;
                        // $vf_lugar_a_verificar = $consult[0]->vf_lugar_a_verificar;
                        // $dndlD_ciudad_residencia = $consult[0]->dndlD_ciudad_residencia;
                        // $dndlD_sector_de_domicilio = $consult[0]->dndlD_sector_de_domicilio;
                        // $dndlD_direccion_domiciliaria = $consult[0]->dndlD_direccion_domiciliaria;
                        // $dndlD_referencia_domiciliaria = $consult[0]->dndlD_referencia_domiciliaria;
                        // $dndlN_nombre_empresa_trabaja = $consult[0]->dndlN_nombre_empresa_trabaja;
                        // $dndlN_actividad_laboral = $consult[0]->dndlN_actividad_laboral;
                        // $dndlN_direccion_trabajo = $consult[0]->dndlN_direccion_trabajo;
                        // $dndlN_telefonofijo = $consult[0]->dndlN_telefonofijo;
                        // $dndlN_telefonocelular = $consult[0]->dndlN_telefonocelular;
                        // $codigoAgencia = $consult[0]->codigoAgencia;
                        // $dndlN_telefonocelular = $consult[0]->dndlN_telefonocelular;
                        // $fechaIngreso = $consult[0]->fechaIngreso;
                        // $mesesGarante = $consult[0]->mesesGarante;
                        // $latitud = $consult[0]->latitud;
                        // $longitud = $consult[0]->longitud;
                        // $estado = $consult[0]->estado;
                        // $verificado = $consult[0]->verificado;
                        // $telefonosecundario = $consult[0]->telefonosecundario;
                        // $flujo_ingresos = $consult[0]->flujo_ingresos;
                        // $promedio = $consult[0]->promedio;
                        /*
                        vf_nombre_tienda, vf_nombre_vendedor, vf_nombre_cliente, vf_cedula_cliente, vf_lugar_a_verificar, 
                        dndlD_ciudad_residencia, dndlD_sector_de_domicilio, dndlD_direccion_domiciliaria, dndlD_referencia_domiciliaria, 
                        dndlN_nombre_empresa_trabaja, dndlN_actividad_laboral, dndlN_direccion_trabajo, dndlN_telefonofijo, dndlN_telefonocelular, 
                        codigoAgencia, fechaIngreso, mesesGarante, latitud, longitud, estado, verificado, telefonosecundario, flujo_ingresos, promedio, mCount
                        */
                        // $data = array(
                        //     "cedulaCliente" => $vf_cedula_cliente,
                        //     "nombreTienda" => $vf_nombre_tienda,
                        //     "nombreVendedor" => $vf_nombre_vendedor,
                        //     "nombreCliente" => $vf_nombre_cliente,
                        //     "lugarAVerificar" => $vf_lugar_a_verificar,
                        //     "ciudadResidencia" => $dndlD_ciudad_residencia,
                        //     "sectorDeDomicilio" => $dndlD_sector_de_domicilio,
                        //     "direccionDomiciliaria" => $dndlD_direccion_domiciliaria,
                        //     "referenciaDomiciliaria" => $dndlD_referencia_domiciliaria,
                        //     "nombreEmpresaDondeTrabaja" => $dndlN_nombre_empresa_trabaja,
                        //     "actividadLaboral" => $dndlN_actividad_laboral,
                        //     "direccionTrabajo" => $dndlN_direccion_trabajo,
                        //     "telefonoFijo" => $dndlN_telefonofijo,
                        //     "telefonoCelular" => $dndlN_telefonocelular,
                        //     "codigoAgencia" => $codigoAgencia,
                        //     "telefonoCelular" => $dndlN_telefonocelular,
                        //     "fechaIngreso" => $fechaIngreso,
                        //     "mesesGarante" => $mesesGarante,
                        //     "latitud" => $latitud,
                        //     "longitud" => $longitud,
                        //     "verificado" => $verificado,
                        //     "telefonosecundario" => $telefonosecundario,
                        //     "flujo_ingresos" => $flujo_ingresos,
                        //     "promedio" => $estado
                        // ); //End $data ARRAY
                        http_response_code(200);
                        print_r(json_encode($consult));
                    } else {
                        http_response_code(400);
                        echo json_encode(array("status" => "error", "message" => "Error en la peticion"));
                    }
                
                // 400 error interno
                // 200 OK

                // print_r(json_encode($headers["x-api-key"]));
                // die();
            break;

            case 'UpdateUser':
                if ($cedula = isset($_GET["cedula"]) && $_GET["nombreGestor"]) {
                    $cedula = ($_GET["cedula"]);
                    $nombreGestor= ($_GET["nombreGestor"]);
                    $consult = $base4->updateVerificaciones($cedula, $nombreGestor);
                    http_response_code(200);
                    echo json_encode(array("status" => "OK", "message" => "Usuario actualizado correctamente"));
                }
                else{
                    http_response_code(400);
                        echo json_encode(array("status" => "error", "message" => "Error en la peticion"));
                }            
            break;

            case 'VerificationforUser':
                if ($nombreGestor = isset($_GET["nombreGestor"])) {
                    $nombreGestor = ($_GET["nombreGestor"]);
                    $consult = $base5->checkUserForGestor($nombreGestor);
                    print_r(json_encode($consult));
                }
                else{
                    http_response_code(400);
                        echo json_encode(array("status" => "error", "message" => "Error en la peticion"));
                } 
            break;


            case 'VerificacionesDomicilio':
                if ($cedula = isset($_GET["cedula"])) {
                    $cedula = ($_GET["cedula"]);
                    $consult2 = $base2->obtenerVerificaciones($cedula);
                    $rest = empty($consult2);
                    if ($rest == true) {
                        http_response_code(401);
                        echo json_encode(array("status" => "error", "message" => "Sin resultados"));
                    } else if ($rest == false) {
                        $consult2 = $base2->obtenerVerificaciones($cedula);
                        $cedulaCliente = $consult2[0]->cedulaCliente;
                        $nombreCliente = $consult2[0]->nombreCliente;
                        $codigoVerificacion = $consult2[0]->codigoVerificacion;
                        $direccionDomiciliaria = $consult2[0]->direccionDomiciliaria;
                        $tipoVivienda = $consult2[0]->tipoVivienda;
                        $personaQuienRealizaLaVerificacion = $consult2[0]->personaQuienRealizaLaVerificacion;
                        $residenciaMinimaTresMeses = $consult2[0]->residenciaMinimaTresMeses;
                        $localTerrenoPropio = $consult2[0]->localTerrenoPropio;
                        $localTerrenoArrendado = $consult2[0]->localTerrenoArrendado;
                        $planillaServicioBasico = $consult2[0]->planillaServicioBasico;
                        $planillaServicioBasicoImagen = $consult2[0]->planillaServicioBasicoImagen;
                        $confirmacionInfoVecinos = $consult2[0]->confirmacionInfoVecinos;
                        $nombreInfoVecino = $consult2[0]->nombreInfoVecino;
                        $estabilidadLaboraSeisMesesImagen = $consult2[0]->estabilidadLaboraSeisMesesImagen;
                        $facturasProveedoresUltimosTresMesesImagen = $consult2[0]->facturasProveedoresUltimosTresMesesImagen;
                        $interiorDelNegocioImagen = $consult2[0]->interiorDelNegocioImagen;
                        $clienteDentroDelNegocioImagen = $consult2[0]->clienteDentroDelNegocioImagen;
                        $clienteFueraDelNegocioImagen = $consult2[0]->fachadaDelNegocioImagen;
                        $tituloPropiedaGaranteOCodeudorImagen = $consult2[0]->tituloPropiedaGaranteOCodeudorImagen;
                        $impuestoPredialImagen = $consult2[0]->impuestoPredialImagen;
                        $respaldoIngresosImagen = $consult2[0]->respaldoIngresosImagen;
                        $certificadoLaboralImagen = $consult2[0]->certificadoLaboralImagen;
                        $interiorDomicilioImagen = $consult2[0]->interiorDomicilioImagen;
                        $certificadoLaboralImagen = $consult2[0]->certificadoLaboralImagen;
                        $latitud = $consult2[0]->latitud;
                        $longitud = $consult2[0]->longitud;
                        $vf_nombre_tienda = $consult2[0]->vf_nombre_tienda;
                        $nombreGestor = $consult2[0]->nombreGestor;
                        $fechaverificacion = $consult2[0]->fechaverificacion;
                        /*
                        cedulaCliente, nombreCliente, codigoVerificacion, direccionDomiciliaria, tipoVivienda, 
                        personaQuienRealizaLaVerificacion, residenciaMinimaTresMeses, localTerrenoPropio, 
                        localTerrenoArrendado, planillaServicioBasico, planillaServicioBasicoImagen, 
                        seguridadPuertasVentanas, muebleriaBasica, materialCasa, periodicidadActividadesLaborales, 
                        confirmacionInfoVecinos, nombreInfoVecino, celularInfoVecino, estabilidadLaboraSeisMesesImagen, 
                        facturasProveedoresUltimosTresMesesImagen, fachadaDelNegocioImagen, interiorDelNegocioImagen, 
                        clienteDentroDelNegocioImagen, clienteFueraDelNegocioImagen, tituloPropiedaGaranteOCodeudorImagen, 
                        impuestoPredialImagen, respaldoIngresosImagen, certificadoLaboralImagen, interiorDomicilioImagen, latitud, 
                        longitud, coordenadas, vf_nombre_tienda, nombreGestor, fechaverificacion
        
                        */
                        $data = array(
                            "cedulaCliente" => $cedulaCliente,
                            "nombreCliente" => $nombreCliente,
                            "codigoVerificacion" => $codigoVerificacion,
                            "direccionDomiciliaria" => $direccionDomiciliaria,
                            "tipoVivienda" => $tipoVivienda,
                            "personaQuienRealizaLaVerificacion" => $personaQuienRealizaLaVerificacion,
                            "residenciaMinimaTresMeses" => $residenciaMinimaTresMeses,
                            "localTerrenoPropio" => $localTerrenoPropio,
                            "localTerrenoArrendado" => $localTerrenoArrendado,
                            "planillaServicioBasico" => $planillaServicioBasico,
                            "planillaServicioBasicoImagen" => $planillaServicioBasicoImagen,
                            "confirmacionInfoVecinos" => $confirmacionInfoVecinos,
                            "nombreInfoVecino" => $nombreInfoVecino,
                            "estabilidadLaboraSeisMesesImagen" => $estabilidadLaboraSeisMesesImagen,
                            "facturasProveedoresUltimosTresMesesImagen" => $facturasProveedoresUltimosTresMesesImagen,
                            "interiorDelNegocioImagen" => $interiorDelNegocioImagen,
                            "clienteDentroDelNegocioImagen" => $clienteDentroDelNegocioImagen,
                            "clienteFueraDelNegocioImagen" => $clienteFueraDelNegocioImagen,
                            "tituloPropiedaGaranteOCodeudorImagen" => $tituloPropiedaGaranteOCodeudorImagen,
                            "impuestoPredialImagen" => $impuestoPredialImagen,
                            "respaldoIngresosImagen" => $respaldoIngresosImagen,
                            "certificadoLaboralImagen" => $certificadoLaboralImagen,
                            "interiorDomicilioImagen" => $interiorDomicilioImagen,
                            "certificadoLaboralImagen" => $certificadoLaboralImagen,
                            "latitud" => $latitud,
                            "longitud" => $longitud,
                            "nombreTienda" => $vf_nombre_tienda,
                            "nombreGestor" => $nombreGestor,
                            "fechaverificacion" => $fechaverificacion
                        ); //End $data ARRAY
                        http_response_code(200);
                        print_r(json_encode($data));
                    } else {
                        http_response_code(400);
                        echo json_encode(array("status" => "error", "message" => "Error en la peticion"));
                    }
                } else {
                    http_response_code(401);
                    echo json_encode(array("status" => "error", "message" => "Falta parametros"));
                }
                break;
        }
        break;
    case 'POST':
        switch ($_GET["consult"]) {
            case '':
                http_response_code(400);
                print_r(json_encode(array("status" => "error", "message" => "Falta parametros")));
                break;
                // EndPoint UsuariosVerificaciones
            case 'UsuariosVerificaciones':
                http_response_code(401);
                print_r(json_encode(array("status" => "error", "message" => "Utilizar Metodo GET")));
                break;

            case 'VerificacionesDomicilio':
                http_response_code(401);
                print_r(json_encode(array("status" => "error", "message" => "Utilizar Metodo GET")));
                break;
            case 'insertCheck':
                
                http_response_code(200);
                $datos = json_decode(file_get_contents('php://input'));
                $cedulaCliente=$datos->cedulaCliente;
                $nombreCliente=$datos-> nombreCliente;
                $codigoVerificacion=$datos->codigoVerificacion;
                $direccionDomiciliaria =$datos->direccionDomiciliaria;
                $tipoVivienda =$datos->tipoVivienda;
                $personaQuienRealizaLaVerificacion =$datos->personaQuienRealizaLaVerificacion;
                $residenciaMinimaTresMeses =$datos->residenciaMinimaTresMeses;
                $localTerrenoPropio =$datos->localTerrenoPropio;
                $localTerrenoArrendado =$datos->localTerrenoArrendado;
                $planillaServicioBasico =$datos->planillaServicioBasico;
                $planillaServicioBasicoImagen =$datos->planillaServicioBasicoImagen;
                $seguridadPuertasVentanas =$datos->seguridadPuertasVentanas;
                $muebleriaBasica =$datos->muebleriaBasica;
                $materialCasa =$datos->materialCasa;
                $periodicidadActividadesLaborales =$datos->periodicidadActividadesLaborales;
                $confirmacionInfoVecinos =$datos->confirmacionInfoVecinos;
                $nombreInfoVecino =$datos->nombreInfoVecino;
                $celularInfoVecino =$datos->celularInfoVecino;
                $estabilidadLaboraSeisMesesImagen =$datos->estabilidadLaboraSeisMesesImagen;
                $facturasProveedoresUltimosTresMesesImagen =$datos->facturasProveedoresUltimosTresMesesImagen;
                $fachadaDelNegocioImagen =$datos->fachadaDelNegocioImagen;
                $interiorDelNegocioImagen =$datos->interiorDelNegocioImagen;
                $clienteDentroDelNegocioImagen =$datos->clienteDentroDelNegocioImagen;
                $clienteFueraDelNegocioImagen =$datos->clienteFueraDelNegocioImagen;
                $tituloPropiedaGaranteOCodeudorImagen =$datos->tituloPropiedaGaranteOCodeudorImagen;
                $impuestoPredialImagen=$datos->impuestoPredialImagen;
                $respaldoIngresosImagen =$datos->respaldoIngresosImagen;
                $certificadoLaboralImagen =$datos->certificadoLaboralImagen;
                $interiorDomicilioImagen =$datos->interiorDomicilioImagen;
                $latitud =$datos->latitud;
                $longitud =$datos->longitud;
                $coordenadas =$datos->coordenadas;
                $vf_nombre_tienda =$datos->vf_nombre_tienda;
                $nombreGestor =$datos->nombreGestor;
                $fechaverificacion=$datos->fechaverificacion;
                var_dump($cedulaCliente);
                print_r(json_encode(array("status" => "OK", "message" => "Ejecución método POST")));
                break;
        }
        break;
}



               