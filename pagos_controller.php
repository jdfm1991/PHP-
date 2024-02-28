<?php

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("connection/connection.php");

//LLAMAMOS AL MODELO 
require_once("pagos_model.php");

require_once('src/vendor/php-excel-reader/excel_reader2.php');
require_once('src/vendor/SpreadsheetReader.php');

//INSTANCIAMOS EL MODELO
$payments = new Payments();

switch ($_GET["op"]) {

    case 'loadsave':
        

        $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        $exceldocument = $_FILES["fileexceldata"]["type"];
        
        if (in_array($exceldocument,$allowedFileType)) {

            //$dato = Array();

            $Path = "src/updatestates";
            $targetPath = $Path.'/'.$_FILES['fileexceldata']['name'];
            move_uploaded_file($_FILES['fileexceldata']['tmp_name'], $targetPath);

            $Reader = new SpreadsheetReader($targetPath);

            $sheetCount = count($Reader->sheets());

            foreach ($Reader as $Row) {
                //$sub_array = array();

                if (isset($Row[0])) {
                    $fec = $Row[0];
                    $fech = explode("/", $fec);
                    $año = $fech[2];
                    $mes = $fech[1];
                    $dia = $fech[0];
                    $fechat = $año.'-'.$mes.'-'.$dia;
                    $fecha = date('Y-m-d', strtotime($fechat));
                    
                }
                if (isset($Row[1])) {
                    $tipop = $Row[1];
                }
                if (isset($Row[2])) {
                    $descp = $Row[2];
                }
                if (isset($Row[3])) {
                    $refer = $Row[3];
                }
                if (isset($Row[4]) && $Row[4] > 0 ) {
                    $flag ='debe';
                    $monto = $Row[4];
                }
                if (isset($Row[5]) && $Row[5] > 0) {
                    $flag = 'haber';
                    $monto = $Row[5];
                }

                $tasa = '24';

                if (!empty($fecha) || !empty($tipop) || !empty($descp) || !empty($refer) || !empty($flag) || !empty($monto)) {

                    $resultados = $payments->savepayments($fecha,$tipop,$descp,$refer,$flag,$monto,$tasa);
                                   
                    if (! empty($resultados)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                    } else {
                        $type = "error";
                        $message = "Hubo un problema al importar registros";
                    }
                }
                

                //$dato[] = $sub_array;
            }

        } else{

            $dato = 'archivo no permitido';

        }

        

        echo json_encode($resultados, JSON_UNESCAPED_UNICODE); 

        break;
    
    default:
        # code...
        break;
}