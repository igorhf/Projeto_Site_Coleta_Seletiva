<?php
if ($_SESSION['usuario']=='morador') {
				
					?>
					<form action="#" method="POST">
						<h2>1º ADICIONAR AGENDAMENTO</h2>
						<table style="margin: auto;">
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
					<h2><select name="dias">					
					<?php
					foreach ($result as $row) {						
							echo "<option value=".$row['id'].">".$row['id'].": ".$row['segunda'].", ".$row['terca'].", ".$row['quarta'].", ".$row['quinta'].", ".$row['sexta']."</option>";												
					}					
					?>
					</select>
					<input style="display:none" type="checkbox" name="btn_usuario" value="Marcar dia da Coleta" checked>
					<input class="AgendarDias" type="submit" name="btn_agendar_dias" value="agendar dias"></h2>
					</form>
					<?php					
				}else{
					echo "<h2>ESSA OPÇÃO SÓ PODER SER USADA POR MORADORES</h2>";
				}
				if (isset($_POST['btn_agendar_dias'])) {			
				$insert=$conn->prepare("INSERT INTO associacao(idmorador,iddias)VALUES(:morador,:dias)");
				$idmorador=$_SESSION['id'];
				$iddias=$_POST['dias'];
				$insert->bindParam(":morador",$idmorador);
				$insert->bindParam(":dias",$iddias);
				$insert->execute();	
				}
				?>
				<!--codigo jquery, menssagem de confirmação-->
				<script type="text/javascript">
					$(document).ready(function(){
						$('.AgendarDias').click(function() {
							alert("aguarde a confirmação do catador ou empresa");
						});
					});
				</script>
				<?php