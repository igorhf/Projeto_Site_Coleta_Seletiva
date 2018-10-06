<?php

                if ($_SESSION['usuario'] == 'catador') {

					$select=$conn->prepare("SELECT a.id, b.nome, b.cep, b.endereco, b.bairro, b.complemento, b.numero, b.amarelo, b.verde, b.vermelho, b.azul, b.marrom, b.laranja, b.preto, b.cinza, b.roxo, b.branco, b.litros,c.segunda,c.terca,c.quarta,c.quinta,c.sexta FROM associacao a 
						join morador b on b.id=a.idmorador 
						join dias c on c.id=a.iddias 
						where idcatador=:id and idempresa is null and coleta is null and aceitar is not null");	
					$select->bindParam(':id', $_SESSION['id']);					
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					if ($result==null) {// executado quando não ouver nenhuma coleta pedente
						echo "<h2>NÃO A NENHUM REGISTROS</h2>";
					}
					foreach ($result as $row) {
					?>
					<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px 8px green">
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
					<input style="display:none" type="checkbox" name="btn_usuario" value="Finalizar Coleta" checked><br>
					<input type="submit" name="btn_catador" value="FINALIZADO PEDIDO"><br><br>
					</form>
					</div>					
					<?php					
					}
					//finalizara a coleta
					if (isset($_POST['id'])) {
						try {
							$insert=$conn->prepare("UPDATE associacao SET coleta=:coleta, data=:data where id=:id");
							$finalizar = "finalizado";
							$data = date('Y-m-d');
							$insert->bindParam(':data', $data );
							$insert->bindParam(':coleta', $finalizar );
							$insert->bindParam(':id',$_POST['id']);
							$insert->execute();
						} catch (Exception $e) {
							echo "erro na finalização mdo pedido ".$e->getMessage();
						} finally{
							?>
							<script type="text/javascript">
								alert("pedido finalizado com sucesso");
							</script>
							<?php
						}						
					}
				}
                if ($_SESSION['usuario'] == 'empresa') {

					$select=$conn->prepare("SELECT a.id, b.nome, b.cep, b.endereco, b.bairro, b.complemento, b.numero, b.amarelo, b.verde, b.vermelho, b.azul, b.marrom, b.laranja, b.preto, b.cinza, b.roxo, b.branco, b.litros,c.segunda,c.terca,c.quarta,c.quinta,c.sexta FROM associacao a 
						join morador b on b.id=a.idmorador 
						join dias c on c.id=a.iddias 
						where idempresa=:id and idcatador is null and coleta is null and aceitar is not null");	
					$select->bindParam(':id', $_SESSION['id']);					
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					if ($result==null) {// executado quando não ouver nenhuma coleta pedente
						echo "<h2>NÃO A NENHUM REGISTROS</h2>";
					}
					foreach ($result as $row) {
					?>
					<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px 8px green">
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
					<input style="display:none" type="checkbox" name="btn_usuario" value="Finalizar Coleta" checked><br>
					<input type="submit" name="btn_empresa" value="FINALIZADO PEDIDO"><br><br>
					</form>
					</div>					
					<?php					
					}
					//finalizara a coleta
					if (isset($_POST['id'])) {
						try {
							$insert=$conn->prepare("UPDATE associacao SET coleta=:coleta, data=:data where id=:id");
							$finalizar = "finalizado";
							$data = date('Y-m-d');
							$insert->bindParam(':data', $data );
							$insert->bindParam(':coleta', $finalizar );
							$insert->bindParam(':id',$_POST['id']);
							$insert->execute();
						} catch (Exception $e) {
							echo "erro na finalização do pedido ".$e->getMessage();
						} finally{
							?>
							<script type="text/javascript">
								alert("pedido finalizado com sucesso");
							</script>
							<?php
						}						
					}
				}				