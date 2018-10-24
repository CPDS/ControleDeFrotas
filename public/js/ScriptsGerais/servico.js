$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); // EDITAR DE ACORDO COM VARIAVEIS DE PERCURSO NO BANCO DE DADOS

    var tabela = $('#tabela_servicos').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: '/servicos/list',
            columns: [
            { data: null, name: 'order' },
            { data: 'valor_derivados', name: 'valor_derivados' },
            { data: 'valor_pecas', name: 'valor_pecas' },
            { data: 'valor_servico', name: 'valor_servico' },
            { data: 'valor_smv', name: 'valor_smv' },
            { data: 'numero_ordem_servico', name: 'numero_ordem_servico' },
            { data: 'data_servico', name: 'data_servico' },
            { data: 'km_entrada_oficina', name: 'km_entrada_oficina' },
            { data: 'tipo_servico_manutencao', name: 'tipo_servico_manutencao' },
            { data: 'numero_smv', name: 'numero_smv' },
            { data: 'numero_lupus', name: 'numero_lupus' },
            { data: 'numero_sei', name: 'numero_sei' },
            { data: 'numero_empenho', name: 'numero_empenho' },
            { data: 'data_envio_pedido_empenho', name: 'data_envio_pedido_empenho' },
            { data: 'numero_nf', name: 'numero_nf' }, // nota fiscal
            { data: 'data_pg_nob', name: 'data_pg_nob' },
            { data: 'numero_nob', name: 'numero_nob' },
            { data: 'valor_emprenho', name: 'valor_emprenho' },
            { data: 'valor_pago', name: 'valor_pago' },
            { data: 'descricao_geral_servico', name: 'descricao_geral_servico' },
            { data: 'fk_veiculo', name: 'fk_veiculo' },
            { data: 'fk_contrato', name: 'fk_contrato' },
            { data: 'fk_motorista', name: 'fk_motorista' }
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
              { targets : [2], sortable : false },
              { "width": "5%", "targets": 0 }, //nº
              { "width": "15%", "targets": 1 },//nome
              { "width": "15%", "targets": 2 },//matricula
              { "width": "15%", "targets": 3 },//status
              { "width": "15%", "targets": 4 },
              { "width": "15%", "targets": 5 },
              { "width": "15%", "targets": 6 },
              { "width": "15%", "targets": 7 },
              { "width": "15%", "targets": 8 },
              { "width": "15%", "targets": 9 },
              { "width": "15%", "targets": 10 },
              { "width": "15%", "targets": 11 },
              { "width": "15%", "targets": 12 },
              { "width": "15%", "targets": 13 },
              { "width": "15%", "targets": 14 },
              { "width": "15%", "targets": 15 },
              { "width": "15%", "targets": 16 },
              { "width": "15%", "targets": 17 },
              { "width": "15%", "targets": 18 },
              { "width": "15%", "targets": 19 },
              { "width": "15%", "targets": 20 },
              { "width": "15%", "targets": 21 }
            ]
    });

    tabela.on('draw.dt', function() {
        tabela.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = tabela.page.info().page * tabela.page.info().length + i + 1;
        });
    }).draw();

    //Ver
    $(document).on('click', '.btnVer', function() {
        $('#fk_veiculo-visualizar').text($(this).data('Veículo')); // # pego no visualizar.blade.php e data pego no Controller(botao)
        $('#fk_contrato-visualizar').text($(this).data('Contrato'));
        $('#fk_motorista-visualizar').text($(this).data('Motorista'));
        $('#valor_derivados-visualizar').text($(this).data('Valor dos Derivados'));
        $('#valor_smv-visualizar').text($(this).data('Valor dos SMV'));
        $('#numero_ordem_servico-visualizar').text($(this).data('Nº Ordem de Serviço'));
        $('#data_servico-visualizar').text($(this).data('Data do Serviço'));
        $('#km_entrada_oficina-visualizar').text($(this).data('KM Entrada Oficina'));
        $('#numero_smv-visualizar').text($(this).data('Número SMV'));
        $('#numero_lupus-visualizar').text($(this).data('Número Lupus'));
        $('#numero_sei-visualizar').text($(this).data('Número SEI'));
        $('#numero_empenho-visualizar').text($(this).data('Número Empenho'));
        $('#data_envio_pedido_empenho-visualizar').text($(this).data('Data Envio Pedido Empenho'));
        $('#numero_nf-visualizar').text($(this).data('Número Nota Fiscal'));
        $('#data_pg_nob-visualizar').text($(this).data('Data PG NOB'));
        $('#numero_nob-visualizar').text($(this).data('Número NOB'));
        $('#valor_empenho-visualizar').text($(this).data('Valor Empenho'));
        $('#valor_pago-visualizar').text($(this).data('Valor Pago'));
        $('#descricao_geral_servico-visualizar').text($(this).data('Descrição Geral do Serviço'));
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
        $('.modal-title').text('Editar Cadastro de Serviço');
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
        $('.modal-title').text('Excluir Serviço');
        $('.id_del').val($(this).data('id'));
        jQuery('#excluir-modal').modal('show'); //Abrir o modal
    });

    //Adicionar
    $(document).on('click', '.btnAdicionarServicos', function() {
        $('.modal-footer .btn-action').removeClass('edit');
        $('.modal-footer .btn-action').addClass('add');

        $('.modal-title').text('Novo Cadastro de Servico');
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
            url: "./servicos/store",
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

                    $('#tabela_servicos').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Serviço Adicionado com Sucesso!',
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
            url: "./servicos/update",
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

                   $('#tabela_servicos').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Serviço Atualizado com Sucesso!',
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
            url: './servicos/delete',
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
                $('#tabela_servicos').DataTable().row('#item-' + data.id).remove().draw(); //remove a linha e ordena
                jQuery('#excluir-modal').modal('hide'); //fechar o modal

                $(function() {

                    iziToast.success({
                        title: 'OK',
                        message: 'Serviço Excluído com Sucesso!',
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
