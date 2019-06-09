
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!--viewport = para criação de sites responsivo-->
		<meta name="viewport" content="width=device-width, initial-scale=1"><!---->
		<title>Manicure e Pedicure - A Beleza está em você...</title>
		<meta name="description" content="Manicure e Pedicure - A Beleza está em você..."><!-- Descrição do site -->
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		
		<!-- JQUERY DE ESTILO -->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="js/javascript.js"></script>
		<!-- CSS DE ESTILO-->
		<link href="css/estilo.css" rel="stylesheet">	
		
	</head>
	<body>
	<header>
	
	<!--===========================================================
						SESSÃO NOME DO SITE
	=============================================================-->
	<section id="name_site" class="about-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<p> Manicure e Pedicure - A Beleza está em você</p>
				</div>
				<div class="col-lg-4 mx-auto">
					<p> Chamar Cadastrar/Logar... </p>
				</div>
			</div>
		</div>
	</section>
	
	<!--===========================================================
						SESSÃO DE MENUS
	=============================================================-->
	
	<nav>
		<!--<div class="container">	
			<div class="navbar" id="navbarResponsive">-->
				<ul>
					<li>
						<a class="nav-link js-scroll-trigger" href="#admin">Admin</a>
					</li>
					<li>
						<a class="nav-link js-scroll-trigger" href="#agenda">Agenda</a>
					</li>
					<li>
						<a class="nav-link js-scroll-trigger" href="#cliente">Cliente</a>
					</li>
					<li>
						<a class="nav-link js-scroll-trigger" href="#prestador">Prestador</a>
					</li>
					<li>
						<a class="nav-link js-scroll-trigger" href="#servico">Serviços</a>
					</li>
				</ul>
			<!--</div>
		</div>-->
	</nav>
	
	<!--===========================================================
					DIV PARA O LOGO E BOTÃO DE MENU
	=============================================================-->
	<div class="ind-botao">
		<img src="image/menu.png" alt="Botão Mobile" title="Botão Mobile">
	</div>

	<div class="ind-logo">
		<picture>
			<source media="(max-width: 480px)" srcset="image/logo_mob.png">
			<source media="(min-width: 481px) and (max-width: 768px)" srcset="image/logo_mob.png">
			<source media="(min-width: 769px)" srcset="image/Logo.png">
			<img src="image/Logo.png" alt="LogoManicure" title="LogoManicure">
		</picture>
	</div>
	
	
	</header>
	
