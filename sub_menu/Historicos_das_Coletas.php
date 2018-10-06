<?php

if ($_SESSION['usuario'] == "morador") {
	echo "<div style="."display:". "block".">";	
	echo "<div>";
	$select=$conn->prepare("SELECT a.id,b.nome,b.cnpj,a.cortida2,a.comentario2,a.data,a.coleta FROM associacao a join empresa b on b.id=a.idempresa where a.data is not null and a.coleta is not null and a.idmorador=:id  and a.idempresa is not null and a.comentario2 is not null and a.cortida2 is not null ");
	$select->bindParam('id', $_SESSION['id']);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);	
	echo "<h2>HISTORICO DA COLETA FEITO POR EMPRESA</h2>";	
	if ($result==null) {// se não tiver nenhum historico
			echo "<h2>NÃO A NENHUM HISTORICO</h2>";
		}
	foreach ($result as $row) {
		?>
		<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px 8px green">
		<?php		
		echo "<strong>ID</strong>: ".$row['id']."<br>";
		echo "<strong>NOME EMPRESA</strong>: ".$row['nome']."<br>";
		echo "<strong>CNPJ EMPRESA</strong>: ".$row['cnpj']."<br>";		
		echo "<strong>DATA DA FINALIZAÇÃO DA COLETA</strong>: ".$row['data']."<br>";
		echo "<hr>";		
		echo "<strong>NOTA RECEBIDA</strong>: ".$row['cortida2']."<br>";
		echo "<strong>COMENTARIO</strong>: ".$row['comentario2']."<br>";
		?>
		</div>
		<?php
	}
	echo "</div>";	
	//HISTORICO DO MORADOR FEITO POR CATADO
	echo "<div>";	
	$select=$conn->prepare("SELECT a.id,b.nome,b.cpf,a.cortida2,a.comentario2,a.data,a.coleta FROM associacao a join catador b on b.id=a.idmorador where a.data is not null and a.coleta is not null and a.idmorador=:id and a.idcatador is not null and a.comentario2 is not null and a.cortida2 is not null ");
	$select->bindParam('id', $_SESSION['id']);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);	
	echo "<h2>HISTORICO DA COLETA FEITO POR CATADORES</h2>";	
	if ($result==null) {// se não tiver nenhum historico
			echo "<h2>NÃO A NENHUM HISTORICO</h2>";
		}
	foreach ($result as $row) {
		?>
		<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px 8px green">
		<?php		
		echo "<strong>ID</strong>: ".$row['id']."<br>";
		echo "<strong>NOME CATADOR</strong>: ".$row['nome']."<br>";
		echo "<strong>CPF CATADOR</strong>: ".$row['cpf']."<br>";		
		echo "<strong>DATA DA FINALIZAÇÃO DA COLETA</strong>: ".$row['data']."<br>";
		echo "<hr>";		
		echo "<strong>NOTA RECEBIDA</strong>: ".$row['cortida2']."<br>";
		echo "<strong>COMENTARIO</strong>: ".$row['comentario2']."<br>";
		?>
		</div>
		<?php
	}
}
    echo "</div>";
echo "</div>";    
if ($_SESSION['usuario'] == "catador") {
	$select=$conn->prepare("SELECT a.id,b.nome,b.cpf,a.cortida1,a.comentario1,a.data,a.coleta FROM associacao a join morador b on b.id=a.idmorador where a.data is not null and a.coleta is not null and a.idcatador=:id  and a.comentario1 is not null and a.cortida1 is not null ");
	$select->bindParam('id', $_SESSION['id']);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);	
	echo "<h2>HISTORICO DA COLETA</h2>";
	if ($result==null) {// se não tiver nenhum historico
			echo "<h2>NÃO A NENHUM HISTORICO</h2>";
		}
	foreach ($result as $row) {
		?>
		<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px 8px green">
		<?php		
		echo "<strong>ID</strong>: ".$row['id']."<br>";
		echo "<strong>NOME MORADOR</strong>: ".$row['nome']."<br>";
		echo "<strong>CPF MORADOR</strong>: ".$row['cpf']."<br>";		
		echo "<strong>DATA DA FINALIZAÇÃO DA COLETA</strong>: ".$row['data']."<br>";
		echo "<hr>";		
		echo "<strong>NOTA RECEBIDA</strong>: ".$row['cortida1']."<br>";
		echo "<strong>COMENTARIO</strong>: ".$row['comentario1']."<br>";
		?>
		</div>
		<?php
	}
}
if ($_SESSION['usuario'] == "empresa") {
	$select=$conn->prepare("SELECT a.id,b.nome,b.cpf,a.cortida1,a.comentario1,a.data,a.coleta FROM associacao a join morador b on b.id=a.idmorador where a.data is not null and a.coleta is not null and a.idempresa=:id  and a.comentario1 is not null and a.cortida1 is not null ");
	$select->bindParam('id', $_SESSION['id']);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);	
	echo "<h2>HISTORICO DA COLETA</h2>";
	if ($result==null) {// se não tiver nenhum historico
			echo "<h2>NÃO A NENHUM HISTORICO</h2>";
		}
	foreach ($result as $row) {
		?>
		<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px 8px green">
		<?php		
		echo "<strong>ID</strong>: ".$row['id']."<br>";
		echo "<strong>NOME MORADOR</strong>: ".$row['nome']."<br>";
		echo "<strong>CPF MORADOR</strong>: ".$row['cpf']."<br>";		
		echo "<strong>DATA DA FINALIZAÇÃO DA COLETA</strong>: ".$row['data']."<br>";
		echo "<hr>";		
		echo "<strong>NOTA RECEBIDA</strong>: ".$row['cortida1']."<br>";
		echo "<strong>COMENTARIO</strong>: ".$row['comentario1']."<br>";
		?>
		</div>
		<?php
	}
}