<?php
	ob_start();
	session_start();

	include_once "../cabecalho.php";
	include_once "../banner.php";
	
	/*//PARA ELIMINAR OS ERROS REPORTADOS 
	error_reporting(0);
	ini_set(“display_errors”, 0 );*/
	
		
	$n1 = rand(1,20);
	$n2 = rand(1,20);
	$soma = $n1+$n2;
	$_SESSION['loginADM'] = $n1+$n2;


?>
	<!-- CSS DE ESTILO-->
	<link href="../css/estilo.css" rel="stylesheet">	
	
	
	<script type="text/javascript">
    function Validar(){
		var soma = "<?php echo $soma; ?>";
		var campo = document.getElementById("loginADM").value;
		if(campo == soma){
		$_SESSION['loginADM']
		}else{
		alert("Soma incorreta");
		}
	
    }
	</script>
	
		<form action="" name="logAdmin" id='logAdmin' method="post" style="font-weight: bold; text-align:center;">
			<p>IDENTIFICAÇÃO DE USUÁRIO</P>
			CPF: <input type="text" name="CPF"/><br><br>
			Senha: <input type="password" name="senha"/><br><br>
					 
			<div>Some: <?php echo "$n1 + $n2 = "; ?></div>
			<input onblur="Validar()" type="text" name="captcha" id="captcha" maxlength="2" required="required" size="2">
			<input type="submit" onclick="Validar()" name="Enviar" value="Enviar" id="Enviar" />

		</form>

<?php

	include_once '../class/ClassConexaoAdmin.php';
	
	if(isset($_POST['CPF'])){
		//$resultado = LogAdmin($_POST['CPF'], $_POST['senha']);
		$MD5 = md5($_POST['senha']); /*variavel comparação*/
		$senha = $MD5;
		$resultado = LogAdmin($_POST['CPF'], $_POST['senha']);

		if($resultado) {			
			$_SESSION['loginADM'] = true;
			header('Location:cadAdmin.php');
		} else {
			//header("location:login.php");
			echo "Credenciais inválidas";
		}
	}
?>


<?php
	include_once "../publicidade.php";
	include_once "../rodape.php";
?>

