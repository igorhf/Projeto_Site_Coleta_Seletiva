<?php
/////morador///////////////////////////////////////////////////////////////////////////////////////////
				if($_SESSION['usuario'] == 'morador'){	
					//busca todos os agendamentos do usuario													
					$select=$conn->prepare("SELECT a.id,c.nome,c.cnpj,c.telefone,c.email from associacao a join empresa c on c.id=a.idempresa where a.idempresa is not null and a.aceitar is null");
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					?>					
					<h2>EMPRESAS</h2>										
					<?php
					if ($result==null) {// se não tiver algum pedido de confirmação, esse codigo sera executado
						echo "<h2>NÃO A NENHUM REGISTROS</h2>";
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
					<input type="submit" name="btn_morador" value="ACEITAR PEDIDO"><br><br>
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
					if ($result==null) {// se não tiver algum pedido de confirmação, esse codigo sera executado
						echo "<h2>NÃO A NENHUM REGISTROS</h2>";
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
				if (isset($_POST['id'])) {
					try {						
						$insert=$conn->prepare("UPDATE associacao SET aceitar=:aceitar where id=:id");
						$aceito="aceito";
						$insert->bindParam(':aceitar', $aceito);
						$insert->bindParam(':id',$_POST['id']);
						$insert->execute();
					} catch (Exception $e) {
						echo "erro na aceitação do pedido ".$e->getMessage();
					} finally{
						?>
						<script type="text/javascript">
							alert("pedido aceito com sucesso");
						</script>
						<?php
					    }					
				    }
			    }
				//////catadores/////////////////////////////////////////////////////////////////////////////////////
				if ($_SESSION['usuario'] == 'catador') {
					$select=$conn->prepare("SELECT a.id, b.nome, b.cep, b.endereco, b.bairro, b.complemento, b.numero, b.amarelo, b.verde, b.vermelho, b.azul, b.marrom, b.laranja, b.preto, b.cinza, b.roxo, b.branco, b.litros,c.segunda,c.terca,c.quarta,c.quinta,c.sexta, a.idcatador!=null and a.idempresa!=null and a.idmorador FROM associacao a 
						join morador b on b.id=a.idmorador 
						join dias c on c.id=a.iddias 
						where idcatador is  null and idempresa is  null");					
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					if ($result==null) {// se não tiver algum pedido de confirmação, esse codigo sera executado
						echo "<h2>NÃO A NENHUM REGISTROS</h2>";
					}
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
					<input type="submit" name="btn_catador" value="ACEITAR PEDIDO"><br><br>
					</form>
					</div>						
					<?php					
					}
					//aceita o pedido do morador, mais aguardara a confirmação do morador
					if (isset($_POST['id'])) {
						try {
							$insert=$conn->prepare("UPDATE associacao SET idcatador=:idcatador where id=:id");
							$insert->bindParam(':idcatador',$_SESSION['id']);
							$insert->bindParam(':id',$_POST['id']);
							$insert->execute();
						} catch (Exception $e) {
							echo "erro na aceitação do pedido ".$e->getMessage();
						} finally{
							?>
							<script type="text/javascript">
								alert("pedido aceito com sucesso");
							</script>
							<?php
						}					
					}
				}
				//empressa/////////////////////////////////////////////////////////////////////////////////////////////////
				if ($_SESSION['usuario'] == 'empresa') {	
					//codigo responsavel por trazer todos os agendamentos dos moradores, e fazer as comparação de classificação				
					$select=$conn->prepare("SELECT a.id, b.nome, b.cep, b.endereco, b.bairro, b.complemento, b.numero, b.amarelo, b.verde, b.vermelho, b.azul, b.marrom, b.laranja, b.preto, b.cinza, b.roxo, b.branco, b.litros,c.segunda,c.terca,c.quarta,c.quinta,c.sexta, a.idcatador!=null and a.idempresa!=null and a.idmorador FROM associacao a 
						join morador b on b.id=a.idmorador join dias c on c.id=a.iddias where idcatador is  null and idempresa is  null");

					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					if ($result==null) {// se não tiver algum pedido de confirmação, esse codigo sera executado
						echo "<h2>NÃO A NENHUM REGISTROS</h2>";
					}
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
					<input type="submit" name="btn_empresa" value="ACEITAR PEDIDO"><br><br>
					</form>
					</div>						
					<?php				
					}
					//aceita o pedido do morador, mais aguardara a confirmação do morador
					if (isset($_POST['id'])) {
						try {
							$insert=$conn->prepare("UPDATE associacao SET idempresa=:idempresa where id=:id");
							$insert->bindParam(':idempresa',$_SESSION['id']);
							$insert->bindParam(':id',$_POST['id']);
							$insert->execute();
						} catch (Exception $e) {
							echo "erro na aceitação do pedido ".$e->getMessage();
						} finally{
							?>
							<script type="text/javascript">
								alert("pedido aceito com sucesso");
							</script>
							<?php
						}						
					}
				}	