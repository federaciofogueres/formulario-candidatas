<?php
include_once("../includes/db.conf.php");
include_once("../lib/getCandidata.php");
$isCandidata = false;
$isCompleted = false;
if (!empty($_GET["uid"]) && strlen($_GET["uid"]) == 8) {
    $uid = $_GET["uid"];
    $candidata = getCandidata($uid, 'infantil');
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

    <title>Formulario Candidatas Infantiles 2019 | Federació de Les Fogueres de Sant Joan</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <?php include("../includes/styles.php"); ?>

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
                    <h1 class="title text-center">Formulario Candidatas Infantiles 2019</h1>
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
                    <?php include("../includes/chromeAdvise.php"); ?>
                    <form class="" id="form" action="../lib/saveCandidata.php" method="post" style="margin-bottom:50px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre completo de la candidata *</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" maxlength="255" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-static">
                                    <label class="control-label">Fecha de nacimiento (dd/mm/aaaa) *</label>
                                    <input class="form-control" type="date" data-date-format="dd/mm/yyyy"
                                           id="fechanac" name="fechanac" pattern="\d{1,2}/\d{1,2}/\d{4}" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ciudad *</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="100" required>
                                </div>
                            </div>                            
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Años en la fiesta *</label>
                                    <input id="anyosfiesta" name="anyosfiesta" type="number" min="0" max="100"
                                           class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group label-floating">
                                  <label class="control-label">Nombre completo padre/madre  *</label>
                                  <input type="text" id="nombre_padre" name="nombre_padre" class="form-control" required>
                              </div>
                          </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre completo padre/madre</label>
                                    <input type="text" id="nombre_madre" name="nombre_madre" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre completo del tutor legal</label>
                                    <input type="text" id="nombre_patria_potestad" name="nombre_patria_potestad" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group label-floating">
                                  <label class="control-label">Teléfono del padre/madre (Móvil) (Para Whatsapp) *</label>
                                  <input type="tel" id="telefono_padre" name="telefono_padre" pattern="^[0-9]{9}$" class="form-control" required>
                              </div>
                          </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Teléfono del padre/madre (Móvil)</label>
                                    <input type="tel" id="telefono_madre" name="telefono_madre" pattern="^[0-9]{9}$" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Teléfono del tutor legal (Móvil)</label>
                                    <input type="tel" id="telefono_patria_potestad" name="telefono_patria_potestad" pattern="^[0-9]{9}$" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-top:20px;">
                                <p>Estudios *</p>
                                <textarea class="form-control" id="estudios" name="estudios" maxlength="300"
                                          placeholder="Indicar Estudios y centro donde los cursó (máximo 300 caracteres)" rows="5"
                                          style="margin-top:-20px;" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-top:20px;">
                                <p>Aficiones y/o actividades extraescolares *</p>
                                <textarea class="form-control" id="aficiones" name="aficiones"
                                          maxlength="300"
                                          placeholder="Indicar qué tipo de actividad realiza y dónde (máximo 300 caracteres)"
                                          rows="5" style="margin-top:-20px;" required></textarea>
                            </div>
                        </div>

                        <p>Currículum festero (Indicar los años dada de alta y el cargo desempeñado) *</p>

                        <div class="row clonedDatosCargo" id="datosCargo1">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Cargo</label>
                                    <select type="text" class="form-control" id="tipoCargo1" required>
                                        <option value="Bellesa infantil">Bellesa infantil</option>
                                        <option value="Dama infantil">Dama infantil</option>
                                        <option value="Presidenta infantil">Presidenta infantil</option>
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
                                <p><input type="checkbox" required name="parents">Los tutores legales que figuran en el presente formulario están conformes con el uso de estos datos para los fines expuestos en la clausula mostrada en el pie de esta página. Este formulario de datos de caracter personal se acepta también al rellenar y entregar la hoja con el título "Cesión de derechos de imagen y datos de caracter personal".</p>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-12" style="margin-top:20px;">
                                <p><input type="checkbox" required name="terms"> Acepto la <a href="http://www.hogueras.es/privacy-policy/" target="_blank">política de privacidad</a>, el <a href="http://www.hogueras.es/aviso-legal/" target="_blank">aviso legal</a> y estoy conforme con la clausula mostrada en el pie de esta página.</p>
                            </div>
                        </div>

                        <button class="btn btn-success" type="submit" id="btnEnviar">Enviar</button>

                        <input type="hidden" name="uid" value="<?php echo($uid) ?>">
                        <input type="hidden" name="type" value="infantil">

                    </form>

                </div>
            </div>
        </div>
    <?php } else { 
            include('../includes/formCompleted.php');
        } ?>

</div>
<footer class="footer footer-transparent">
        <?php include('../includes/footer.php'); ?>
</footer>

</body>

<?php include('../includes/scripts.php'); ?>

</html>
