<?php
/////////////////moradores
				if ($_SESSION['usuario']=="morador") {
					$select=$conn->prepare("SELECT  a.id,c.nome,c.cnpj,c.telefone,c.email,a.aceitar,a.cortida2,a.comentario2 from associacao a 
						join morador b on b.id=a.idmorador 
						join empresa c on c.id=a.idempressa 
						where a.aceitar is not null and a.cortida2 is null and a.comentario2 is null and a.idmorador=:id");
					
					$select->bindParam(':id', $_SESSION['id']);
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					?>
					<h2>EMPRESAS</h2>
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
						echo "<strong>TELEFONE</strong>: ".$row['telefone']."<br>";
						echo "<strong>EMAIL</strong>: ".$row['email']."<br>";
						echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";						
						?>
						<label>LIKE: de uma nota de 1 a 5 </label><br>
					<label>1: </label><input type="radio" name="like" value="1">MUITO RUIM<br>
						<label>2: </label><input type="radio" name="like" value="2">RUIM<br>
						<label>3: </label><input type="radio" name="like" value="3">BOM<br>
						<label>4: </label><input type="radio" name="like" value="4">MUITO BOM<br>
						<label>5: </label><input type="radio" name="like" value="5">EXCELENTE<br>
						<label><strong>COMENTARIO: </strong></label><br>
						<textarea rows="5" cols="50" name="comentario"></textarea>
						<br>
						<input style="display:none" type="checkbox" name="btn_usuario" value="Classificar Atendimento" checked><br>
						<input type="submit" name="btm_Classificar_Atendimento_morador" value="SALVA">	
						</form>	
						</div>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<?php
					}
					////////////////////////divisao/////////////////////////
						$select=$conn->prepare("SELECT  a.id,c.nome,c.cpf,c.telefone,c.email,a.aceitar,a.cortida2,a.comentario2 from associacao a 
						join morador b on b.id=a.idmorador 
						join catadores c on c.id=a.idcatador 
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
						echo "<strong>CPF</strong>: ".$row['cpf']."<br>";
						echo "<strong>TELEFONE</strong>: ".$row['telefone']."<br>";
						echo "<strong>EMAIL</strong>: ".$row['email']."<br>";
						echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";						
						?>
						<label>LIKE: de uma nota de 1 a 5 </label><br>
						<label>1: </label><input type="radio" name="like" value="1">MUITO RUIM<br>
						<label>2: </label><input type="radio" name="like" value="2">RUIM<br>
						<label>3: </label><input type="radio" name="like" value="3">BOM<br>
						<label>4: </label><input type="radio" name="like" value="4">MUITO BOM<br>
						<label>5: </label><input type="radio" name="like" value="5">EXCELENTE<br>
						<label><strong>COMENTARIO: </strong></label><br>
						<textarea rows="5" cols="50" name="comentario"></textarea>
						<br>
						<input style="display:none" type="checkbox" name="btn_usuario" value="Classificar Atendimento" checked><br>
						<input type="submit" name="btm_Classificar_Atendimento_morador" value="SALVA">	
						</form>	
						</div>
						<?php
					}
				}
				////////////Classificar Atendimento//////catadores/////////////////
				if ($_SESSION['usuario']=="catador") {
					$select=$conn->prepare("SELECT  a.id,b.nome,b.cpf,a.aceitar,a.cortida1,a.comentario1 from associacao a 
						join morador b on b.id=a.idmorador 
						join catadores c on c.id=a.idcatador 
						where a.aceitar is not null and a.cortida1 is null and a.comentario1 is null and a.idcatador=:id");
					
					$select->bindParam(':id', $_SESSION['id']);
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					?>
					<h2>MORADORES</h2>
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
						echo "<strong>CPF</strong>: ".$row['cpf']."<br>";
						echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";						
						?>
						<label>LIKE: de uma nota de 1 a 5 </label><br>
						<label>1: </label><input type="radio" name="like" value="1">MUITO RUIM<br>
						<label>2: </label><input type="radio" name="like" value="2">RUIM<br>
						<label>3: </label><input type="radio" name="like" value="3">BOM<br>
						<label>4: </label><input type="radio" name="like" value="4">MUITO BOM<br>
						<label>5: </label><input type="radio" name="like" value="5">EXCELENTE<br>
						<label><strong>COMENTARIO: </strong></label><br>
						<textarea rows="5" cols="50" name="comentario"></textarea>
						<br>
						<input style="display:none" type="checkbox" name="btn_usuario" value="Classificar Atendimento" checked><br>
						<input type="submit" name="btm_Classificar_Atendimento_catador" value="SALVA">	
						</form>	
						</div>
						<?php
					}					
				}
				////////////Classificar Atendimento/////empresa//////////////////
				if ($_SESSION['usuario']=="empresa") {
					$select=$conn->prepare("SELECT  a.id,b.nome,b.cpf,a.aceitar,a.cortida1,a.comentario1 from associacao a 
						join morador b on b.id=a.idmorador 
						join empresa c on c.id=a.idempressa 
						where a.aceitar is not null and a.cortida1 is null and a.comentario1 is null and a.idempressa=:id");
					
					$select->bindParam(':id', $_SESSION['id']);
					$select->execute();
					$result=$select->fetchAll(PDO::FETCH_ASSOC);
					?>
					<h2>MORADORES</h2>
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
						echo "<strong>CNPJ</strong>: ".$row['cpf']."<br>";
						echo "<input style="."display:none"." type="."checkbox"." name="."id"." value=".$row['id']." checked>";						
						?>
						<label>LIKE: de uma nota de 1 a 5 </label><br>
						<label>1: </label><input type="radio" name="like" value="1">MUITO RUIM<br>
						<label>2: </label><input type="radio" name="like" value="2">RUIM<br>
						<label>3: </label><input type="radio" name="like" value="3">BOM<br>
						<label>4: </label><input type="radio" name="like" value="4">MUITO BOM<br>
						<label>5: </label><input type="radio" name="like" value="5">EXCELENTE<br>
						<label>COMENTARIO: </label><br>
						<textarea rows="5" cols="50" name="comentario"></textarea>
						<br>
						<input style="display:none" type="checkbox" name="btn_usuario" value="Classificar Atendimento" checked><br>
						<input type="submit" name="btm_Classificar_Atendimento_empressa" value="SALVA">	
						</form>	
						</div>
						<?php
					}					
				}
				/////adciona like e comentario
				if (isset($_POST['btm_Classificar_Atendimento_morador'])) {
						$update=$conn->prepare("UPDATE associacao SET cortida2=:cortida2,comentario2=:comentario2 where id=:id");
						$update->bindParam(':cortida2',$_POST['like']);
						$update->bindParam(':comentario2',$_POST['comentario']);
						$update->bindParam(':id',$_POST['id']);
						$update->execute();
					}
				if (isset($_POST['btm_Classificar_Atendimento_catador'])) {
						$update=$conn->prepare("UPDATE associacao SET cortida1=:cortida1,comentario1=:comentario1 where id=:id");
						$update->bindParam(':cortida1',$_POST['like']);
						$update->bindParam(':comentario1',$_POST['comentario']);
						$update->bindParam(':id',$_POST['id']);
						$update->execute();
					}
				if (isset($_POST['btm_Classificar_Atendimento_empressa'])) {
						$update=$conn->prepare("UPDATE associacao SET cortida1=:cortida1,comentario1=:comentario1 where id=:id");
						$update->bindParam(':cortida1',$_POST['like']);
						$update->bindParam(':comentario1',$_POST['comentario']);
						$update->bindParam(':id',$_POST['id']);
						$update->execute();
					}