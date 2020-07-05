<?php
include("front/header.php");
//login
require_once("menu/login.php");
/**menu**/
if (!isset($_SESSION['logado'])) {
	if (isset($_GET['cadastro_usuario'])) {
		include("formulario/formulario.php");
	} else {
		include("inc/login.php");
		include("inc/modal.php");
	}	
} else {
	include("inc/informacao_login.php");
?>

	<div class="div_2">
	<?php
}
$opc = isset($_POST['btn_usuario']) ? $_POST['btn_usuario'] : "";
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

		//essa opção os catadores e empresas, podera finalizar as coletas
	case 'Finalizar Coleta':
		require("sub_menu/Finalizar_Coleta.php");
		break;

	default:
		# code...
		break;
}
	?>

	</div>
	</div>
	<?php
	include("front/footer.php");
	?>