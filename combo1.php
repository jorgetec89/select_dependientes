<?php
//include('conexion.php');
//conectar();
$con = mysql_connect('localhost', 'root', '123');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("imed", $con);


$salida="";
$medicamento=$_POST["elegido"];
//$medicamento=5;
$sql_inventory_id="SELECT * FROM drug_inventory WHERE drug_id=$drug_id";
	echo $sql_inventory_id."<br>";
        $result_inventory_id = mysql_query($sql_inventory_id);
	while($reg_inventory_id=mysql_fetch_array($result_inventory_id)){      
			$inventory_id=$reg_inventory_id['inventory_id'];

		$sql="SELECT lote,lote FROM tdetalle_movimientos WHERE inventory_id=$inventory_id";
		//echo $sql_inventory_id."<br>";
		$result = mysql_query($sql);
		while($row=mysql_fetch_array($result)){
                $lote2=$reg['inventory_id'];
		//	echo "inventory_id: ".$inventory_id."nuevo lote= ".$lote2."<br>";  
				
         $salida= "<option value='".$row[0]."'>".$row[1]."</option>";
   } 
   



	}
//echo $consulta_iventory. "<br>";	

echo $salida;

?>
