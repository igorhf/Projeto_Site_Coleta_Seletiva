<?php
$tipo_usuario = isset($_GET["tipo_usuario"]) ? $_GET["tipo_usuario"] : "";

switch ($tipo_usuario) {
	case 1:
		set_include_path(require_once("../conecxao_bd/configuracao_sql.php"));
		
		try {

			$insert = $conn->prepare("INSERT INTO morador(nome,cpf,rg,endereco,complemento,numero,cep,bairro,cidade,estado,telefone,email,senha,litros,amarelo,verde,vermelho,azul,marrom,laranja,preto,cinza,roxo,branco)VALUES(:nome,:cpf,:rg,:endereco,:complemento,:numero,:cep,:bairro,:cidade,:estado,:telefone,:email,:senha,:litros,:amarelo,:verde,:vermelho,:azul,:marrom,:laranja,:preto,:cinza,:roxo,:branco)");

			$nome = $_GET["nome"];
			$cpf = $_GET["cpf_cnpj"];
			$rg = $_GET["rg"];
			$endereco = $_GET["endereco"];
			$complemento = $_GET["complemento"];
			$numero = $_GET["numero"];
			$cep = $_GET["cep"];
			$bairro = $_GET["bairro"];
			$cidade = $_GET["cidade"];
			$estado = $_GET["estado"];
			$telefone = $_GET["telefone"];
			$email = $_GET["email"];
			$senha = $_GET["senha"];
			$litros = $_GET["litros"];

			$amarelo = isset($_GET["amarelo"]) ? "amarelo" : "";
			$verde = isset($_GET["verde"]) ? "verde" : "";
			$vermelho = isset($_GET["vermelho"]) ? "vermelho" : "";
			$azul = isset($_GET["azul"]) ? "azul" : "";
			$marrom = isset($_GET["marrom"]) ? "marrom" : "";
			$laranja = isset($_GET["laranja"]) ? "laranja" : "";
			$preto = isset($_GET["preto"]) ? "preto" : "";
			$cinza = isset($_GET["cinza"]) ? "cinza" : "";
			$roxo = isset($_GET["roxo"]) ? "roxo" : "";
			$branco = isset($_GET["branco"]) ? "branco" : "";

			$insert->bindParam(":nome", $nome);
			$insert->bindParam(":cpf", $cpf);
			$insert->bindParam(":rg", $rg);
			$insert->bindParam(":endereco", $endereco);
			$insert->bindParam(":complemento", $complemento);
			$insert->bindParam(":numero", $numero);
			$insert->bindParam(":cep", $cep);
			$insert->bindParam(":bairro", $bairro);
			$insert->bindParam(":cidade", $cidade);
			$insert->bindParam(":estado", $estado);
			$insert->bindParam(":telefone", $telefone);
			$insert->bindParam(":email", $email);
			$insert->bindParam(":senha", $senha);
			$insert->bindParam(":litros", $litros);
			$insert->bindParam(":amarelo", $amarelo);
			$insert->bindParam(":verde", $verde);
			$insert->bindParam(":vermelho", $vermelho);
			$insert->bindParam(":azul", $azul);
			$insert->bindParam(":marrom", $marrom);
			$insert->bindParam(":laranja", $laranja);
			$insert->bindParam(":preto", $preto);
			$insert->bindParam(":cinza", $cinza);
			$insert->bindParam(":roxo", $roxo);
			$insert->bindParam(":branco", $branco);

			$insert->execute();
		} catch (Exception $e) {
			echo "erro ao inserir " . $e->getMessage();
		} finally {
			set_include_path(header('Location:../index.php'));
		}
		break;
	case 2:
		set_include_path(require_once("../conecxao_bd/configuracao_sql.php"));

		try {

			$insert = $conn->prepare("INSERT INTO catador(nome,cpf,rg,telefone,email,senha,litros,amarelo,verde,vermelho,azul,marrom,laranja,preto,cinza,roxo,branco)VALUES(:nome,:cpf,:rg,:telefone,:email,:senha,:litros,:amarelo,:verde,:vermelho,:azul,:marrom,:laranja,:preto,:cinza,:roxo,:branco)");

			$nome = $_GET["nome"];
			$cpf = $_GET["cpf_cnpj"];
			$rg = $_GET["rg"];
			$telefone = $_GET["telefone"];
			$email = $_GET["email"];
			$senha = $_GET["senha"];
			$litros = $_GET["litros"];

			$amarelo = isset($_GET["amarelo"]) ? "amarelo" : "";
			$verde = isset($_GET["verde"]) ? "verde" : "";
			$vermelho = isset($_GET["vermelho"]) ? "vermelho" : "";
			$azul = isset($_GET["azul"]) ? "azul" : "";
			$marrom = isset($_GET["marrom"]) ? "marrom" : "";
			$laranja = isset($_GET["laranja"]) ? "laranja" : "";
			$preto = isset($_GET["preto"]) ? "preto" : "";
			$cinza = isset($_GET["cinza"]) ? "cinza" : "";
			$roxo = isset($_GET["roxo"]) ? "roxo" : "";
			$branco = isset($_GET["branco"]) ? "branco" : "";

			$insert->bindParam(":nome", $nome);
			$insert->bindParam(":cpf", $cpf);
			$insert->bindParam(":rg", $rg);
			$insert->bindParam(":telefone", $telefone);
			$insert->bindParam(":email", $email);
			$insert->bindParam(":senha", $senha);
			$insert->bindParam(":litros", $litros);
			$insert->bindParam(":amarelo", $amarelo);
			$insert->bindParam(":verde", $verde);
			$insert->bindParam(":vermelho", $vermelho);
			$insert->bindParam(":azul", $azul);
			$insert->bindParam(":marrom", $marrom);
			$insert->bindParam(":laranja", $laranja);
			$insert->bindParam(":preto", $preto);
			$insert->bindParam(":cinza", $cinza);
			$insert->bindParam(":roxo", $roxo);
			$insert->bindParam(":branco", $branco);

			$insert->execute();
		} catch (Exception $e) {
			echo "erro ao inserir " . $e->getMessage();
		} finally {
			set_include_path(header('Location:../index.php'));
		}
		break;
	case 3:
		set_include_path(require_once("../conecxao_bd/configuracao_sql.php"));

		try {
			$insert = $conn->prepare("INSERT INTO empresa(nome,cnpj,telefone,email,senha,litros,amarelo,verde,vermelho,azul,marrom,laranja,preto,cinza,roxo,branco)VALUES(:nome,:cnpj,:telefone,:email,:senha,:litros,:amarelo,:verde,:vermelho,:azul,:marrom,:laranja,:preto,:cinza,:roxo,:branco)");

			$nome = $_GET["nome"];
			$cnpj = $_GET["cpf_cnpj"];
			$telefone = $_GET["telefone"];
			$email = $_GET["email"];
			$senha = $_GET["senha"];
			$litros = $_GET["litros"];

			$amarelo = isset($_GET["amarelo"]) ? "amarelo" : "";
			$verde = isset($_GET["verde"]) ? "verde" : "";
			$vermelho = isset($_GET["vermelho"]) ? "vermelho" : "";
			$azul = isset($_GET["azul"]) ? "azul" : "";
			$marrom = isset($_GET["marrom"]) ? "marrom" : "";
			$laranja = isset($_GET["laranja"]) ? "laranja" : "";
			$preto = isset($_GET["preto"]) ? "preto" : "";
			$cinza = isset($_GET["cinza"]) ? "cinza" : "";
			$roxo = isset($_GET["roxo"]) ? "roxo" : "";
			$branco = isset($_GET["branco"]) ? "branco" : "";

			$insert->bindParam(":nome", $nome);
			$insert->bindParam(":cnpj", $cnpj);
			$insert->bindParam(":telefone", $telefone);
			$insert->bindParam(":email", $email);
			$insert->bindParam(":senha", $senha);
			$insert->bindParam(":litros", $litros);
			$insert->bindParam(":amarelo", $amarelo);
			$insert->bindParam(":verde", $verde);
			$insert->bindParam(":vermelho", $vermelho);
			$insert->bindParam(":azul", $azul);
			$insert->bindParam(":marrom", $marrom);
			$insert->bindParam(":laranja", $laranja);
			$insert->bindParam(":preto", $preto);
			$insert->bindParam(":cinza", $cinza);
			$insert->bindParam(":roxo", $roxo);
			$insert->bindParam(":branco", $branco);

			$insert->execute();
		} catch (Exception $e) {
			echo "erro ao inserir " . $e->getMessage();
		} finally {
			set_include_path(header('Location:../index.php'));
		}
		break;

	default:
		echo "erro ao cadastrr usuario";
		break;
}
