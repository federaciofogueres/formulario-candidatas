<?php
include_once "../includes/db.conf.php";
include_once "../lib/getCandidata.php";
$isCandidata = false;
$isCompleted = false;
if (!empty($_GET["uid"]) && strlen($_GET["uid"]) == 8) {
    $uid = $_GET["uid"];
    $candidata = getCandidata($uid, 'adulta');
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
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../favicon-16x16.png" sizes="16x16" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />

    <title>Formulario Candidatas <?php echo $candidata['anyo']+1 ?> | Federació de Les Fogueres de Sant Joan</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <?php include "../includes/styles.php"; ?>
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
        <div class="header header-filter" style="background-image: url('../assets/img/cabecera.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 class="title text-center">Formulario Candidatas <?php echo $candidata['anyo']+1 ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (!$isCompleted) { ?>
            <div class="main main-raised" id="formulario">
                <div class="section">
                    <div class="container">
                        <h2 class="text-center title-foguera">Foguera
                            <?php echo $hoguera; ?>
                        </h2>
                        <?php include "../includes/chromeAdvise.php"; ?>
                        <form class="" id="form" action="../lib/saveCandidata.php" method="post" style="margin-bottom:50px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre y apellidos de la candidata</label>
                                        <input id="nombre" name="nombre" type="text" class="form-control" maxlength="255" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-static">
                                        <label class="control-label">Fecha de nacimiento (dd/mm/aaaa)</label>
                                        <input class="form-control" pattern="\d{1,2}/\d{1,2}/\d{4}" type="date" data-date-format="dd/mm/yyyy" id="fechanac" name="fechanac" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Ciudad</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="100" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Años en la fiesta</label>
                                        <input id="anyosfiesta" name="anyosfiesta" type="number" min="0" max="100" class="form-control" required>
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
                                        <input type="tel" id="telefono" name="telefono" pattern="^[0-9]{9}$" class="form-control" required>
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
                                    <textarea class="form-control" id="estudios" name="estudios" maxlength="300" placeholder="Indicar Estudios y centro donde los cursó (máximo 300 caracteres)" rows="5" style="margin-top:-20px;" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="margin-top:20px;">
                                    <p>Situación laboral</p>
                                    <textarea class="form-control" id="situacion_laboral" name="situacion_laboral" maxlength="300" placeholder="Indicar si trabaja actualmente, empresa y profesión (máximo 300 caracteres)" rows="5" style="margin-top:-20px;" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="margin-top:20px;">
                                    <p>Observaciones</p>
                                    <p style="font-size:13px">*Esta información <strong>no será expuesta públicamente</strong>, solo se usará exclusivamente a modo informativo para la Federació de Fogueres</p>
                                    <textarea class="form-control" id="observaciones" name="observaciones" maxlength="300" placeholder="Observaciones importantes como alergias, intolerancias o información de relevancia." rows="5" style="margin-top:-20px;"></textarea>
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
                                            <option value="Vicepresidenta">Vicepresidenta</option>
                                            <option value="Secretaria">Secretaria</option>
                                            <option value="Tesorera">Tesorera</option>
                                            <option value="Delegada de Federación">Delegada de Federación</option>
                                            <option value="Delegada artística">Delegada artística</option>
                                            <option value="Delegada de bellezas">Delegada de bellezas</option>
                                            <option value="Delegada de infantiles">Delegada de infantiles</option>
                                            <option value="Federación">Federación</option>
                                            <option value="Subcomisión">Subcomisión</option>
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

                            <!-- <div class="row">
                            <div class="col-md-12" style="margin-top:20px;">
                                <p><input type="checkbox" required name="firm">La candidata está conforme con el uso de
                                    estos datos para los fines expuestos en la clausula mostrada en el pie de esta
                                    página. Este formulario de datos de caracter personal se acepta también al rellenar
                                    y entregar la hoja con el título "Cesión de derechos de imagen y datos de caracter
                                    personal".</p>
                            </div>
                        </div> -->

                            <div class="row">
                                <div class="col-md-12" style="margin-top:20px;">
                                    <p><input type="checkbox" required name="terms"> Acepto la <a href="http://www.hogueras.es/privacy-policy/" target="_blank">política de privacidad</a>, el <a href="http://www.hogueras.es/aviso-legal/" target="_blank">aviso legal</a>.</p>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit" id="btnEnviar">Enviar</button>

                            <input type="hidden" name="uid" value="<?php echo ($uid) ?>">
                            <input type="hidden" name="type" value="adulta">

                        </form>

                    </div>
                </div>
            </div>
        <?php } else {
            include '../includes/formCompleted.php';
        } ?>

    </div>
    <footer class="footer footer-transparent">
        <?php include '../includes/footer.php'; ?>
    </footer>

</body>

<?php include '../includes/scripts.php'; ?>

</html>