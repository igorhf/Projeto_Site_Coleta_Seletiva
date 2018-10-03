<?php

if ($_SESSION['usuario'] == "morador") {
	$select=$conn->prepare("SELECT a.id,c.nome,c.cpf,b.nome,b.cnpja,a.data FROM associacao a join empresa b on b.id=a.idempressa join morador c on c.id=a.idmorador where a.idmorador=:id and a.data is not null");
	$select->bindParam('id', $_SESSION['id']);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);
	echo "<h2>HISTORICO DE COLETA FEITA POR EMPRESA</h2>";
	if ($result==null) {
		echo "<h2>não a nenhum registro</h2>";
	}
	foreach ($result as $row) {
		?>
		<div class="rel" style="display: inline-block;border: 1px solid; margin: 5px 5px; box-shadow: 2px 2px green">
		<?php
		echo "<strong>ID</strong>: ".$row['id']."<br>";
		echo "<strong>NOME MORADOR:</strong>: ".$row['nome']."<br>";
		echo "<strong>CPF MORADOR</strong>: ".$row['cpf']."<br>";
		echo "<strong>NOME EMPRESA</strong>: ".$row['nome']."<br>";
		echo "<strong>CNPJ EMPRESA</strong>: ".$row['cnpj']."<br>";
		echo "<strong>DATA DA FINALIZAÇÃO DA COLETA</strong>: ".$row['data']."<br>";
		?>
		</div>
		<?php
	}
}