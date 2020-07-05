<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e4ca97;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sub menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <form method="POST">
            <?php
            if ($_SESSION['usuario'] == "morador") {
              echo '<input class="btn_sub_menu" type="submit" name="btn_usuario" value="Marcar dia da Coleta"><br>';
            }
            ?>
            <input class="btn_sub_menu" type="submit" name="btn_usuario" value="Aceitar Coleta"><br>
            <input class="btn_sub_menu" type="submit" name="btn_usuario" value="Finalizar Coleta"><br>
            <input class="btn_sub_menu" type="submit" name="btn_usuario" value="Classificar Atendimento"><br>
            <input class="btn_sub_menu" type="submit" name="btn_usuario" value="Historicos das Coletas">
          </form>
        </div>
      </li>
    </ul>
    <a class="navbar-brand" href="#"><?php print_r(strtoupper($_SESSION['usuario'])); ?></a>
    <a class="navbar-brand" href="#"><?php print_r(strtoupper($_SESSION['nome'])); ?></a>
    <a class="btn btn-outline-success my-2 my-sm-0" href="menu/deslogar.php">Sair</a>
  </div>
</nav>
<br>