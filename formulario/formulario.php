<!--tabela opções de cadastros-->
<?php
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 1;
if ($tipo == 1) {
	$btn1 = "btn-success";
	$btn2 = "btn-primary";
	$btn3 = "btn-primary";
} elseif ($tipo == 2) {
	$btn1 = "btn-primary";
	$btn2 = "btn-success";
	$btn3 = "btn-primary";
} elseif ($tipo == 3) {
	$btn1 = "btn-primary";
	$btn2 = "btn-primary";
	$btn3 = "btn-success";
} else {
	$btn1 = "btn-primary";
	$btn2 = "btn-primary";
	$btn3 = "btn-primary";
}
?>
<div class="row justify-content-center">
	<div style="margin-right: 2px;" class="">
		<form action="index.php" method="GET">			
			<button type="submit" name="" class="btn btn-dark">Tela de Login</button>
		</form>
	</div><br>
	<div style="margin-right: 2px;" class="">
		<form action="index.php?cadastro_usuario=true&tipo=1" method="GET">
			<input type="hidden" name="tipo" value="1">
			<input type="hidden" name="cadastro_usuario" value="true">
			<button type="submit" name="" class="btn <?= $btn1 ?>">Morador</button>
		</form>
	</div>
	<div style="margin-right: 2px;" class="">
		<form action="index.php?cadastro_usuario=true&tipo=2" method="GET">
			<input type="hidden" name="tipo" value="2">
			<input type="hidden" name="cadastro_usuario" value="true">
			<button type="submit" name="" class="btn <?= $btn2 ?>">Catador Autonomo</button>
		</form>
	</div>
	<div class="">
		<form action="index.php?cadastro_usuario=true&tipo=3" method="GET">
			<input type="hidden" name="tipo" value="3">
			<input type="hidden" name="cadastro_usuario" value="true">
			<button type="submit" name="" class="btn <?= $btn3 ?>">cooperativas ou órgãos públicos</button>
		</form>
	</div>
</div><br>

<?php

switch ($tipo) {
	case 1:
		include("formulario/formulario_cadastro.php");
		break;
	case 2:
		include("formulario/formulario_cadastro.php");
		break;
	case 3:
		include("formulario/formulario_cadastro.php");
		break;

	default:
		# code...
		break;
}
?>
</div>