<?php
include_once("includes/db.conf.php");
include_once("getCandidata.php");

if(isset($_POST['uid'])){
  $uid = $_POST['uid'];

  $candidata_array = getCandidata($uid);

  if(!empty($candidata_array)){

    $id = $candidata_array['id'];
    $candidata = R::xload(ADULTAS, $id);

    if($candidata->id != 0){

    	if(isset($_POST['nombre'])){
    		$candidata->nombre = htmlentities(trim($_POST['nombre']),ENT_NOQUOTES);
    	}

        if(isset($_POST['fechanac'])){
            $fecha_nacimiento = date("Y-m-d", strtotime(trim($_POST['fechanac'])));
            $candidata->fechanac = htmlentities($fecha_nacimiento,ENT_NOQUOTES);
        }

        if(isset($_POST['ciudad'])){
            $candidata->ciudad = htmlentities(trim($_POST['ciudad']),ENT_NOQUOTES);
        }

        if(isset($_POST['edad'])){
            $candidata->edad = htmlentities(trim($_POST['edad']),ENT_NOQUOTES);
        }

        if(isset($_POST['anyosfiesta'])){
            $candidata->anyos_fiesta = htmlentities(trim($_POST['anyosfiesta']),ENT_NOQUOTES);
        }

        if(isset($_POST['dni'])){
            $candidata->dni = htmlentities(trim($_POST['dni']),ENT_NOQUOTES);
        }

        if(isset($_POST['telefono'])){
            $candidata->telefono = htmlentities(trim($_POST['telefono']),ENT_NOQUOTES);
        }

        if(isset($_POST['email'])){
            $candidata->email = htmlentities(trim($_POST['email']),ENT_NOQUOTES);
        }

        if(isset($_POST['estudios'])){
            $candidata->formacion = htmlentities(trim($_POST['estudios']),ENT_NOQUOTES);
        }

        if(isset($_POST['situacion_laboral'])){
            $candidata->situacion_laboral = htmlentities(trim($_POST['situacion_laboral']),ENT_NOQUOTES);
        }

        if(isset($_POST['cargos'])){
            $candidata->curriculum = htmlentities(trim($_POST['cargos']),ENT_NOQUOTES);
        }


    	$candidata->completed = true;

    	R::store($candidata);

	//header("Location: http://comisiones.hogueras.es/?com=".$uid)
        //header("Location: http://www.hogueras.es");
	die();

    }
  }
}
?>
