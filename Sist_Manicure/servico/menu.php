<?php
	ob_start();
	session_start();

	include_once "../cabecalho.php";
	include_once "../banner.php";
	
	/*//PARA ELIMINAR OS ERROS REPORTADOS 
	error_reporting(0);
	ini_set(“display_errors”, 0 );*/

?>
<!-- CSS DE ESTILO-->
<link href="../css/estilo.css" rel="stylesheet">	
<h2></h2>
<section id="menu_serv">
	<!-- # # # # # # # # # # CADASTRO DE SERVIÇOS # # # # # # # # # # -->
	<article id="menuServico">
	
		<button> <a href = 'busServicos.php'>Serviços</a></button>
			
	</article>
	
	
	<!-- # # # # # # # # # # CADASTRO TIPO DE SERVIÇOS # # # # # # # # # # -->
	<aside id="menuTipoServ">
	
		<button> <a href = 'busTipServ.php'>Tipos de Serviços</a></button>
	
	</aside>
			
</section>

<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>
