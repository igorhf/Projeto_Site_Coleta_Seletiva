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
	require_once("login.php");	
	/**menu**/
	if(!isset($_SESSION['logado'])){	
	?>	
	<nav class="menu">
		<form method="POST">
		<ol>
			<li>Login: <input type="text" name="login" placeholder="CPF ou CNPJ"></li>
			<li>Senha: <input type="password" name="senha" placeholder="Senha" size="10"></li>
			<li><input type="submit" name="btn_entrar" value="Entrar"></li>
			<li><a href="formulario.php" target="_blank">Cadastro</a></li>
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
			<li><a href="#"><?php print_r($_SESSION['nome']); ?></a></li>			
			<li><a href="deslogar.php">Sair</a></li>
			<li><a href="formulario.php" target="_blank">Cadastro</a></li>
		</ol>
		</form>	
	</nav>
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
				case 'Marcar dia da Coleta':
				if ($_SESSION['usuario']=='morador') {
				
					?>
					<form action="#" method="POST">
						<h2>1º ADICIONAR AGENDAMENTO</h2>
						<table>
							<tr>
								<td><label>SEGUNDA:</label><input type="checkbox" name="segunda"></td>
								<td><label>TERÇA:</label><input type="checkbox" name="terca"></td>
								<td><label>QUARTA:</label><input type="checkbox" name="quarta"></td>
								<td><label>QUINTA:</label><input type="checkbox" name="quinta"></td>
								<td><label>SEXTA:</label><input type="checkbox" name="sexta"></td>
								<td style="display:none"><input type="checkbox" name="btn_usuario" value="Marcar dia da Coleta" checked></td>
								<td><input type="submit" name="btn_dias" value="SALVAR"></td>
							</tr>
						</table>
					</form>
					<?php
					if($_SERVER["REQUEST_METHOD"] === "POST"){
						if(isset($_POST['btn_dias'])){
						try {
							$insert=$conn->prepare("INSERT INTO dias(segunda,terca,quarta,quinta,sexta)VALUES(:segunda,:terca,:quarta,:quinta,:sexta)");

							$segunda=isset($_POST['segunda'])?"segunda":"";
							$terca=isset($_POST['terca'])?'terca':"";
							$quarta=isset($_POST['quarta'])?'quarta':"";
							$quinta=isset($_POST['quinta'])?'quinta':"";
							$sexta=isset($_POST['sexta'])?'sexta':"";

							$insert->bindParam(":segunda",$segunda);
							$insert->bindParam(":terca",$terca);
							$insert->bindParam(":quarta",$quarta);
							$insert->bindParam(":quinta",$quinta);
							$insert->bindParam(":sexta",$sexta);

							$insert->execute();

						} catch (Exception $e) {
							echo "erro no cadastro".$e->getMessage();
						}
						}									
					}
					//dias cadastrado
					$select=$conn->prepare("SELECT * FROM dias");
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					?>
					<form method="POST">
						<h2>2º AGENDAR DIA DA COLETA</h2>
					<select name="dias">					
					<?php
					foreach ($result as $row) {						
							echo "<option value=".$row['id'].">".$row['id'].": ".$row['segunda'].", ".$row['terca'].", ".$row['quarta'].", ".$row['quinta'].", ".$row['sexta']."</option>";												
					}					
					?>
					</select>
					<input style="display:none" type="checkbox" name="btn_usuario" value="Marcar dia da Coleta" checked>
					<input type="submit" name="btn_agendar_dias" value="agendar dias">
					</form>
					<?php					
				}else{
					echo "<h2>essa opção so poder ser usada por moradores</h2>";
				}
				if (isset($_POST['btn_agendar_dias'])) {			
				$insert=$conn->prepare("INSERT INTO associacao(idmorador,iddias)VALUES(:morador,:dias)");
				$idmorador=$_SESSION['id'];
				$iddias=$_POST['dias'];
				$insert->bindParam(":morador",$idmorador);
				$insert->bindParam(":dias",$iddias);
				$insert->execute();	
				}
					break;
				//////aceita coletas///////////////////////////////////////////////////////////////////////////////////
				case 'Aceitar Coleta':
				/////morador///////////////////////////////////////////////////////////////////////////////////////////
				if($_SESSION['usuario'] == 'morador'){	
					//codigo que traz todos os pedidos das empressas									
					$select=$conn->prepare("SELECT a.id,c.nome,c.cnpj,c.telefone,c.email from associacao a join empressa c on c.id=a.idempressa where a.idempressa is not null and a.aceitar is null");
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					?>					
					<h2>EMPRESSAS</h2>										
					<?php
					if ($result==null) {// se não tiver algum pedido de confirmação de pedido de coletas, esse codigo sera executado
						echo "<h2>não a nenhum registros</h2>";
					}
					//ira trazer todos os pedidos que aguarda as confirmações
					foreach ($result as $row) {						
					?>
					<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px green">
					<form method="POST">
					<?php	
					echo "<strong>ID</strong>: ".$row['id']."<br>";
					echo "<strong>NOME</strong>: ".$row['nome']."<br>";
					echo "<strong>CPF</strong>: ".$row['cnpj']."<br>";
					echo "<strong>TELEFONE</strong>: ".$row['telefone']."<br>";
					echo "<strong>EMAIL</strong>: ".$row['email']."<br>";
					echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";
					?>					
					<input style="display:none" type="checkbox" name="btn_usuario" value="Aceitar Coleta" checked><br>
					<input type="submit" name="btn_empressa" value="ACEITAR PEDIDO"><br><br>
					</form>
					</div>			
					<?php
					}
					//codigo que traz todos os pedidos dos catadores
					$select=$conn->prepare("SELECT a.id,b.nome,b.cpf,b.telefone,b.email from associacao a join catadores b on b.id=a.idcatador where a.idcatador is not null and a.aceitar is null");
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					?>
					<br><br><br><br><br><br><br><br>					
					<h2>CATADORES</h2>										
					<?php
					if ($result==null) {// se não tiver algum pedido de confirmação de pedido de coletas, esse codigo sera executado
						echo "<h2>não a nenhum registros</h2>";
					}
					//ira trazer todos os pedidos que aguarda as confirmações
					foreach ($result as $row) {						
					?>
					<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px green">
					<form method="POST">
					<?php	
					echo "<strong>ID</strong>: ".$row['id']."<br>";
					echo "<strong>NOME</strong>: ".$row['nome']."<br>";
					echo "<strong>CPF</strong>: ".$row['cpf']."<br>";
					echo "<strong>TELEFONE</strong>: ".$row['telefone']."<br>";
					echo "<strong>EMAIL</strong>: ".$row['email']."<br>";
					echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";
					?>					
					<input style="display:none" type="checkbox" name="btn_usuario" value="Aceitar Coleta" checked><br>
					<input type="submit" name="btn_catador" value="ACEITAR PEDIDO"><br><br>
					</form>
					</div>					
					<?PHP					
					}					
					?>					
					<?php
					///faz a comfirmação do pedido, catadores e empressas
					try {
						if (isset($_POST['id'])) {
						$insert=$conn->prepare("UPDATE associacao SET aceitar=:aceitar where id=:id");
						$aceito="aceito";
						$insert->bindParam(':aceitar', $aceito);
						$insert->bindParam(':id',$_POST['id']);
						$insert->execute();
					}	
					} catch (Exception $e) {
						echo "erro na aceitação do pedido ".$e->getMessage();
					}
					
					}
				//////catadores/////////////////////////////////////////////////////////////////////////////////////
				if ($_SESSION['usuario'] == 'catadores') {
					$select=$conn->prepare("SELECT * FROM morador");
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row) {
					?>
					<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px green">
					<form method="POST">
					<?php	
					echo "<strong>ID</strong>: ".$row['id']."<br>";
					echo "<strong>NOME</strong>: ".$row['nome']."<br>";
					echo "<strong>CPF</strong>: ".$row['cpf']."<br>";
					echo "<strong>TELEFONE</strong>: ".$row['telefone']."<br>";
					echo "<strong>EMAIL</strong>: ".$row['email']."<br>";
					echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";
					?>					
					<input style="display:none" type="checkbox" name="btn_usuario" value="Aceitar Coleta" checked><br>
					<input type="submit" name="btn_catador" value="ACEITAR PEDIDO"><br><br>
					</form>
					</div>	
					<?php
					}
				}
				//empressa/////////////////////////////////////////////////////////////////////////////////////////////////
				if ($_SESSION['usuario'] == 'empressa') {	
					//codigo responsavel por trazer todos os agendamentos dos moradores, e fazer as comparação de classificação				
					$select=$conn->prepare("SELECT a.id, b.nome, b.cep, b.endereco, b.bairro, b.complemento, b.numero, b.amarelo, b.verde, b.vermelho, b.azul, b.marrom, b.laranja, b.preto, b.cinza, b.roxo, b.branco, b.litros,c.segunda,c.terca,c.quarta,c.quinta,c.sexta, a.idcatador!=null and a.idempressa!=null and a.idmorador FROM associacao a 
						join morador b on b.id=a.idmorador join dias c on c.id=a.iddias where idcatador is  null and idempressa is  null");

					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $row) {
					?>
					<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px green">
					<form method="POST">
					<?php	
					echo "<strong>ID</strong>: ".$row['id']."<br>";
					echo "<strong>NOME</strong>: ".$row['nome']."<br>";
					echo "<strong>CEP</strong>: ".$row['cep']."<br>";
					echo "<strong>BAIRRO</strong>: ".$row['bairro']."<br>";
					echo "<strong>ENDEREÇO</strong>: ".$row['endereco']."<br>";
					echo "<strong>NUMERO</strong>: ".$row['numero']."<br>";
					echo "<strong>COMPLEMENTO</strong>: ".$row['complemento']."<br>";
					echo "<strong>DIAS DAS COLETAS</strong>: ".$row['segunda'].", ".$row['terca'].", ".$row['quarta'].", ".$row['quinta'].", ".$row['sexta']."<br>";
					echo "<strong>TIPOS DE LIXOS</strong>: ".$row['amarelo'].", ".$row['verde'].", ".$row['vermelho'].", ".$row['azul'].", ".$row['marrom'].", ".$row['laranja'].", ".$row['preto'].", ".$row['cinza'].", ".$row['roxo'].", ".$row['branco']."<br>";
					echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";
					echo "<strong>LITROS</strong>: ".$row['litros']."<br>";
					?>					
					<input style="display:none" type="checkbox" name="btn_usuario" value="Aceitar Coleta" checked><br>
					<input type="submit" name="btn_empressa" value="ACEITAR PEDIDO"><br><br>
					</form>
					</div>	
					<?php
					//aceita o pedido do morador, mais aguardara a confirmação do morador
					if (isset($_POST['id'])) {
						$insert=$conn->prepare("UPDATE associacao SET idempressa=:idempressa where id=:id");
						$insert->bindParam(':idempressa',$_SESSION['id']);
						$insert->bindParam(':id',$_POST['id']);
						$insert->execute();
					}
					}
				}					
					break;
				case 'Classificar Atendimento':
				if ($_SESSION['usuario']=="morador") {
					$select=$conn->prepare("SELECT  a.id,c.nome,c.cnpj,a.aceitar,a.cortida2,a.comentario2 from associacao a 
						join morador b on b.id=a.idmorador 
						join empressa c on c.id=a.idempressa 
						where a.aceitar is not null and a.cortida2 is null and a.comentario2 is null and a.idmorador=:id");
					
					$select->bindParam(':id', $_SESSION['id']);
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					?>
					<h2>EMPRESSAS</h2>
					<?php
					if ($result==null) {// se não tiver algum pedido de confirmação de pedido de coletas, esse codigo sera executado
						echo "<h2>não a nenhum registros</h2>";
					}
					foreach ($result as $row) {
						?>
						<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px green">
						<form method="POST">
						<?php
						echo "<strong>ID</strong>: ".$row['id']."<br>";
						echo "<strong>NOME</strong>: ".$row['nome']."<br>";
						echo "<strong>CNPJ</strong>: ".$row['cnpj']."<br>";
						echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";						
						?>
						<label>LIKE: </label><br>
						<label>1: </label><input type="radio" name="like" value="1"><br>
						<label>2: </label><input type="radio" name="like" value="2"><br>
						<label>3: </label><input type="radio" name="like" value="3"><br>
						<label>4: </label><input type="radio" name="like" value="4"><br>
						<label>5: </label><input type="radio" name="like" value="5"><br>
						<label>COMENTARIO: </label><br>
						<textarea rows="5" cols="50" name="comentario"></textarea>
						<br>
						<input style="display:none" type="checkbox" name="btn_usuario" value="Classificar Atendimento" checked><br>
						<input type="submit" name="btm_Classificar_Atendimento_morador" value="SALVA">	
						</form>	
						</div>
						<?php
					}
						$select=$conn->prepare("SELECT  a.id,c.nome,c.cnpj,a.aceitar,a.cortida2,a.comentario2 from associacao a 
						join morador b on b.id=a.idmorador 
						join empressa c on c.id=a.catador 
						where a.aceitar is not null and a.cortida2 is null and a.comentario2 is null and a.idmorador=:id");
					
					$select->bindParam(':id', $_SESSION['id']);
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					?>
					<h2>CATADORES</h2>
					<?php
					if ($result==null) {// se não tiver algum pedido de confirmação de pedido de coletas, esse codigo sera executado
						echo "<h2>não a nenhum registros</h2>";
					}
					foreach ($result as $row) {
						?>
						<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px green">
						<form method="POST">
						<?php
						echo "<strong>ID</strong>: ".$row['id']."<br>";
						echo "<strong>NOME</strong>: ".$row['nome']."<br>";
						echo "<strong>CNPJ</strong>: ".$row['cnpj']."<br>";
						echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";						
						?>
						<label>LIKE: </label><br>
						<label>1: </label><input type="radio" name="like" value="1"><br>
						<label>2: </label><input type="radio" name="like" value="2"><br>
						<label>3: </label><input type="radio" name="like" value="3"><br>
						<label>4: </label><input type="radio" name="like" value="4"><br>
						<label>5: </label><input type="radio" name="like" value="5"><br>
						<label>COMENTARIO: </label><br>
						<textarea rows="5" cols="50" name="comentario"></textarea>
						<br>
						<input style="display:none" type="checkbox" name="btn_usuario" value="Classificar Atendimento" checked><br>
						<input type="submit" name="btm_Classificar_Atendimento_morador" value="SALVA">	
						</form>	
						</div>
						<?php
					}
				}
				if (isset($_POST['btm_Classificar_Atendimento_morador'])) {
						$update=$conn->prepare("UPDATE associacao SET cortida2=:cortida2,comentario2=:comentario2 where id=:id");
						$update->bindParam(':cortida2',$_POST['like']);
						$update->bindParam(':comentario2',$_POST['comentario']);
						$update->bindParam(':id',$_POST['id']);
						$update->execute();
					}	
					
					break;
				case 'Historicos de Coletas':
					# code...
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