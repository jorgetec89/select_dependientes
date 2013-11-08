<?php

include("conexion.php");
conectar();

// construimos el combo de paises desde la base de datos

$sql = mysql_query("SELECT lote,lote,idt_detalle,inventory_id FROM tdetalle_movimientos");
      
      while($cuenta = mysql_fetch_row($sql))

      {

      $combo_lote .= "<option value='".$cuenta[0]."'>".$cuenta[1]."</option>"; 
      
      }

$sql2 = mysql_query("SELECT drug_id,name FROM drugs");

      while($sql_p = mysql_fetch_row($sql2))

      {
       
       $combo_medicamentos.= "<option value='".$sql_p[0]."'>".$sql_p[1]."</option>";
      
      } 

$sql3 = mysql_query("SELECT drug_id,ndc_number FROM drugs");

      while($print = mysql_fetch_row($sql3))
      
      {
      
      $combo_clave.= "<option value='".$print[0]."'>".$print[1]."</option>";
      
      } 

function clinica() { //facilityenvio 
 
   $envio_result = mysql_query("SELECT * FROM facility");
   echo "<select name='facility'  id='facility'>";
   echo "<option value=0>Clinica de envio</option>";
   while($row=mysql_fetch_array($envio_result)){
       echo "<option value=".$row['id'].">".$row['name']."</option>";
   } 

   echo "</select>";   

}

/*
function clave() {

$consulta_clave = mysql_query("SELECT * FROM drugs");
echo "<select name ='clave' id ='clave'>";
echo "<option value =0>..Clave</option>";
while($me = mysql_fetch_array($consulta_clave)) {
  echo "<option value =".$me['drug_id']. ">".$me['ndc_number']."</option>";

}

echo "</select>";


}  */


?>

  <!DOCTYPE html>
  <html lang="es">
  <head>

    	<title></title>
    	<meta charset="UTF-8">
    	<meta name= "viewport" content= "width=device-width , initial-scale=1.0">
    	<script type="text/javascript" src="js/jquery.min.js"></script>	
     	<link rel="stylesheet" href="js/jquery-ui.css" />
    	<script src="js/jquery-1.9.1.js"></script>
    	<script src="js/jquery-ui.js"></script>
      
<script type="text/javascript" charset="utf-8">
  
  $(document).ready(function() { 
        $("#lote").change(function () {
        $("#lote option:selected").each(function () {
        elegido=$(this).val();
        $.post("combo.php", { elegido: elegido }, function(data){
        $("#medica").html(data);
  
        });
      });
    });         
 
	         $(document).ready(function() {
           // Parametros para el combo
           $("#medicamento1").change(function () {
           $("#medicamento1 option:selected").each(function () {
            elegido=$(this).val();
           $.post("combo1.php", { elegido: elegido }, function(data){
           $("#lote1").html(data);
          
          });     
         });
       });
 
 $(document).ready(function() { 
        $("#clave1").change(function () {
        $("#clave1 option:selected").each(function () {
        elegido=$(this).val();
        $.post("combo2.php", { elegido: elegido }, function(data){
        $("#medicamento2").html(data);
  
        });
      });
    });         
  });

  $("#medicamento2").change(function () {
        $("#medicamento2 option:selected").each(function () {
          elegido=$(this).val();
          $.post("combo3.php", { elegido: elegido }, function(data){
          $("#lote2").html(data);
        
        });
      });
     });         
  });  
 }); 

</script>
           <script>
            	
                    $(function() {
                    $( "#fecha" ).datepicker();
                    });
                     
                    $(function() {
                    $( "#fecha1" ).datepicker();
                    });

                    $(function() {
                    $( "#fecha2" ).datepicker();
                    });

            </script> 

<body>

<form action="delete_lote.php" method = "POST">
  
        <label >Fecha</label>
        <input type="text" name = "fecha" id = "fecha">
        <label>Lote</label>
        <select name="lote" id="lote" required>
        <option value="0">Seleccione...</option>
        <?php  echo $combo_lote;?>
        </select>
        <label>Medicamento</label>  
        <select name="medica" id="medica" required>
        </select>                          
        <label>Cantidad</label>
        <input type="text" name ="can" id= "can">
        <label>Clinica</label>
        <? clinica(); ?>
        <input type="submit" value = "Eliminar x Lote">

</form>

<hr>

<form action="delete_medicamento.php" method = "POST">
        
        <label >Fecha</label>
        <input type="text" id = "fecha1" name = "fecha1">	
        <label>Medicamento</label>
        <select name="medicamento1" id="medicamento1" required>
        <option value="0">Seleccione...</option>
        <?php  echo $combo_medicamentos;?>
        </select>
       	<label>Lote</label>
        <select name="lote1" id="lote1" required>
        </select>                          
        <label>Cantidad</label>
        <input type="text" id = "ca" name = "ca">
        <label>Clinica</label>
        <? clinica(); ?>
        <input type="submit" value = "Eliminar x Medicamento">

</form>

<hr>

<form action="delete_clave1.php" method = "POST">

      <label >Fecha</label>
      <input type="text" name = "fecha2" id = "fecha2">	
      <label>Clave</label>
      <select name="clave1" name = "clave1" id="clave1" required>
      <option value="0">Seleccione...</option>
      <?php  echo $combo_clave; ?>
     	</select>
    	<label>Medicamento</label>
      <select name="medicamento2" id="medicamento2" required>
      </select>  
      <!--<label>Lote</label> -->
      <!--  <select name="lote2" id="lote2">  
      </select> -->
      <label>Cantidad</label>
      <input type="text" id= "cant" name = "cant">
      <label>Clinica</label>
      <? clinica(); ?>
      </select>
      <input type="submit" value = "Eliminar x Clave">

</form>

<!--	<select name="list1" id="list1"></select> 
	<select name="list2" id="list2"></select>
	<select name="list3" id="list3"></select> -->

</body>

</html>	
