<?php
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Facturas.php");

$Facturas = new Facturas();

$body = json_decode(file_get_contents("php://input"),true);

switch($_GET["op"]){
    case "GetFacturas":
        $datos=$Facturas->get_facturas();
        echo json_encode($datos);

    break;

    case "GetUno":
        $datos=$Facturas->get_factura($body["ID"]);
        echo json_encode($datos);

    break;

    case "InsertFactura":
        $datos = $Facturas->insert_factura($body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
        echo json_encode("Factura Agregada");

    break;

    case "UpdateFactura":
        $datos = $Facturas->update_factura($body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ID"]);
        echo json_encode("Campo Actualizado");

    break;
    case "DeleteFactura":
        $datos=$Facturas->delete_factura($body["ID"]);
        echo json_encode("Factura Eliminada");

    break;



}

?>