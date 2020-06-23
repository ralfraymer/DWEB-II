$(document).ready(function () {
    renderTabela()

    function renderTabela() {
        $.getJSON("/api/v1/produtos", function (data, status) {
            let tabela = $("#tableProdutosBody")
            $("#tableProdutosBody tr").remove()
            $.each(data, function (i, f) {
                tabela.append(
                    "<tr data-id='" + f.id + "'><th scope='row'>" +
                    f.id +
                    "</th><td>" +
                    f.nome +
                    "</td><td>" +
                    f.descricao +
                    "</td><td>" +
                    f.categoria +
                    "</td><td class='text-center'>" +
                    f.quantidade +
                    "</td><td class='text-center'>" +
                    f.valor +
                    "</td><td class='d-flex justify-content-center'>" +
                    "<button class='btn-alterar btn btn-sm btn-primary mr-2'>Alterar</button>" +
                    "<button class='btn-deletar btn btn-sm btn-danger'>Excluir</button>" +
                    "</td></tr >"
                )
            })
        })
    }

    function limparCampos() {
        $('input[name="nome"]').val("")
        $('input[name="categoria"]').val("")
        $('textarea[name="descricao"]').val("")
        $('input[name="quantidade"]').val("")
        $('input[name="valor"]').val("")
    }

    $('#btnModal').click(function () {
        if ($("#titleModal").text() !== "Adicionar Produtos") {
            $("#titleModal").text("Adicionar Produtos")
            limparCampos()
            $('#btnAlterarProduto').hide()
            $('#btnSalvarProduto').show()
        }
    })

    $("#btnSalvarProduto").click(function () {
        $.ajax({
            url: '/api/v1/produto',
            type: "POST",
            data: {
                'nome': $('input[name="nome"]').val(),
                'categoria': $('input[name="categoria"]').val(),
                'descricao': $('textarea[name="descricao"]').val(),
                'quantidade': $('input[name="quantidade"]').val(),
                'valor': $('input[name="valor"]').val()
            }
        })
            .then(function (response) {
                renderTabela()
                limparCampos()
                $("#modalAdicionar").modal('toggle');
            })
            .catch(function (err) {
                console.log(err)
            })
    })

    $(document).on("click", '.btn-deletar', function () {
        var id = $(this).closest('tr').data('id')
        if (confirm("Clique em ok para excluir o produto " + id + "!")) {
            $.ajax({
                url: '/api/v1/produto/' + id,    
                method: "delete",
                contentType: 'application/json; charset=utf-8',
                dataType: 'text'
            })
                .done(function (response) {
                    $("tr[data-id='" + id + "']").remove()
                })
                .fail(function (err) {
                });
        }
    });

    $(document).on("click", '.btn-alterar', function () {
        var id = $(this).closest('tr').data('id');
        $.getJSON("/api/v1/produto/" + id, function (data, status) {
            limparCampos();
            $("#titleModal").text("Alterar Produto " + id)
            $('#btnSalvarProduto').hide()
            $('#btnAlterarProduto').show()
            $.each(data, function (i, f) {
                $('#btnAlterarProduto').attr("data-id", f.id)
                $('input[name="nome"]').val(f.nome)
                $('input[name="categoria"]').val(f.categoria)
                $('textarea[name="descricao"]').val(f.descricao)
                $('input[name="quantidade"]').val(f.quantidade)
                $('input[name="valor"]').val(f.valor)
                $("#modalAdicionar").modal('toggle')
            })
        })
    })

    $("#btnAlterarProduto").click(function () {
        var id = $(this).data('id')
        $.ajax({
            url: '/api/v1/produto/' + id,
            type: "PUT",
            data: {
                'nome': $('input[name="nome"]').val(),
                'categoria': $('input[name="categoria"]').val(),
                'descricao': $('textarea[name="descricao"]').val(),
                'quantidade': $('input[name="quantidade"]').val(),
                'valor': $('input[name="valor"]').val()
            }
        })
            .done(function (response) {
                renderTabela()
                limparCampos()
                $("#modalAdicionar").modal('toggle');
            })
            .fail(function (err) {
                console.log(err)
            });
    })
})
