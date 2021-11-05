<?php
class Facturas extends Conectar{
public function get_facturas(){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM ma_Facturas WHERE ESTADO in('F','A')";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
public function get_factura($ID){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM ma_Facturas WHERE ESTADO in('F','A') AND ID= ?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $ID);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
public function insert_factura($NUMERO_FACTURA,$ID_SOCIO,$FECHA_FACTURA,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_VENCIMIENTO,$ESTADO){
    $conectar = parent::conexion();
    parent:: set_names();
    $sql="INSERT INTO ma_Facturas(ID,NUMERO_FACTURA,ID_SOCIO,FECHA_FACTURA,DETALLE,SUB_TOTAL,TOTAL_ISV,TOTAL,FECHA_VENCIMIENTO,ESTADO)
    VALUES(NULL,?,?,?,?,?,?,?,?,?);";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$NUMERO_FACTURA);
    $sql->bindValue(2,$ID_SOCIO);
    $sql->bindValue(3,$FECHA_FACTURA);
    $sql->bindValue(4,$DETALLE);
    $sql->bindValue(5,$SUB_TOTAL);
    $sql->bindValue(6,$TOTAL_ISV);
    $sql->bindValue(7,$TOTAL);
    $sql->bindValue(8,$FECHA_VENCIMIENTO);
    $sql->bindValue(9,$ESTADO);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function update_factura($NUMERO_FACTURA,$ID_SOCIO,$FECHA_FACTURA,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_VENCIMIENTO,$ID){
    $conectar = parent::conexion();
    parent:: set_names();
    $sql="UPDATE ma_Facturas SET NUMERO_FACTURA =? ,ID_SOCIO =? ,FECHA_FACTURA=?,DETALLE =?,SUB_TOTAL=?,TOTAL_ISV=?,TOTAL=?,FECHA_VENCIMIENTO=?, ESTADO='F'
    WHERE ID =?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$NUMERO_FACTURA);
    $sql->bindValue(2,$ID_SOCIO);
    $sql->bindValue(3,$FECHA_FACTURA);
    $sql->bindValue(4,$DETALLE);
    $sql->bindValue(5,$SUB_TOTAL);
    $sql->bindValue(6,$TOTAL_ISV);
    $sql->bindValue(7,$TOTAL);
    $sql->bindValue(8,$FECHA_VENCIMIENTO);
    $sql->bindValue(9,$ID);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
   
    
}

public function delete_factura($ID){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="DELETE FROM ma_Facturas WHERE  ID= ?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $ID);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}


}
?>