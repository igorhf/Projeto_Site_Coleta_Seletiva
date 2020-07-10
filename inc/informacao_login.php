<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#"><?php print_r(strtoupper($_SESSION['usuario']) . ": " . strtoupper($_SESSION['nome'])); ?></a>
  </li>
  <li class="nav-item">
    <a class=" btn btn-outline-success" href="menu/deslogar.php">Sair</a>
  </li>
</ul>
<div class="row justify-content-md-center">
  <ul class="list-group list-group-horizontal-md">
    <?php
    if ($_SESSION['usuario'] == "morador") {
      echo '<li class="list-group-item list-group-item-primary sub_menu_tipo"><a class="sub_menu_tipo" style="text-decoration: none;" href="index.php?btn_usuario=marcar_dia_da_coleta">Marcar dia da Coleta</a></li>';
    }
    ?>
    <li class="list-group-item list-group-item-primary sub_menu_tipo"><a style="text-decoration: none;" class="sub_menu_tipo" href="index.php?btn_usuario=aceitar_coleta">Aceitar Coleta</a></li>
    <li class="list-group-item list-group-item-primary sub_menu_tipo"><a style="text-decoration: none;" class="sub_menu_tipo" href="index.php?btn_usuario=classificar_atendimento">Finalizar Coleta</a></li>
    <li class="list-group-item list-group-item-primary sub_menu_tipo"><a style="text-decoration: none;" class="sub_menu_tipo" href="index.php?btn_usuario=historicos_das_coletas">Classificar Atendimento</a></li>
    <li class="list-group-item list-group-item-primary sub_menu_tipo"><a style="text-decoration: none;" class="sub_menu_tipo" href="index.php?btn_usuario=finalizar_coleta">Historicos das Coletas</a></li>
  </ul>
</div>
<br>