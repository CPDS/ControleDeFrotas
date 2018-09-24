$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); // TENHO QUE EDITAR PARA A VIAGEM, MUDAR TUDO !!!

    var tabela = $('#tabela_viagem').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: '/viagems/list',
            columns: [
            { data: null, name: 'order' },
            { data: 'numero_rv', name: 'numero_rv' },
            { data: 'setor_emissor_rv', name: 'setor_emissor_rv' },
            { data: 'fk_veiculo', name: 'fk_veiculo' },
            { data: 'datahora_saida', name: 'datahora_saida' },
            { data: 'datahora_chegada', name: 'datahora_chegada' },
            { data: 'fk_cidade_saida', name: 'fk_cidade_saida' },
            { data: 'fk_cidade_chegada', name: 'fk_cidade_chegada' },
            { data: 'fk_tipo_servico', name: 'fk_tipo_servico' },
            { data: 'fk_id_solicitante', name: 'fk_id_solicitante' },
            { data: 'estimativa_km', name: 'estimativa_km' },
            { data: 'estado', name: 'estado' },
            { data: 'nome_responsavel', name: 'nome_responsavel' },
            { data: 'telefone_responsavel', name: 'telefone_responsavel' },
            { data: 'local_saida', name: 'local_saida' },
            { data: 'setor_autoriza_viagem', name: 'setor_autoriza_viagem' },
            { data: 'numero_passageiros', name: 'numero_passageiros' },
            { data: 'tipo_solicitacao', name: 'tipo_solicitacao' },
            { data: 'natureza_servico', name: 'natureza_servico' },
            { data: 'custo_viagem', name: 'custo_viagem' },
            { data: 'descricao_bagagem', name: 'descricao_bagagem' },
            { data: 'codigo_acp_rv', name: 'codigo_acp_rv' }
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
            columnDefs : [ // quantidade de campos maior que o exemplo, tenho que mudar?
              { targets : [2], sortable : false },
              { "width": "5%", "targets": 0 }, //nº
              { "width": "20%", "targets": 1 },//nome
              { "width": "20%", "targets": 2 },//placa
              { "width": "20%", "targets": 3 },//tipo_combustivel
              { "width": "20%", "targets": 4 },
              { "width": "20%", "targets": 5 },
              { "width": "20%", "targets": 6 },
              { "width": "20%", "targets": 7 },
              { "width": "20%", "targets": 8 },
              { "width": "20%", "targets": 9 },
              { "width": "20%", "targets": 10 },
              { "width": "20%", "targets": 11 },
              { "width": "20%", "targets": 12 },
              { "width": "20%", "targets": 13 },
              { "width": "20%", "targets": 14 },
              { "width": "20%", "targets": 15 },
              { "width": "20%", "targets": 16 },
              { "width": "20%", "targets": 17 },
              { "width": "20%", "targets": 18 },
              { "width": "20%", "targets": 19 },
              { "width": "20%", "targets": 20 },
              { "width": "20%", "targets": 21 }
            ]
    });

    tabela.on('draw.dt', function() {
        tabela.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = tabela.page.info().page * tabela.page.info().length + i + 1;
        });
    }).draw();

    //Ver
    $(document).on('click', '.btnVer', function() {
        $('#numero_rv-visualizar').text($(this).data('Nº RV')); // # pego no visualizar.blade.php e data pego no Controller(botao)
        $('#setor_emissor_rv-visualizar').text($(this).data('Setor Emissor da RV'));
        $('#fk_veiculo-visualizar').text($(this).data('Veículo'));
        $('#datahora_saida-visualizar').text($(this).data('Horário de Saída'));
        $('#datahora_chegada-visualizar').text($(this).data('Horário de Chegada'));
        $('#fk_cidade_saida-visualizar').text($(this).data('Cidade de Saída'));
        $('#fk_cidade_chegada-visualizar').text($(this).data('Cidade de Chegada'));
        $('#fk_tipo_servico-visualizar').text($(this).data('Tipo de Serviço'));
        $('#fk_id_solicitante-visualizar').text($(this).data('Solicitante'));
        $('#estimativa_km-visualizar').text($(this).data('Estimativa de KM'));
        $('#estado-visualizar').text($(this).data('Estado'));
        $('#nome_responsavel-visualizar').text($(this).data('Nome Responsável'));
        $('#telefone_responsavel-visualizar').text($(this).data('Telefone'));
        $('#local_saida-visualizar').text($(this).data('Local de Saída'));
        $('#setor_autoriza_viagem-visualizar').text($(this).data('Autorização'));
        $('#numero_passageiros-visualizar').text($(this).data('Nº Passageiros'));
        $('#tipo_solicitacao-visualizar').text($(this).data('Tipo de Solicitação'));
        $('#natureza_servico-visualizar').text($(this).data('Natureza da Viagem'));
        $('#custo_viagem-visualizar').text($(this).data('Custo da Viagem'));
        $('#descricao_bagagem-visualizar').text($(this).data('Bagagem'));
        $('#codigo_acp_rv-visualizar').text($(this).data('Código ACP'));
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
        $('.modal-title').text('Editar Cadastro da Viagem');
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
        $('.modal-title').text('Excluir Viagem');
        $('.id_del').val($(this).data('id'));
        jQuery('#excluir-modal').modal('show'); //Abrir o modal
    });

    //Adicionar
    $(document).on('click', '.btnAdicionarViagems', function() {
    $('.modal-footer .btn-action').removeClass('edit');
        $('.modal-footer .btn-action').addClass('add');

        $('.modal-title').text('Nova Solicitação de Viagem');
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
            url: "./viagems/store",
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

                    $('#tabela_viagem').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Viagem Adicionada com Sucesso!',
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
            url: "./viagems/update",
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

                   $('#tabela_viagem').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Viagem Atualizada com Sucesso!',
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
            url: './viagems/delete',
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
                $('#tabela_viagem').DataTable().row('#item-' + data.id).remove().draw(); //remove a linha e ordena
                jQuery('#excluir-modal').modal('hide'); //fechar o modal

                $(function() {

                    iziToast.success({
                        title: 'OK',
                        message: 'Viagem Excluída com Sucesso!',
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
