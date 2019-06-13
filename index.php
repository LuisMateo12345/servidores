<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>CRUD</title>

<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="w3.css">
</head>

<body background="xx.jpg">

<?php

include ("conexion.php") ;
$conexion=$base->query("SELECT * FROM DATOS_USUARIOS") ;

$registros=$conexion->fetchAll (PDO::FETCH_OBJ) ;

if (isset($_POST["cr"])){

	$nombres=$_POST["nom"];
	$apellidos=$_POST["ape"];
	$telefono=$_POST["tel"];
	$direccion=$_POST["dir"];
	$barrio=$_POST["barr"];
	$ciudad=$_POST["ciu"];

	$sql="INSERT INTO DATOS_USUARIOS(nombres,apellidos,telefono,direccion,barrio,ciudad) VALUES (:nom, :ape, :tel, :dir, :barr, :ciu)";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":nom"=>$nombres, ":ape"=>$apellidos, ":tel"=>$telefono, ":dir"=>$direccion, ":barr"=>$barrio, ":ciu"=>$ciudad));

	header("Location:index.php");
}

?>
<div class="w3-display-container w3-text-white">
<h1 align="center">REGISTROS USCO</h1>
</div>
<p>
<p></p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <div class="w3-container">
  <table width="50%" border="0" align="center" class="w3-table-all">
    <tr class="w3-blue">
      <td class="primera_fila w3-center">Id</td>
      <td class="primera_fila w3-center">Nombres</td>
      <td class="primera_fila w3-center">Apellidos</td>
      <td class="primera_fila w3-center">Numero Telefonico</td>
      <td class="primera_fila w3-center">Dirección</td>
      <td class="primera_fila w3-center">Barrio</td>
      <td class="primera_fila w3-center">Ciudad</td>
      <td class="sin"></td>
      <td class="sin"></td>

    </tr> 
   
	<?php
         foreach($registros as $persona): ?>


   	<tr>
      <td name="nom" id="nom" value="<?php echo $persona->id?>"><center><?php echo $persona->id?></center></td>
      <td><?php echo $persona->nombres?></td>
      <td><?php echo $persona->apellidos?></td>
      <td><?php echo $persona->telefono?></td>
      <td><?php echo $persona->direccion?></td>
      <td><?php echo $persona->barrio?></td>
      <td><?php echo $persona->ciudad?></td>
      <td class="bot w3-center">
      	<a href="borrar.php?id=<?php echo $persona->id?>">
      		<button class="w3-btn w3-ripple w3-red" type='button' name='del' id='del'>Borrar</button>
      	</a>
      </td>
      <td class='bot w3-center'>
      	<a href="editar.php?id=<?php echo $persona->id?> & nom=<?php echo $persona->nombres?> & ape=<?php echo $persona->apellidos?> & tel=<?php echo $persona->telefono?> & dir=<?php echo $persona->direccion?> & barr=<?php echo $persona->barrio?> & ciu=<?php echo $persona->ciudad?>">
      		<button class="w3-btn w3-ripple w3-teal" type='button' name='up' id='up'>Editar</button>
      	</a>
      </td>
    </tr> 

<?php
endforeach;
?>


	<tr>
	<td></td>
      <td><input type='text' name='nom' size='10' class='centrado' required placeholder="Nombres"></td>
      <td><input type='text' name='ape' size='10' class='centrado' required placeholder="Apellidos"></td>
      <td><input type='number' name='tel' size='10' class='centrado' required placeholder="No.Telefonico"></td>
      <td><input type='text' name='dir' size='10' class='centrado' required placeholder="Dirección"></td>
      <td><input type='text' name='barr' size='10' class='centrado' required placeholder="Barrio"></td>
      <td><input type='text' name='ciu' size='10' class='centrado' required placeholder="Ciudad"></td>

      <td class='bot w3-center'>
      	<button class="w3-btn w3-xlarge w3-circle w3-black" type='submit' name='cr' id='cr'>+</button>
      </td>
    </tr>    
  </table>
</div>
</form>
<p>&nbsp;</p>
</body>
</html>