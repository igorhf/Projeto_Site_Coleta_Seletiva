$(document).ready(function () {

    // mask         
    $('input[name=telefone]').keypress(function () {
        $(this).mask('(00) 00000-0000');
    });

    $('input[name=cpf_cnpj]').keypress(function () {
        $(this).mask('000.000.000-00');
    });

    $('input[name=rg]').keypress(function () {
        $(this).mask('999999999');
    });

    $('input[name=cep]').keypress(function () {
        $(this).mask('99.999-99');
    });

    $('input[name=nome]').keypress(function () {
        if ((event.charCode == 32) ||
            (event.charCode > 64 && event.charCode < 91) ||
            (event.charCode > 96 && event.charCode < 123) ||
            (event.charCode > 191 && event.charCode <= 255) // letras com acentos
        ) {
            return true;
        } else {
            return false;
        }
    });

    // VALIDANDO CPF
    jQuery.validator.addMethod("cpf_cnpj", function (value, element) {
        value = jQuery.trim(value);

        value = value.replace('.', '');
        value = value.replace('.', '');
        cpf = value.replace('-', '');
        while (cpf.length < 11) cpf = "0" + cpf;
        var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
        var a = [];
        var b = new Number;
        var c = 11;
        for (i = 0; i < 11; i++) {
            a[i] = cpf.charAt(i);
            if (i < 9) b += (a[i] * --c);
        }
        if ((x = b % 11) < 2) {
            a[9] = 0
        } else {
            a[9] = 11 - x
        }
        b = 0;
        c = 11;
        for (y = 0; y < 10; y++) b += (a[y] * c--);
        if ((x = b % 11) < 2) {
            a[10] = 0;
        } else {
            a[10] = 11 - x;
        }

        var retorno = true;
        if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

        return this.optional(element) || retorno;

    }, "Informe um CPF válido");


    // VALIDANDO DATA
    jQuery.validator.addMethod(
        "data_i",
        function (value, element) {
            var check = false;
            var re = /^\d{1,2}\-\d{1,2}\-\d{4}$/;
            if (re.test(value)) {
                var adata = value.split('-');
                var dd = parseInt(adata[0], 10);
                var mm = parseInt(adata[1], 10);
                var yyyy = parseInt(adata[2], 10);
                var xdata = new Date(yyyy, mm - 1, dd);
                if ((xdata.getFullYear() === yyyy) && (xdata.getMonth() === mm - 1) && (xdata.getDate() === dd)) {
                    check = true;
                } else {
                    check = false;
                }
            } else {
                check = false;
            }
            return this.optional(element) || check;
        },
        "Formato de data incorreto"
    );

    var formulario = $(".formulario");
    if (formulario.length) {
        formulario.validate({
            rules: {
                nome: {
                    required: true,
                    maxlength: 80,
                    minlength: 2
                },
                telefone: {
                    required: true,
                    maxlength: 15,
                    minlength: 15
                },
                email: {
                    required: true,
                    email: true
                },
                idade: {
                    required: true,
                    maxlength: 2,
                    minlength: 2
                },
                cpf_cnpj: {
                    cpf_cnpj: true,
                    required: true
                },
                rg: {
                    rg: true,
                    required: true,
                    minlength: 9,
                    maxlength: 9
                },
                cep: {
                    cep: true,
                    required: true,
                    minlength: 10
                },
                numero: {
                    numero: true,
                    required: true,
                    maxlength: 10
                }

            },
            messages: {
                telefone: {
                    minlength: jQuery.validator.format("Telefone invalidor!")
                }
            },highlight: function (element) {
                $(element).parent().addClass('error');
                $(".form-group").removeClass('error');
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('error')
            }
        });
    }



    $("#btn_reset").click(function (e) {
        e.preventDefault();

        document.getElementById("formulario").reset();
    });

    $("#btn_cadastro").click(function (e) {
        e.preventDefault();

        $.post('result_cadastro.php', {
            //$("form[name=formulario]").serialize()
            nome: $('input[name=nome]').val(),
            telefone: $('input[name=telefone]').val(),
            email: $('input[name=email]').val(),
            idade: $('input[name=idade]').val(),
            cpf: $('input[name=cpf]').val(),
            sexo: $('select[name=sexo]').val(),
            data_inicio: $('input[name=data_i]').val()
        }, function (data, textStatus, xhr) {
            if (textStatus == 'success') {
                if (data.cadastro_efetuado) {
                    window.location.href = "painel.php";
                    $("#resposta").html('<div class="alert alert-success">' + data.mensagem + '</div>');
                } else {
                    $("#resposta").html('<div class="alert alert-danger">' + data.mensagem + '</div>');
                }
            }
        }, 'json');

    });

});