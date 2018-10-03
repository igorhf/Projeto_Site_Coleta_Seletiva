<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Fomulario</title>
	<meta charset="utf-8">
	<!--css-->
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <!--tabela opções de cadastros-->
	<form class="w3-container" action="" method="POST">
		<h2>ESCOLHA UMA OPÇÃO !!!</h2>
			<table>
				<tr>
					<th><input class="w3-radio" type="radio" name="opc" value="morador">Morador</th>
					<th><input class="w3-radio" type="radio" name="opc" value="catador">Catador Autonomo</th>
					<th><input class="w3-radio" type="radio" name="opc" value="cooperativas ou órgãos públicos">cooperativas ou órgãos públicos</th>					
					</tr>
				<tr>
					<td><input type="submit" name="btn" value="Click Aqui"></td>
				</tr>
			</table>
	</form>			
		<hr>
	<!--tabela moradores-->	
	<?php
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
			switch ($_POST["opc"]) {
				case 'morador':					
		?>
		<form action="insert_cadastro_fomulario.php" method="GET">			
		<h2>CADASTRO MORADOR</h2>		
		<table>			
			<tr>
				<td><label>NOME:</label><input type="text" name="nome" required="on"></td>				
			</tr>			
			<tr>
				<td><label>CPF:</label><input type="text" name="cpf" required="on"></td>
				<td><label>RG:</label><input type="text" name="rg" required="on"></td>
				<td><label>ESTADO:</label>
					<select name="estado">
						<option>AC</option>
						<option>AL</option>
						<option>AP</option>
						<option>AM</option>
						<option>BA</option>
						<option>CE</option>
						<option>DF</option>
						<option>ES</option>
						<option>GO</option>
						<option>MA</option>
						<option>MT</option>
						<option>MS</option>
						<option>MG</option>
						<option>PA</option>
						<option>PB</option>
						<option>PE</option>
						<option>PI</option>	
						<option>RJ</option>	
						<option>RN</option>	
						<option>RS</option>	
						<option>RO</option>	
						<option>RR</option>	
						<option>SC</option>	
						<option>SP</option>	
						<option>SE</option>	
						<option>TO</option>							
				    </select>
				</td>
			</tr>
			<!---->			
			<tr>
				<td>TIPO DE LIXO:</td>
			</tr>
			<tr>							
				<td>
					<input type="checkbox" name="amarelo">Metal
					<input type="checkbox" name="verde">Vidro
					<input type="checkbox" name="vermelho">Plastico					
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="azul">Papel
					<input type="checkbox" name="marrom">Organico 
					<input type="checkbox" name="laranja">Residuos Perigosos 
				</td>							
				</td>
			</tr>
			<tr>
				<td>					
					<input type="checkbox" name="preto">Madeira 
					<input type="checkbox" name="cinza">Não Reciclavel					
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="roxo">Residuos Radioativo
					<input type="checkbox" name="branco">Residuos Ambulatorios
				</td>
			</tr>
			<tr>
				<td><label>Litros MAX:</label>
					<select name="litros">
						<option value="10">10L</option>
						<option value="20">20L</option>
						<option value="60">60L</option>
						<option value="100">100L</option>
					</select>
				</td>
			</tr>			
			<tr>
				<td><label>CIDADE:</label><input type="text" name="cidade" required="on"></td>
			</tr>
			<tr>
				<td><label>CEP:</label><input type="text" name="cep" required="on"></td>
				<td><label>BAIRRO:</label><input type="text" name="bairro"></td>				
			</tr>			
			<tr>
				<td><label>NUMERO:</label><input type="text" name="numero" required="on"></td>
				<td><label>ENDEREÇO:</label><input type="text" name="endereco" required="on"></td>
				<td><label>COMPLEMENTO:</label><input type="text" name="complemento"></td>
			</tr>			
			<tr>
				<td><label>TELEFONE:</label><input type="text" name="telefone" required="on"></td>							
			</tr>			
			<tr>				
				<td><label>EMAIL:</label><input type="email" name="email" required="on"></td>				
			</tr>			
			<tr>
				<td><label>SENHA:</label><input type="password" name="senha" required="on"></td>							
			</tr>			
			<tr>
				<td><input type="submit" name="btn_morador" value="SALVAR"></td>							
			</tr>
		</table>
		</form>	    
		<?php
					break;
				/**tabela catadores**/
				case 'catador':
				?>
				<form action="insert_cadastro_fomulario.php" method="GET">	
				    <h2>CADASTRO CATADORES</h2>
					<table>					
						<tr>
							<td><label>NOME:</label><input type="text" name="nome" required="on"></td>							
						</tr>
						<tr>
							<td><label>CPF:</label><input type="text" name="cpf" required="on"></td>
						</tr>
						<tr>
							<td><label>RG:</label><input type="text" name="rg" required="on"></td>
						</tr>
						<tr>
							<td>TIPO DE LIXO:</td>
						</tr>
						<tr>							
							<td>
								<input type="checkbox" name="amarelo">Metal
								<input type="checkbox" name="verde">Vidro
								<input type="checkbox" name="vermelho">Plastico 
								<input type="checkbox" name="azul">Papel
								<input type="checkbox" name="marrom">Organico 
							</td>							
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="laranja">Residuos Perigosos 
								<input type="checkbox" name="preto">Madeira 
								<input type="checkbox" name="cinza">Não Reciclavel
								<input type="checkbox" name="roxo">Residuos Radioativo
								<input type="checkbox" name="branco">Residuos Ambulatorios
							</td>
						</tr>
						<tr>
							<td><label>Litros MAX:</label>
								<select name="litros">
									<option value="10">10L</option>
									<option value="20">20L</option>
									<option value="60">60L</option>
									<option value="100">100L</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label>TELEFONE:</label><input type="text" name="telefone" required="on"></td>
						</tr>
						
						<tr>
							<td><label>EMAIL:</label><input type="email" name="email" required="on"></td>
						</tr>
						<tr>
							<td><label>SENHA:</label><input type="password" name="senha" required="on"></td>
						</tr>
						<tr>
							<td><input type="submit" name="btn_catador" value="SALVAR"></td>
						</tr>
					</table>
				</form>		
				<?php	
					break;
				case 'cooperativas ou órgãos públicos':
				// CADASTRO COOPERATIVAS OU ÓRGÃOS PÚBLICOS
				//tabela
				?>
				<form action="insert_cadastro_fomulario.php" method="GET">	
					<h2>CADASTRO COOPERATIVAS OU ÓRGÃOS PÚBLICOS</h2>
					<table>					
						<tr>
							<td><label>NOME:</label><input type="text" name="nome" required="on"></td>							
						</tr>
						<tr>
							<td><label>CNPJ OU CPF:</label><input type="text" name="cnpj" required="on"></td>
						</tr>						
						<tr>
							<td>TIPO DE LIXO:</td>
						</tr>
						<tr>							
							<td>
								<input type="checkbox" name="amarelo">Metal
								<input type="checkbox" name="verde">Vidro
								<input type="checkbox" name="vermelho">Plastico 
								<input type="checkbox" name="azul">Papel
								<input type="checkbox" name="marrom">Organico 
							</td>							
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="laranja">Residuos Perigosos 
								<input type="checkbox" name="preto">Madeira 
								<input type="checkbox" name="cinza">Não Reciclavel
								<input type="checkbox" name="roxo">Residuos Radioativo
								<input type="checkbox" name="branco">Residuos Ambulatorios
							</td>
						</tr>
						<tr>
							<td><label>Litros MAX:</label>
								<select name="litros">
									<option value="10">10L</option>
									<option value="20">20L</option>
									<option value="60">60L</option>
									<option value="100">100L</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label>TELEFONE:</label><input type="text" name="telefone" required="on"></td>
						</tr>
						
						<tr>
							<td><label>EMAIL:</label><input type="email" name="email" required="on"></td>
						</tr>
						<tr>
							<td><label>SENHA:</label><input type="password" name="senha" required="on"></td>
						</tr>
						<tr>
							<td><input type="submit" name="btn_op" value="SALVAR"></td>
						</tr>
					</table>
				</form>		
				<?php		
					break;	
				default:
				?>
					<h2>OPÇÃO INVALIDAR !!!</h2>
				<?php					
					break;
			}
	}
	?>
	

</body>
</html>