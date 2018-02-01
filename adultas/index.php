<?php
include_once("../includes/db.conf.php");
include_once("getCandidata.php");
$isCandidata = false;
$isCompleted = false;
if (!empty($_GET["uid"]) && strlen($_GET["uid"]) == 8) {
    $uid = $_GET["uid"];
    $candidata = getCandidata($uid);
    if (!empty($candidata)) {
        $isCandidata = true;

        if ($candidata['completed']) {
            $isCompleted = true;
        }
        $hoguera = $candidata['hoguera'];
        $uiddb = $candidata['uid'];
    }
}

if (!$isCandidata) {
    header('Location: http://www.hogueras.es');
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="../favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="../favicon-16x16.png" sizes="16x16"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Formulario Candidatas 2018 | Federació de Les Fogueres de Sant Joan</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../assets/css/material-kit.css" rel="stylesheet"/>

    <link href="../assets/css/main.css" rel="stylesheet"/>
</head>

<body>

<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a href="http://www.hogueras.es" target="_blank">
                <div class="logo-container">
                    <div class="logo">
                        <img src="../assets/img/logofederacion.png" alt="Logo Federación">
                    </div>
                </div>
            </a>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div class="wrapper">
    <div class="header header-filter"
         style="background-image: url('../assets/img/cabecera.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="title text-center">Formulario Candidatas 2018</h1>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!$isCompleted) { ?>
        <div class="main main-raised" id="formulario">
            <div class="section">
                <div class="container">
                  <h2 class="text-center title-foguera">Foguera <?php echo $hoguera; ?></h2>
                  <small class="text-center" style="margin-bottom:20px;display:block;width:100%;">Este formulario tiene que rellenarse usando el navegador <strong>Google Chrome</strong></small>
                    <form class="" id="form" action="saveCandidata.php" method="post" style="margin-bottom:50px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre completo de la candidata</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" maxlength="255" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-static">
                                    <label class="control-label">Fecha de nacimiento (dd/mm/aaaa)</label>
                                    <input class="form-control" type="date" data-date-format="dd/mm/yyyy"
                                           id="fechanac" name="fechanac" pattern="\d{1,2}/\d{1,2}/\d{4}" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="100" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Edad (auto)</label>
                                    <input id="edad" name="edad" type="text" class="form-control" readonly required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Años en la fiesta</label>
                                    <input id="anyosfiesta" name="anyosfiesta" type="number" min="0" max="100"
                                           class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">DNI</label>
                                    <input type="text" class="form-control" id="dni" name="dni" pattern="^\d{8}[a-zA-Z]$" maxlength="9" required>
                                    <p class="text-danger" id="mensajeErrorDni">DNI incorrecto</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Teléfono (Móvil)</label>
                                    <input type="tel" id="telefono" name="telefono" pattern="^[0-9]{9}$"
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" maxlength="100" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-top:20px;">
                                <p>Estudios</p>
                                <textarea class="form-control" id="estudios" name="estudios" maxlength="300"
                                          placeholder="Indicar Estudios y centro donde los cursó (máximo 300 caracteres)" rows="5"
                                          style="margin-top:-20px;" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-top:20px;">
                                <p>Situación laboral</p>
                                <textarea class="form-control" id="situacion_laboral" name="situacion_laboral"
                                          maxlength="300"
                                          placeholder="Indicar si trabaja actualmente, empresa y profesión (máximo 300 caracteres)"
                                          rows="5" style="margin-top:-20px;" required></textarea>
                            </div>
                        </div>

                        <p>Currículum festero (Indicar los años dada de alta y el cargo desempeñado)</p>

                        <div class="row clonedDatosCargo" id="datosCargo1">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Cargo</label>
                                    <select type="text" class="form-control" id="tipoCargo1" required>
                                        <option value="Bellesa infantil">Bellesa infantil</option>
                                        <option value="Bellesa del foc infantil">Bellesa del foc infantil</option>
                                        <option value="Bellesa">Bellesa adulta</option>
                                        <option value="Dama infantil">Dama infantil</option>
                                        <option value="Dama del foc infantil">Dama del foc infantil</option>
                                        <option value="Dama">Dama adulta</option>
                                        <option value="Presidenta infantil">Presidenta infantil</option>
                                        <option value="Presidenta adulta">Presidenta adulta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Año</label>
                                    <input type="number" min="1900" class="form-control" id="anyoCargo1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Foguera</label>
                                    <input type="text" class="form-control" id="hogueraCargo1" required>
                                </div>
                            </div>
                            <div class="col-md-2 rowOptions">
                                <a class="btn btn-primary btn-fab btn-fab-mini btn-round" id="add">
                                    <i class="material-icons">add</i>
                                </a>
                                <a class="btn btn-primary btn-fab btn-fab-mini btn-round" id="remove">
                                    <i class="material-icons">remove</i>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-top:20px;">
                                <p><input type="checkbox" required name="firm">La candidata está conforme con el uso de estos datos para los fines expuestos en la clausula mostrada en el pie de esta página. Este formulario de datos de caracter personal se acepta también al rellenar y entregar la hoja con el título "Cesión de derechos de imagen y datos de caracter personal".</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-top:20px;">
                                <p><input type="checkbox" required name="terms"> Acepto la <a href="http://www.hogueras.es/privacy-policy/" target="_blank">política de privacidad</a>, el <a href="http://www.hogueras.es/aviso-legal/" target="_blank">aviso legal</a> y estoy conforme con el texto mostrado en el pie del formulario.</p>
                            </div>
                        </div>

                        <button class="btn btn-success" type="submit" id="btnEnviar">Enviar</button>

                        <input type="hidden" name="uid" value="<?php echo($uid) ?>">

                    </form>

                    <p>Conforme a la Ley Orgánica 15/1999, le informamos que los datos que aparecen en el presente formulario van a ser incorporados a un  fichero responsabilidad de FEDERACIÓ DE LES FOGUERES DE SANT JOAN (en FEDERACIÓ DE FOGUERES) con la finalidad de gestionar su participación en el certamen de elección de la Bellesa del Foc de Alacant y sus actividades promocionales y de difusión anexas. A través de la aceptación del presente documento, la interesada otorga su consentimiento expreso para la recogida y el tratamiento de los datos por parte de FEDERACIÓ DE FOGUERES. Igualmente, la interesada autoriza la comunicación o cesión de los mencionados datos al Excmo. Ayuntamiento de Alicante, y a los medios de comunicación social con el mismo objeto indicado en el apartado anterior.</p>
                    <p>Si marca la casilla autoriza el tratamiento de sus datos con los fines descritos. Puede ejercitar gratuitamente los derechos de acceso, rectificación, cancelación y oposición, mediante escrito, acompañando en todo caso fotocopia del Documento Nacional de Identidad o documento equivalente, remitido por los siguientes medios: Vía fax al número 965 14 63 83. Mediante e-mail dirigido a la cuenta de correo electrónico: (federacio@hogueras.es). Mediante correo ordinario dirigido a: Secretaría General Federació de les Fogueres de Sant Joan, Casa de la Festa, Calle Bailen, nº 20, 1º piso, 03001-ALICANTE.</p>

                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="main">
            <div class="section">
                <div class="container">
                    <h2 style="text-align:center;">
                        Formulario completado
                        <br>
                        <small>Cualquier duda envía un correo a la dirección asesoriaimagen@hogueras.es</small>
                    </h2>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<footer class="footer footer-transparent">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.hogueras.es">
                        Hogueras.es
                    </a>
                </li>
                <li>
                    <a href="http://indumentaria.hogueras.es">
                        Indumentaria.hogueras.es
                    </a>
                </li>
                <li>
                    <a href="http://intranet.hogueras.es" rel="nofollow">
                        Intranet.hogueras.es
                    </a>
                </li>
                <li>
                    <a href="mailto:asesoriaimagen@hogueras.es">
                        ¿Tienes dudas?
                    </a>
                </li>
            </ul>
        </nav>
        <div class="social-area pull-right">
            <a class="btn btn-social btn-twitter btn-just-icon" href="https://twitter.com/fed_fogueres">
                <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-social btn-facebook btn-just-icon" href="https://www.facebook.com/fogueres">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a class="btn btn-social btn-google btn-just-icon" href="https://plus.google.com/b/116364503080646782264/">
                <i class="fa fa-google-plus"></i>
            </a>
        </div>
        <div class="copyright">
            &copy; 2017 Federació de Les Fogueres de Sant Joan
        </div>
    </div>
</footer>

</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="../assets/js/material-kit.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"
        type="text/javascript"></script>

<script src="../assets/js/main.js" type="text/javascript"></script>

</html>
