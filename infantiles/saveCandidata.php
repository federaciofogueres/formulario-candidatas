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
            $candidata->fechanac = $fecha_nacimiento;
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

        if(isset($_POST['nombre_padre'])){
            $candidata->nombre_padre = htmlentities(trim($_POST['nombre_padre']),ENT_NOQUOTES);
        }

        if(isset($_POST['nombre_madre'])){
            $candidata->nombre_madre = htmlentities(trim($_POST['nombre_madre']),ENT_NOQUOTES);
        }

        if(isset($_POST['nombre_patria_potestad'])){
            $candidata->nombre_patria_potestad = htmlentities(trim($_POST['nombre_patria_potestad']),ENT_NOQUOTES);
        }

        if(isset($_POST['telefono_padre'])){
            $candidata->telefono_padre = htmlentities(trim($_POST['telefono_padre']),ENT_NOQUOTES);
        }

        if(isset($_POST['telefono_madre'])){
            $candidata->telefono_madre = htmlentities(trim($_POST['telefono_madre']),ENT_NOQUOTES);
        }

        if(isset($_POST['telefono_patria_potestad'])){
            $candidata->telefono_patria_potestad = htmlentities(trim($_POST['telefono_patria_potestad']),ENT_NOQUOTES);
        }

        if(isset($_POST['email'])){
            $candidata->email = htmlentities(substr(trim($_POST['email']), 0, 100),ENT_NOQUOTES);
        }

        if(isset($_POST['estudios'])){
            $candidata->formacion = htmlentities(substr(trim($_POST['estudios']), 0, 300),ENT_NOQUOTES);
        }

        if(isset($_POST['aficiones'])){
            $candidata->aficiones = htmlentities(substr(trim($_POST['aficiones']), 0, 300),ENT_NOQUOTES);
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
