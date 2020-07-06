<div class="row justify-content-center">
    <!-- formulario -->
    <form class="border shadow p-3 mb-5 bg-white rounded" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="">CPF / CNPJ</label>
                <input type="text" name="login" class="form-control" placeholder="" required>
            </div>
            <div class="form-group col-md-12">
                <label for="">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="" required>
            </div>
        </div>
        <button type="submit" name="btn_entrar" class="btn btn-primary col-md-12">Entrar</button><br><br>
        <small id="" class="form-text text-muted"><a style="text-decoration: none;" href="index.php?cadastro_usuario=true&tipo=1" target="">Cadastre-se</a></small>
        <button style="display: none;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            cadastre-se
        </button>
    </form>
</div>