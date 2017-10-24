<?php
include_once("../includes/db.conf.php");
include_once("getCandidata.php");

if(isset($_POST['uid'])){
  $uid = $_POST['uid'];

  $candidata_array = getCandidata($uid);

  if(!empty($candidata_array)){

    $id = $candidata_array['id'];
    $candidata = R::xload(INFANTILES, $id);

    if($candidata->id != 0){

    	if(isset($_POST['nombre'])){
    		$candidata->nombre = htmlentities(substr(trim($_POST['nombre']), 0, 255),ENT_NOQUOTES);
    	}

        if(isset($_POST['fechanac'])){
            $fecha_nacimiento = date("Y-m-d", strtotime(trim($_POST['fechanac'])));
            $candidata->fechanac = htmlentities($fecha_nacimiento,ENT_NOQUOTES);
        }

        if(isset($_POST['ciudad'])){
            $candidata->ciudad = htmlentities(substr(trim($_POST['ciudad']),0, 100),ENT_NOQUOTES);
        }

        if(isset($_POST['edad'])){
            $candidata->edad = htmlentities(trim($_POST['edad']),ENT_NOQUOTES);
        }

        if(isset($_POST['anyosfiesta'])){
            $candidata->anyos_fiesta = htmlentities(trim($_POST['anyosfiesta']),ENT_NOQUOTES);
        }

        if(isset($_POST['dni'])){
            $candidata->dni = htmlentities(substr(trim($_POST['dni']), 0, 9),ENT_NOQUOTES);
        }

        if(isset($_POST['telefono'])){
            $candidata->telefono = htmlentities(trim($_POST['telefono']),ENT_NOQUOTES);
        }

        if(isset($_POST['email'])){
            $candidata->email = htmlentities(substr(trim($_POST['email']), 0, 100),ENT_NOQUOTES);
        }

        if(isset($_POST['estudios'])){
            $candidata->formacion = htmlentities(substr(trim($_POST['estudios']), 0, 300),ENT_NOQUOTES);
        }

        if(isset($_POST['situacion_laboral'])){
            $candidata->situacion_laboral = htmlentities(substr(trim($_POST['situacion_laboral']), 0, 300),ENT_NOQUOTES);
        }

        if(isset($_POST['cargos'])){
            $candidata->curriculum = htmlentities(substr(trim($_POST['cargos']), 0, 400),ENT_NOQUOTES);
        }

    	$candidata->completed = true;

    	R::store($candidata);

	    header("Location: index.php?uid=".$uid);
	    die();
    }
  }
}
?>
