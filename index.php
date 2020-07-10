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
}
$opc = isset($_GET['btn_usuario']) ? $_GET['btn_usuario'] : "";
switch ($opc) {
		//essa opção e validar a moradores, onde eles podera marcar o dia da coleta. informando a catador e empresa e o lixo esta cheio 
	case 'marcar_dia_da_coleta':
		require("sub_menu/Marcar_dia_da_Coleta.php");
		break;

		//aceita coletas, onde os moradores,catadores e empresas podera aceita o pedido de ambos.
		//catadores e empresas. finalizara o pedido de coleta
	case 'aceitar_coleta':
		require("sub_menu/Aceitar_Coleta.php");
		break;

		//Classificar Atendimento, quando catador ou empresa, finalizar a coleta o morador, catador e empresa ambos poderam da uma classificação do atendimento e deixa comentario.	
	case 'classificar_atendimento':
		require("sub_menu/Classificar_Atendimento.php");
		break;

		//moradores,catadores e empresas, ambos iram ver os historicos das coletas	
	case 'historicos_das_coletas':
		require("sub_menu/Historicos_das_Coletas.php");
		break;

		//essa opção os catadores e empresas, podera finalizar as coletas
	case 'finalizar_coleta':
		require("sub_menu/Finalizar_Coleta.php");
		break;

	default:
		# code...
		break;
}
include("front/footer.php");
