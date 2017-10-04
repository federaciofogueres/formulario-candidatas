<?php
include_once("includes/db.conf.php");
include_once("getCandidata.php");

if(isset($_POST['uid'])){

  $uid = $_POST['uid'];

  $candidata_array = getCandidata($uid);

  if(!empty($candidata_array)){

    $id = $candidata_array['id'];
    $candidata = R::xload(CANDIDATAS, $id);

    if($candidata->id != 0){

    	if(isset($_POST['nombre'])){
    		$candidata->nombre = htmlentities(trim($_POST['nombre']),ENT_NOQUOTES);
    	}

      /*Hacer lo anterior con todos los campos que lleguen por post*/

    	$candidata->completed = true;

    	R::store($candidata);

	header("Location: http://comisiones.hogueras.es/?com=".$uid);
	die();

    }
  }
}
?>
