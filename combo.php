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
$lote=$_POST["elegido"];
echo "lote: ".$lote;
					//lote,inventory_id	
		$sql_inventory_id="SELECT * FROM tdetalle_movimientos WHERE lote=$lote";
echo $sql_inventory_id."<br>";
        $result_inventory_id = mysql_query($sql_inventory_id);
        $reg_inventory_id= mysql_fetch_array($result_inventory_id);
        $inventory_id=$reg_inventory_id['inventory_id'];
        
        echo "inventory_id: ".$inventory_id."<br>";  


        $sql_drug_id="SELECT inventory_id,drug_id,stock FROM drug_inventory WHERE inventory_id=$inventory_id";
        $result_drug_id = mysql_query($sql_drug_id);
        $reg_drug_id= mysql_fetch_array($result_drug_id);
        $drug_id=$reg_drug_id['drug_id'];
        $stockbd=$reg_drug_id['stock'];
        echo "drug_id: ".$drug_id."<br>";
        echo "stock: ".$stockbd."<br>";
        
        $sql_nombre = "SELECT drug_id, name FROM drugs WHERE drug_id = $drug_id";
        $result_nombre = mysql_query($sql_nombre);
        $reg_nombre = mysql_fetch_array($result_nombre);
        $name = $reg_nombre['name'];
        echo "Medicamento <select name='sfacility' required id='sfacility'>";
        echo "<option value=".$reg_nombre['drug_id'].">".$reg_nombre['name']."</option>";
        echo "</select>";

/*
$combog = mysql_query("SELECT tdetalle_movimientos.inventory_id, tdetalle_movimientos.lote, drug_inventory.drug_id, drugs.name
FROM drug_inventory, drugs, tdetalle_movimientos FROM drug_inventory,drugs WHERE inventory_id='$id_pais'");

*/

  while($sql_p = mysql_fetch_row($result_nombre))

    {

		$salida.= "<option value='".$sql_p[0]."'>".$sql_p[2]."</option>";
	
	}


echo $salida;


?>
