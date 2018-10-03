<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Pagina Principal</title>
	<meta charset="utf-8">
	<!--Jquery-->
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<!--css-->
	<link rel="stylesheet" type="text/css" href="css/logo.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>
	<!--logo-->
	<div class="logo">
		<img src="img/logo.png">	
	</div>
	<?php
	//login
	require_once("menu/login.php");	
	/**menu**/
	if(!isset($_SESSION['logado'])){	
	?>	
	<nav class="menu">
		<form method="POST">
		<ol>
			<li>Login: <input type="text" name="login" placeholder="CPF ou CNPJ"></li>
			<li>Senha: <input type="password" name="senha" placeholder="Senha" size="10"></li>
			<li><input type="submit" name="btn_entrar" value="Entrar"></li>
			<li><a href="formulario/formulario.php" target="_blank">Cadastre-se</a></li>
		</ol>
		</form>	
	</nav>	
	<?php
	}
	else{
	?>	
	<nav class="menu">
		<form method="POST">
		<ol>
			<li><a href="#"><?php print_r(strtoupper($_SESSION['usuario'])); ?></a></li>			
			<li><a href="#"><?php print_r(strtoupper($_SESSION['nome'])); ?></a></li>			
			<li><a href="menu/deslogar.php">Sair</a></li>
			<li><a href="formulario/formulario.php" target="_blank">Cadastre-se</a></li>
		</ol>
		</form>	
	</nav>
	<!--sub-menu-->
	<div class="sub_menu">
		<div class="div_1">
			<form method="POST">			
				<input class="btn_sub_menu" type="submit" name="btn_usuario" value="Marcar dia da Coleta"><br>				
				<input class="btn_sub_menu" type="submit" name="btn_usuario" value="Aceitar Coleta"><br>
				<input class="btn_sub_menu" type="submit" name="btn_usuario" value="Classificar Atendimento"><br>
				<input class="btn_sub_menu" type="submit" name="btn_usuario" value="Historicos das Coletas">			
			</form>
		</div>
		<div class="div_2">			
			<?php
			$opc=isset($_POST['btn_usuario'])?$_POST['btn_usuario']:"";
			switch ($opc) {
				//essa opção e validar a moradores, onde eles podera marcar o dia da coleta. informando a catador e empresa e o lixo esta cheio 
				case 'Marcar dia da Coleta':
				require("sub_menu/Marcar_dia_da_Coleta.php");
					break;
					
				//aceita coletas, onde os moradores,catadores e empresas podera aceita o pedido de ambos.
				//catadores e empresas. finalizara o pedido de coleta
				case 'Aceitar Coleta':				
				require("sub_menu/Aceitar_Coleta.php");
					break;

				//Classificar Atendimento, quando catador ou empresa, finalizar a coleta o morador, catador e empresa ambos poderam da uma classificação do atendimento e deixa comentario.	
				case 'Classificar Atendimento':				
				require("sub_menu/Classificar_Atendimento.php");					
					break;

				//moradores,catadores e empresas, ambos iram ver os historicos das coletas	
				case 'Historicos das Coletas':					
				require("sub_menu/Historicos_das_Coletas.php");
					break;	

				default:
					# code...
					break;
			}
			?>
		</div>
	</div>	
	<?php
	}
	?>
	<!----------------------------------------------------------------------->
</body>
</html>