$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var tabela = $('#tabela_contratos').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: '/contratos/list',
            columns: [
            { data: null, name: 'order' },
            { data: 'empresa_contratada_nome', name: 'empresa_contratada_nome' },
            { data: 'empresa_contratada_cnpj', name: 'empresa_contratada_cnpj' },
            { data: 'numero_contrato', name: 'numero_contrato' },
            { data: 'data_inicio_contrato', name: 'data_inicio_contrato' },
            { data: 'data_vencimento_contrato', name: 'data_vencimento_contrato' },
            { data: 'valor_contratado', name: 'valor_contratado' },
            { data: 'tipo', name: 'tipo' },
            { data: 'acao', name: 'acao' }

            ],
            createdRow : function( row, data, index ) {
                row.id = "item-" + data.id;
            },

            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            scrollX: true,
            sorting: [[ 1, "asc" ]],
            responsive: true,
            lengthMenu: [
                [10, 15, -1],
                [10, 15, "Todos"]
            ],
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "<div><i class='fa fa-circle-o-notch fa-spin' style='font-size:38px;'></i> <span style='font-size:20px; margin-left: 5px'> Carregando...</span></div>",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            columnDefs : [
              { targets : [0,8], sortable : false },
              { "width": "5%", "targets": 0 }, //nome
              { "width": "15%", "targets": 1 },//cnpj
              { "width": "15%", "targets": 2 },//número do contrato
              { "width": "15%", "targets": 3 },//vencimento do contrato
              { "width": "15%", "targets": 4 },
              { "width": "15%", "targets": 5 },
              { "width": "15%", "targets": 6 },
              { "width": "15%", "targets": 7 },
              { "width": "15%", "targets": 8 } // acao
            ]
    });

    tabela.on('draw.dt', function() {
        tabela.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = tabela.page.info().page * tabela.page.info().length + i + 1;
        });
    }).draw();

    //Ver
    $(document).on('click', '.btnVer', function() {
        $('#empresa_contratada_nome-visualizar').text($(this).data('empresa_contratada_nome')); // # pego no visualizar.blade.php e data pego no Controller(botao)
        $('#empresa_contratada_cnpj-visualizar').text($(this).data('empresa_contratada_cnpj'));
        $('#numero_contrato-visualizar').text($(this).data('numero_contrato'));
        $('#data_inicio_contrato-visualizar').text($(this).data('data_inicio_contrato'));
        $('#data_vencimento_contrato-visualizar').text($(this).data('data_vencimento_contrato'));
        $('#valor_contratado-visualizar').text($(this).data('valor_contratado'));
        $('#tipo-visualizar').text($(this).data('tipo'));
        jQuery('#visualizar-modal').modal('show');
    });

    //Editar
    $(document).on('click', '.btnEditar', function() {
        //alert('voce clicou');
        /*$('#tombo-visualizar').text($(this).data('tombo'));
        $('#tipo_equipamento-visualizar').text($(this).data('tipo_equipamento'));
        $('#data-visualizar').text($(this).data('data'));
        $('#usuario-visualizar').text($(this).data('usuario'));
        $('#destino-visualizar').text($(this).data('destino'));
        $('#status-visualizar').text($(this).data('status'));
        $('#local-visualizar').text($(this).data('destino'));
        $('#descricao-visualizar').text($(this).data('descricao'));*/

        $('.modal-footer .btn-action').removeClass('add');
        $('.modal-footer .btn-action').addClass('edit');
        $('.modal-title').text('Editar Cadastro de Contrato');
        $('.callout').addClass("hidden"); //ocultar a div de aviso
        $('.callout').find("p").text(""); //limpar a div de aviso

        var btnEditar = $(this);

        $('#form :input').each(function(index,input){
            $('#'+input.id).val($(btnEditar).data(input.id));
        });


        jQuery('#criar_editar-modal').modal('show'); //Abrir o modal
        //jQuery('#visualizar-modal').modal('show');
    });

    //Deletar
  /*  $(document).on('click', '.btnDeletar', function() {
        alert('voce clicou');
        /*$('#tombo-visualizar').text($(this).data('tombo'));
        $('#tipo_equipamento-visualizar').text($(this).data('tipo_equipamento'));
        $('#data-visualizar').text($(this).data('data'));
        $('#usuario-visualizar').text($(this).data('usuario'));
        $('#destino-visualizar').text($(this).data('destino'));
        $('#status-visualizar').text($(this).data('status'));
        $('#local-visualizar').text($(this).data('destino'));
        $('#descricao-visualizar').text($(this).data('descricao'));
*/
        //jQuery('#visualizar-modal').modal('show');
  //  });

    //Excluir
    $(document).on('click', '.btnDeletar', function() {
        $('.modal-title').text('Excluir Contrato');
        $('.id_del').val($(this).data('id'));
        jQuery('#excluir-modal').modal('show'); //Abrir o modal
    });

    //Adicionar
    $(document).on('click', '.btnAdicionarContratos', function() {
        $('.modal-footer .btn-action').removeClass('edit');
        $('.modal-footer .btn-action').addClass('add');

        $('.modal-title').text('Novo Cadastro de Contrato');
        $('.callout').addClass("hidden");
        $('.callout').find("p").text("");

        $('#form')[0].reset();

        jQuery('#criar_editar-modal').modal('show');

    });

    $('.modal-footer').on('click', '.add', function() {

        var dados = new FormData($("#form")[0]); //pega os dados do form
        console.log(dados);

        $.ajax({
            type: 'post',
            url: "./contratos/store",
            data: dados,
            processData: false,
            contentType: false,
            beforeSend: function(){
                jQuery('.add').button('loading');
            },
            complete: function() {
                jQuery('.add').button('reset');
            },
            success: function(data) {
                 //Verificar os erros de preenchimento
                if ((data.errors)) {

                    $('.callout').removeClass('hidden'); //exibe a div de erro
                    $('.callout').find('p').text(""); //limpa a div para erros successivos

                    $.each(data.errors, function(nome, mensagem) {
                            $('.callout').find("p").append(mensagem + "</br>");
                    });

                } else {

                    $('#tabela_contratos').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Contrato Adicionado com Sucesso!',
                        });
                    });

                }
            },

            error: function() {
                jQuery('#criar_editar-modal').modal('hide'); //fechar o modal

                iziToast.error({
                    title: 'Erro Interno',
                    message: 'Operação Cancelada!',
                });
            },

        });
    }); // fim do adicionar

    // Editar
    $('.modal-footer').on('click', '.edit', function() {
        var dados = new FormData($("#form")[0]); //pega os dados do form
        console.log(dados);

        $.ajax({
            type: 'post',
            url: "./contratos/update",
            data: dados,
            processData: false,
            contentType: false,
            beforeSend: function(){
                jQuery('.edit').button('loading');
            },
            complete: function() {
                jQuery('.edit').button('reset');
            },
            success: function(data) {
                 //Verificar os erros de preenchimento
                if ((data.errors)) {

                    $('.callout').removeClass('hidden'); //exibe a div de erro
                    $('.callout').find('p').text(""); //limpa a div para erros successivos

                    $.each(data.errors, function(nome, mensagem) {
                            $('.callout').find("p").append(mensagem + "</br>");
                    });

                } else {

                   $('#tabela_contratos').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Contrato Atualizado com Sucesso!',
                        });
                    });

                }
            },

            error: function() {
                jQuery('#criar_editar-modal').modal('hide'); //fechar o modal

                iziToast.error({
                    title: 'Erro Interno',
                    message: 'Operação Cancelada!',
                });
            },
        });
    }); // Fim modal Editar

    /*
    $(document).on('click', '.ret', function() {
        $('.callout').addClass("hidden"); //ocultar a div de aviso
        $('.callout').find("p").text(""); //limpar a div de aviso

        $('#retirar_veiculo').text($(this).data('veiculos'));
        $('.id_ret').val($(this).data('id'));
        jQuery('#retirar-modal').modal('show'); //Abrir o modal
    }); */

    //excluir

    $('.modal-footer').on('click', '.del', function() {

        $.ajax({
            type: 'post',
            url: './contratos/delete',
            data: {
                'id': $("#del").val(),
            },
            beforeSend: function(){
                jQuery('.del').button('loading');
            },
            complete: function() {
                jQuery('.del').button('reset');
            },
            success: function(data) {
                $('#tabela_contratos').DataTable().row('#item-' + data.id).remove().draw(); //remove a linha e ordena
                jQuery('#excluir-modal').modal('hide'); //fechar o modal

                $(function() {

                    iziToast.success({
                        title: 'OK',
                        message: 'Contrato Excluído com Sucesso!',
                    });
                });
            },
            error: function() {

                jQuery('#excluir-modal').modal('hide'); //fechar o modal

                iziToast.error({
                    title: 'Erro Interno',
                    message: 'Operação Cancelada!',
                });
            },

        });
    });



});
