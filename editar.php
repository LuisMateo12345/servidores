<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<?php

    include("conexion.php");

    if(!isset($_POST["bot_actualizar"])){

     $id=$_GET["id"];
     $nom=$_GET["nom"];
     $ape=$_GET["ape"];
     $tel=$_GET["tel"];
     $dir=$_GET["dir"];
     $barr=$_GET["barr"];
     $ciu=$_GET["ciu"];

   }else{
         $id=$_POST["id"];
         $nom=$_POST["nom"];
         $ape=$_POST["ape"];
         $tel=$_POST["tel"];
         $dir=$_POST["dir"];
         $barr=$_POST["barr"];
         $ciu=$_POST["ciu"];

         $sql="UPDATE DATOS_USUARIOS SET nombres=:minom, apellidos=:miape, telefono=:mitel, direccion=:midir, barrio=:mibarr, ciudad=:miciu WHERE id=:miid";
         $resultado=$base->prepare($sql);
         $resultado->execute(array(":miid"=>$id, ":minom"=>$nom, ":miape"=>$ape, ":mitel"=>$tel, 
          ":midir"=>$dir, ":mibarr"=>$barr, ":miciu"=>$ciu ));

         header("Location:index.php");
   }
?>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $ape ?>"></td>
    </tr>
    <tr>
      <td>telefono</td>
      <td><label for="tel"></label>
      <input type="number" name="tel" id="tel" value="<?php echo $tel ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $dir ?>"></td>
    </tr>
    <tr>
      <td>Barrio</td>
      <td><label for="barr"></label>
      <input type="text" name="barr" id="barr" value="<?php echo $barr ?>"></td>
    </tr>
    <tr>
      <td>Ciudad</td>
      <td><label for="ciu"></label>
      <input type="text" name="ciu" id="ciu" value="<?php echo $ciu ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>