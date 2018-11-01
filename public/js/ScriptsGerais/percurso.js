$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); // EDITAR DE ACORDO COM VARIAVEIS DE PERCURSO NO BANCO DE DADOS

    var tabela = $('#tabela_percursos').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: '/percursos/list',
            columns: [
            { data: null, name: 'order' },
            { data: 'hora_saida', name: 'hora_saida' },
            { data: 'local_saida', name: 'local_saida' },
            { data: 'km_saida', name: 'km_saida' },
            { data: 'roteiro', name: 'roteiro' },
            { data: 'hora_chegada', name: 'hora_chegada' },
            { data: 'local_chegada', name: 'local_chegada' },
            { data: 'km_chegada', name: 'km_chegada' },
            { data: 'fk_diario', name: 'fk_diario' },
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
              { targets : [0,9], sortable : false },
              { "width": "5%", "targets": 0 }, //nº
              { "width": "15%", "targets": 1 },//nome
              { "width": "15%", "targets": 2 },//matricula
              { "width": "15%", "targets": 3 },//status
              { "width": "15%", "targets": 4 },
              { "width": "15%", "targets": 5 },
              { "width": "15%", "targets": 6 },
              { "width": "15%", "targets": 7 },
              { "width": "15%", "targets": 8 },
              { "width": "15%", "targets": 9 }

            ]
    });

    tabela.on('draw.dt', function() {
        tabela.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = tabela.page.info().page * tabela.page.info().length + i + 1;
        });
    }).draw();

    //Ver
    $(document).on('click', '.btnVer', function() {
        $('#hora_saida-visualizar').text($(this).data('hora_saida')); // # pego no visualizar.blade.php e data pego no Controller(botao)
        $('#local_saida-visualizar').text($(this).data('local_saida'));
        $('#km_saida-visualizar').text($(this).data('km_saida'));
        $('#roteiro-visualizar').text($(this).data('roteiro'));
        $('#hora_chegada-visualizar').text($(this).data('hora_chegada'));
        $('#local_chegada-visualizar').text($(this).data('local_chegada'));
        $('#km_chegada-visualizar').text($(this).data('km_chegada'));
        $('#fk_diario-visualizar').text($(this).data('fk_diario'));
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
        $('.modal-title').text('Editar Cadastro de Percurso');
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
        $('.modal-title').text('Excluir Percurso');
        $('.id_del').val($(this).data('id'));
        jQuery('#excluir-modal').modal('show'); //Abrir o modal
    });

    //Adicionar
    $(document).on('click', '.btnAdicionarPercursos', function() {
        $('.modal-footer .btn-action').removeClass('edit');
        $('.modal-footer .btn-action').addClass('add');

        $('.modal-title').text('Novo Cadastro de Percurso');
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
            url: "./percursos/store",
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

                    $('#tabela_percursos').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Percurso Adicionado com Sucesso!',
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
            url: "./percursos/update",
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

                   $('#tabela_percursos').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Percurso Atualizado com Sucesso!',
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
            url: './percursos/delete',
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
                $('#tabela_percursos').DataTable().row('#item-' + data.id).remove().draw(); //remove a linha e ordena
                jQuery('#excluir-modal').modal('hide'); //fechar o modal

                $(function() {

                    iziToast.success({
                        title: 'OK',
                        message: 'Percurso Excluído com Sucesso!',
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
