<!--tabela opções de cadastros-->
<script>
	
</script>
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Morador</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="profile-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="profile" aria-selected="false">Catador Autonomo</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contact" aria-selected="false">cooperativas ou órgãos públicos</a>
	</li>
</ul>
<div class="tab-content" id="myTabContent"><br><br>
	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		<?php
		$tipo = 1;
		include("formulario/formulario_cadastro.php");
		?>
	</div>
	<div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="profile-tab">
		<?php
		$tipo = 2;
		include("formulario/formulario_cadastro.php");
		?>
	</div>
	<div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">
		<?php
		$tipo = 3;
		include("formulario/formulario_cadastro.php");
		?>
	</div>
</div>