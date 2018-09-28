<?php
//sessaão	
session_start();
//conecxão banco de dados
require_once("configuracao_sql.php");
//tratamento login/senha
	if (isset($_POST['btn_entrar'])){
	    $erros = array();
		$login=$_POST["login"];
		$senha=$_POST["senha"];
		if (empty($login) or empty($senha)){
			$erros[] = "<li> falta ser preenchido o campo login/senha </li>";
		}
		else{
			$sql1 = $conn->prepare("SELECT * FROM morador where cpf=:login and senha=:senha");
			$sql1->bindParam(":login",$login);
			$sql1->bindParam(":senha",$senha);
			$sql1->execute();
			$result1=$sql1->fetch(PDO::FETCH_ASSOC);
            //print_r($result);
            $sql2 = $conn->prepare("SELECT * FROM catadores where cpf=:login and senha=:senha");
			$sql2->bindParam(":login",$login);
			$sql2->bindParam(":senha",$senha);
			$sql2->execute();
			$result2=$sql2->fetch(PDO::FETCH_ASSOC);
            //print_r($result);
            $sql3 = $conn->prepare("SELECT * FROM empressa where cnpj=:login and senha=:senha");
			$sql3->bindParam(":login",$login);
			$sql3->bindParam(":senha",$senha);
			$sql3->execute();
			$result3=$sql3->fetch(PDO::FETCH_ASSOC);
            //print_r($result);
            			
			if ($result1 != 0) {
				$sql = $conn->prepare("SELECT * FROM morador where cpf=:login and senha=:senha");
				$sql->bindParam(":login",$login);
			    $sql->bindParam(":senha",$senha);
				$sql->execute();
				$result=$sql->fetch(PDO::FETCH_ASSOC);
				
				$_SESSION['logado'] = true;	
				$_SESSION['id'] = $result['idUsuario'];
				$_SESSION['nome'] = $result['nome'];
				$_SESSION['usuario'] = 'morador';				
			}
			elseif ($result2 != 0) {
				$sql = $conn->prepare("SELECT * FROM catadores where cpf=:login and senha=:senha");
				$sql->bindParam(":login",$login);
			    $sql->bindParam(":senha",$senha);
				$sql->execute();
				$result=$sql->fetch(PDO::FETCH_ASSOC);
				
				$_SESSION['logado'] = true;	
				$_SESSION['id'] = $result['idCatador'];
				$_SESSION['nome'] = $result['nome'];
				$_SESSION['usuario'] = 'catadores';				
			}
			elseif ($result3 != 0) {
				$sql = $conn->prepare("SELECT * FROM empressa where cnpj=:login and senha=:senha");
				$sql->bindParam(":login",$login);
			    $sql->bindParam(":senha",$senha);
				$sql->execute();
				$result=$sql->fetch(PDO::FETCH_ASSOC);
				
				$_SESSION['logado'] = true;	
				$_SESSION['id'] = $result['idEmpressa'];
				$_SESSION['nome'] = $result['nome'];
				$_SESSION['usuario'] = 'empressa';				
			}
			else{
				$erros[] = "<li> usuario não existe </li>";
			}

		}			
	}	
?>
<!--menu tratamento de erros-->
<?php
if (!empty($erros)){
	foreach ($erros as $erro){
		echo $erro;	
	}
}