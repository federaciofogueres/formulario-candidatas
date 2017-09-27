<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Formulario Candidatas 2017 | Federació de Les Fogueres de Sant Joan</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body class="tutorial-page">

<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button id="menu-toggle" type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar bar1"></span>
        <span class="icon-bar bar2"></span>
        <span class="icon-bar bar3"></span>
      </button>
      <a href="http://www.creative-tim.com">
           <div class="logo-container">
                <div class="brand">
                    Candidatas 2017
                </div>
            </div>
      </a>
    </div>

  </div><!-- /.container-fluid -->
</nav>

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h1 class="title text-center">Formulario Elecció de la Bellesa del Foc 2017</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="main main-raised">
		<div class="section">
	        <div class="container">


						<form class="" action="" method="post">


				<div class="row">
					<div class="col-md-12">
							<div class="form-group label-floating">
								<label class="control-label">Nombre de la candidata</label>
								<input type="text" class="form-control" required>
							</div>
					</div>
				</div>

					<div class="row">
						<div class="col-md-4">
							<input class="form-control" type="date" id="fechanac" name="fechanac"/>
						</div>
						<div class="col-md-4">
							<div class="form-group label-floating">
								<label class="control-label">Ciudad</label>
								<input type="text" class="form-control" required>
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
								<input id="anyosfiesta" name="anyosfiesta" type="text" class="form-control" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group label-floating">
								<label class="control-label">DNI</label>
								<input type="text" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group label-floating">
								<label class="control-label">Teléfono</label>
								<input type="tel" pattern="^\d{4}-\d{3}-\d{4}$" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group label-floating">
								<label class="control-label">Email</label>
								<input type="email" class="form-control" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12" style="margin-top:20px;">
							<p>Situación laboral</p>
							<textarea class="form-control" maxlength="300" placeholder="Indicar si trabaja actualmente, empresa y profesión" rows="5" style="margin-top:-20px;" required></textarea>
						</div>
					</div>

					<div class="row">
						<p>Currículum festero (Indicar los años dada de alta y el cargo desempeñado)</p>
						<div class="col-md-4">
							<div class="form-group label-floating">
								<label class="control-label">Cargo</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group label-floating">
								<label class="control-label">Año</label>
								<input type="year" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group label-floating">
								<label class="control-label">Foguera</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-2">
							<a class="btn btn-primary btn-fab btn-fab-mini btn-round">
								<i class="material-icons">favorite</i>
							</a>
						</div>
					</div>

					<button class="btn btn-success" type="submit">Enviar</button>

				</form>

        </div>
	    </div>
	</div>

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
					<a href="mailto:asesoriaimagen@hogueras.es">
						¿Tienes dudas?
					</a>
				</li>
            </ul>
        </nav>
        <div class="social-area pull-right">
            <a class="btn btn-social btn-twitter btn-just-icon" href="https://twitter.com/CreativeTim">
                <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-social btn-facebook btn-just-icon" href="https://www.facebook.com/CreativeTim">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a class="btn btn-social btn-google btn-just-icon" href="https://plus.google.com/+CreativetimPage">
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js" type="text/javascript"></script>

	<script>
		$(document).ready(function(){
			$('#fechanac').on('change', function(e){
				var date = $('#fechanac').val();
				date = moment(date, "YYYY-MM-DD");
				var age = moment().diff(date, 'years');
				$('#edad').val(age);
				$('#edad').trigger("change");
			});
			$(window).on('scroll', materialKit.checkScrollForTransparentNavbar);
			// $('#fechanac').datepicker({
			// 	weekStart:2
			// });
		});
</script>
</html>
