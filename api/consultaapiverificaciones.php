<?php
    header('Content-Type: application/json');
    require_once("../connection/connection.php");
    require_once("../Categoria.php");
    $categoria = new Categoria();

    $body=json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {    
        case 'GetAll':
            $datos=$categoria->get_categoria();
            echo json_encode($datos);
            break;        
        case 'InformacionPersonal':
            $datos=$categoria->get_informacionPersonal($_GET["cedula"]);
            echo json_encode($datos);
            break; 
            
        case 'InformacionCrediticia':
                $datos=$categoria->get_informacionCrediticia($_GET["cedula"]);
                echo json_encode($datos);
                break; 

        case 'Credito':
            $datos=$categoria->get_creditos($_GET["cedula"]);
            echo json_encode($datos);
            break; 

        case 'DatosFacturacion':
                $datos=$categoria->get_datosFacturacion($_GET["cedula"]);
                echo json_encode($datos);
                break; 
        // case 'GetAll2':
        //     $datos=$categoria->get_proceso2();
        //     echo json_encode($datos);
        //     break;        

    }
?>