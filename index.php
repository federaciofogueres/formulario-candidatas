<?php
include_once("includes/db.conf.php");
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
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Formulario Candidatas 2017 | Federació de Les Fogueres de Sant Joan</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/material-kit.css" rel="stylesheet"/>

    <link href="assets/css/main.css" rel="stylesheet"/>
</head>

<body class="tutorial-page">

<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a href="http://www.hogueras.es" target="_blank">
                <div class="logo-container">
                    <div class="logo">
                        <img src="assets/img/logofederacion.png" alt="Logo Federación">
                    </div>
                    <div class="brand">
                    </div>
                </div>
            </a>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div class="wrapper">
    <div class="header header-filter"
         style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="title text-center">Formulario Elecció de la Bellesa del Foc 2018</h1>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!$isCompleted) { ?>
        <div class="main main-raised" id="formulario">
            <div class="section">
                <div class="container">
                    <form class="" id="form" action="saveCandidata.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre de la candidata</label>
                                    <input type="text" class="form-control" maxlength="255" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-static">
                                    <label class="control-label">Fecha de nacimiento</label>
                                    <input class="datepicker form-control" type="text" data-date-format="dd/mm/yyyy"
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
                                    <input type="text" class="form-control" id="dni" name="dni" pattern="^\d{8}[a-zA-Z]$" maxlength="9"
                                           title="Formato: 12345678A" required>
                                    <p class="text-danger" id="mensajeErrorDni">DNI incorrecto</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Teléfono</label>
                                    <input type="tel" id="telefono" name="telefono" pattern="^[0-9]{9}$"
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
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
                                        <option value="Presidenta adulta">Bellesa del foc infantil</option>
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
                                    <input type="number" min="1900" class="form-control" id="anyoCargo1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Foguera / Barraca</label>
                                    <input type="text" class="form-control" id="hogueraCargo1">
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

                        <button class="btn btn-success" type="submit" id="btnEnviar">Enviar</button>

                        <input type="hidden" name="uid" value="<?php echo($uid) ?>">

                    </form>
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
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="assets/js/material-kit.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"
        type="text/javascript"></script>

<script src="assets/js/main.js" type="text/javascript"></script>

</html>
