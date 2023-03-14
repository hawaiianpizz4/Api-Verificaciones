<?php
require_once("../connection/connection.php");
    
    class Base extends Conectar{
            // 
            public function consultUser($cedulaUsuario)
            {
            $conectar = parent::conexion();
            parent::set_names();
            // $sql="EXEC [dbo].[sp_pagosrecover] '$cedula'";
            $sql="SELECT * FROM ventaspdv_verificaciones.verificaciones_usuarios_tb 
            WHERE vf_cedula_cliente=$cedulaUsuario";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
            }
            // 
            public function insertUser($em_id,
            $str,$solicitud,$vf_nombre_tienda, $vf_nombre_vendedor, $vf_nombre_cliente 
            ,$vf_cedula_cliente , $vf_lugar_a_verificar , 
            $dndlD_ciudad_residencia , $dndlD_sector_de_domicilio , $dndlD_direccion_domiciliaria , 
            $dndlD_referencia_domiciliaria , $dndlN_nombre_empresa_trabaja , $dndlN_actividad_laboral , 
            $dndlN_direccion_trabajo , $dndlN_telefonofijo , $dndlN_telefonocelular , $codigoAgencia , 
            $fechaIngreso , $mesesGarante , $latitud, $longitud, $estado , $verificado , $telefonosecundario, 
            $flujoIngresos, $promedio, $referencia1Telefono, $referencia1Nombre, $referencia1Cedula, $referencia2Telefono,
            $referencia2Nombre, $referencia2Cedula)
            {
            $conectar = parent::conexion();
            parent::set_names();
            // $sql="EXEC [dbo].[sp_pagosrecover] '$cedula'";
            $sql="CALL ventaspdv_verificaciones.proc_verificacion_usuarios_tb_api ('$em_id','$str','$solicitud','$vf_nombre_tienda', '$vf_nombre_vendedor', '$vf_nombre_cliente' 
            , '$vf_cedula_cliente' , '$vf_lugar_a_verificar' , 
            '$dndlD_ciudad_residencia' , '$dndlD_sector_de_domicilio' , '$dndlD_direccion_domiciliaria' , 
            '$dndlD_referencia_domiciliaria' , '$dndlN_nombre_empresa_trabaja' , '$dndlN_actividad_laboral' , 
            '$dndlN_direccion_trabajo' , '$dndlN_telefonofijo' , '$dndlN_telefonocelular' , '$codigoAgencia' , 
            '$fechaIngreso' , '$mesesGarante' , '$latitud', '$longitud', '$estado' , '$verificado' , '$telefonosecundario', 
            '$flujoIngresos', '$promedio', '$referencia1Telefono', '$referencia1Nombre', '$referencia1Cedula', '$referencia2Telefono',
            '$referencia2Nombre', '$referencia2Cedula')";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            // return $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
            }


            public function insertUser2($em_id, $ci, $str, $solicitud, $cel, $tel_dom, $dir_dom, $fechaIngreso, $lat_dom, $lon_dom,$dir_ofi,
            $referencia1_telefono, $referencia1_nombre, $referencia1_cedula,
            $referencia2_telefono, $referencia2_nombre, $referencia2_cedula)
            {
            $conectar = parent::conexion();
            parent::set_names();
            // $sql="EXEC [dbo].[sp_pagosrecover] '$cedula'";
            // $sql="CALL ventaspdv_verificaciones.proc_verificacion_usuarios_tb_api_2('$em_id', '$ci', '$str', '$solicitud', '$cel', '$tel_dom', '$dir_dom', 
            // '$fechaIngreso', '$lat_dom', '$lon_dom', '$dir_ofi',
            // '$lat_ofi', '$lon_ofi', '$referencia1_telefono', '$referencia1_nombre', '$referencia1_cedula',
            // '$referencia2_telefono', '$referencia2_nombre', '$referencia2_cedula')";

            $sql="INSERT INTO ventaspdv_verificaciones.verificaciones_usuarios_tb
            (em_id, vf_cedula_cliente, str, solicitud, dndlN_telefonocelular, dndlN_telefonofijo, dndlD_direccion_domiciliaria, 
                        fechaIngreso, latitud, longitud, estado, verificado, dndlN_direccion_trabajo,
                        referencia1_telefono, referencia1_nombre, referencia1_cedula,
                        referencia2_telefono, referencia2_nombre, referencia2_cedula, mCount, canal)
            values('$em_id', '$ci', '$str', '$solicitud', '$cel', '$tel_dom', '$dir_dom', 
                        '$fechaIngreso', '$lat_dom', '$lon_dom', '0', '0', '$dir_ofi',
                        '$referencia1_telefono', '$referencia1_nombre', '$referencia1_cedula',
                        '$referencia2_telefono', '$referencia2_nombre', '$referencia2_cedula', 0, 'Api')";
            
            $sql=$conectar->prepare($sql);
            $sql->execute();
            // return $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
            }
            
            
    } 
?>


