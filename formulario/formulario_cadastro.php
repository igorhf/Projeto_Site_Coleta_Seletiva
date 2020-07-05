<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="row justify-content-center">
        <!-- formulario -->
        <form class="border shadow p-3 mb-5 bg-white rounded formulario" name="formulario" action="formulario/insert_cadastro_fomulario.php" method="GET" enctype="multipart/form-data">
            <input type="hidden" name="tipo_usuario" value="<?= $tipo ?>">
            <small id="emailHelp" class="form-text text-muted">Dados pessoais</small>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">RG</label>
                    <input type="text" name="rg" class="form-control" placeholder="" required>
                </div>
                <div class="form-group col-md-4">
                    <?php
                    if ($tipo == 3) {
                        $label = "CPF ou CNPJ";
                    } else {
                        $label = "CPF";
                    }
                    ?>
                    <label for=""><?= $label ?></label>
                    <input type="text" name="cpf_cnpj" class="form-control" placeholder="" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Telefone</label>
                    <input type="text" name="telefone" class="form-control" placeholder="" required>
                </div>
            </div>
            <hr>
            <?php
            if ($tipo == 1) {
                echo '<small id="" class="form-text text-muted">Cadastro Endereço</small>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Cidade</label>
                        <input type="text" name="cidade" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Bairro</label>
                        <input type="text" name="bairro" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">CEP</label>
                        <input type="text" name="cep" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Estado</label>
                        <select class="form-control" name="estado" required>
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
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Endereço</label>
                        <input type="text" name="endereco" class="form-control" id="endereco" placeholder="" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Numero</label>
                        <input type="text" name="numero" class="form-control" id="numero" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Complemento</label>
                        <input type="text" name="complemento" class="form-control" id="complemento" placeholder="" required>
                    </div>
                </div>
                <hr>';
            }
            ?>
            <small id="emailHelp" class="form-text text-muted">TIPO DE LIXO</small>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-row">
                        <div class="form-check">
                            <input name="amarelo" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Metal
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input name="verde" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Vidro
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input name="vermelho" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Plastico
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input name="azul" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Papel
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input name="cinza" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Não Reciclavel
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-row">
                        <div class="form-check">
                            <input name="preto" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Madeira
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input name="marrom" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Organico
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input name="roxo" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Residuos Radioativo
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input name="laranja" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Residuos Perigosos
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input name="branco" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="defaultCheck1">
                                Residuos Ambulatorios
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group col-md-6">
                        <label for="litros">Litros MAX</label>
                        <select name="litros" class="form-control">
                            <option value="10">10L</option>
                            <option value="20">20L</option>
                            <option value="60">60L</option>
                            <option value="100">100L</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="" required>
                </div>
            </div>
            <button type="submit" name="btn_entrar" class="btn btn-primary col-md-2">Salvar</button><br>
        </form>
    </div>
</div>