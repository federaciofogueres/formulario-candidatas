<?php
include_once "../includes/db.conf.php";
include_once "getCandidata.php";

if (isset($_POST['uid']) && isset($_POST['type'])) {
    $uid = $_POST['uid'];
    $type = $_POST['type'];

    $candidata_array = getCandidata($uid, $type);

    if (!empty($candidata_array)) {

        $id = $candidata_array['id'];

        if ($type === 'adulta') {
            $candidata = R::xload(ADULTAS, $id);
        } else {
            $candidata = R::xload(INFANTILES, $id);
        }

        if ($candidata->id != 0) {

            if (isset($_POST['nombre'])) {
                $candidata->nombre = substr(clean_input($_POST['nombre']), 0, 255);
            }

            if (isset($_POST['fechanac'])) {
                $fecha_nacimiento = date("Y-m-d", strtotime(clean_input($_POST['fechanac'])));
                $candidata->fechanac = $fecha_nacimiento;
                $candidata->edad = (int) ((time() - strtotime($fecha_nacimiento)) / 31556926);
            }

            if (isset($_POST['ciudad'])) {
                $candidata->ciudad = substr(clean_input($_POST['ciudad']), 0, 100);
            }

            if (isset($_POST['anyosfiesta'])) {
                $candidata->anyos_fiesta = clean_input($_POST['anyosfiesta']);
            }

            if (isset($_POST['dni'])) {
                $candidata->dni = substr(clean_input($_POST['dni']), 0, 9);
            }

            if (isset($_POST['telefono'])) {
                $candidata->telefono = clean_input($_POST['telefono']);
            }

            if (isset($_POST['email'])) {
                $candidata->email = substr(clean_input($_POST['email']), 0, 100);
            }

            if (isset($_POST['estudios'])) {
                $candidata->formacion = substr(clean_input($_POST['estudios']), 0, 500);
            }

            if (isset($_POST['observaciones'])) {
                $candidata->observaciones = substr(clean_input($_POST['observaciones']), 0, 500);
            }

            if (isset($_POST['cargos'])) {
                $candidata->curriculum = substr(clean_input($_POST['cargos']), 0, 1000);
            }
            /*ADULTAS*/
            if (isset($_POST['situacion_laboral'])) {
                $candidata->situacion_laboral = substr(clean_input($_POST['situacion_laboral']), 0, 500);
            }

            /*INFANTILES*/
            if (isset($_POST['aficiones'])) {
                $candidata->aficiones = substr(clean_input($_POST['aficiones']), 0, 500);
            }

            if (isset($_POST['nombre_padre'])) {
                $candidata->nombre_padre = clean_input($_POST['nombre_padre']);
            }

            if (isset($_POST['nombre_madre'])) {
                $candidata->nombre_madre = clean_input($_POST['nombre_madre']);
            }

            if (isset($_POST['nombre_patria_potestad'])) {
                $candidata->nombre_patria_potestad = clean_input($_POST['nombre_patria_potestad']);
            }

            if (isset($_POST['telefono_padre'])) {
                $candidata->telefono_padre = clean_input($_POST['telefono_padre']);
            }

            if (isset($_POST['telefono_madre'])) {
                $candidata->telefono_madre = clean_input($_POST['telefono_madre']);
            }

            if (isset($_POST['telefono_patria_potestad'])) {
                $candidata->telefono_patria_potestad = clean_input($_POST['telefono_patria_potestad']);
            }

            $candidata->completed = true;

            R::store($candidata);

            if ($type === 'adulta') {
                header("Location: ../adultas/" . $uid);
            } else {
                header("Location: ../infantiles/" . $uid);
            }

            die();
        }
    }
}

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
