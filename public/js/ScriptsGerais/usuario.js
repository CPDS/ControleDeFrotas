$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //tabela Usuarios
    var tabela = $('#table').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: './usuarios/list',
            columns: [
            { data: null, name: 'order' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email'},
            { data: 'endereco', name: 'endereco'},
            { data: 'telefone', name: 'telefone'},
            { data: 'funcao', name: 'funcao'},
            { data: 'status', name: 'status' },
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
              { targets : [0,7], sortable : false },
              { "width": "5%", "targets": 0 }, //nº
              { "width": "15%", "targets": 1 },//nome
              { "width": "15%", "targets": 2 },//email
              { "width": "15%", "targets": 3 },//funcao
              { "width": "15%", "targets": 4 },//status
              { "width": "15%", "targets": 5 },//acao
              { "width": "15%", "targets": 6 },
              { "width": "15%", "targets": 7 }
            ]
    });

    tabela.on('draw.dt', function() {
        tabela.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = tabela.page.info().page * tabela.page.info().length + i + 1;
        });
    }).draw();

    //Visualizar
    $(document).on('click', '.btnVisualizar', function() {

        $('#name-visualizar').text($(this).data('name'));
        $('#email-visualizar').text($(this).data('email'));
        $('#endereco-visualizar').text($(this).data('endereco'));
        $('#telefone-visualizar').text($(this).data('telefone'));
        $('#funcao-visualizar').text($(this).data('funcao'));
        jQuery('#visualizar-modal').modal('show');
    });

    // Editar
    $(document).on('click', '.btnEditar', function() {

        $('.modal-footer .btn-action').removeClass('add');
        $('.modal-footer .btn-action').addClass('edit');
        $('.modal-body .senha').addClass("hidden");
        $('.modal-title').text('Editar Usuário');
        $('.callout').addClass("hidden"); //ocultar a div de aviso
        $('.callout').find("p").text(""); //limpar a div de aviso

        var btnEditar = $(this);

        $('#form :input').each(function(index,input){
            $('#'+input.id).val($(btnEditar).data(input.id));
        });

        jQuery('#criar_editar-modal').modal('show'); //Abrir o modal
    });

    /*Evento ajax - EDITAR USUÁRIO*/
    $('.modal-footer').on('click', '.edit', function() {
        var dados = new FormData($("#form")[0]); //pega os dados do form
        console.log(dados);
        $.ajax({
            type: 'post',
            url: "./usuarios/update",
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
                if ((data.errors)){

                    $('.callout').removeClass('hidden'); //exibe a div de erro
                    $('.callout').find('p').text(""); //limpa a div para erros successivos

                    $.each(data.errors, function(nome, mensagem) {
                        $('.callout').find("p").append(mensagem + "</br>");
                    });

                }
                else {

                    $('#table').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Usuário Atualizado com Sucesso!',
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
    });

    //Excluir
    $(document).on('click', '.btnDeletar', function() {
        $('.modal-title').text('Desativar Usuário');
        $('.id_del').val($(this).data('id'));

        jQuery('#excluir-modal').modal('show'); //Abrir o modal
    });

    //Evento ajax - EXCLUIR USUÁRIO
    $('.modal-footer').on('click', '.del', function() {

        $.ajax({
            type: 'post',
            url: './usuarios/delete',
            data: {
                'id': $(".id_del").val(),
            },
            beforeSend: function(){
                jQuery('.del').button('loading');
            },
            complete: function() {
                jQuery('.del').button('reset');
            },
            success: function(data) {
                $('#table').DataTable().row('#item-' + data.id).remove().draw(); //remove a linha e ordena
                jQuery('#excluir-modal').modal('hide'); //fechar o modal

                $(function() {

                    iziToast.success({
                        title: 'OK',
                        message: 'Usuário Desativado com Sucesso!',
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

    //Ativar
    $(document).on('click', '.btnAtivar', function() {
        $('.modal-title').text('Ativar Usuário');
        $('.id_ativ').val($(this).data('id'));
        jQuery('#ativar-modal').modal('show'); //Abrir o modal
    });

    //Evento ajax - ATIVAR USUÁRIO
    $('.modal-footer').on('click', '.ativ', function() {
        $.ajax({
            type: 'post',
            url: './usuarios/ativar',
            data: {
                'id': $(".id_ativ").val(),
            },
            beforeSend: function(){
                jQuery('.ativ').button('loading');
            },
            complete: function() {
                jQuery('.ativ').button('reset');
            },
            success: function(data) {
                $('#table').DataTable().row('#item-' + data.id).remove().draw(); //remove a linha e ordena
                jQuery('#ativar-modal').modal('hide'); //fechar o modal

                $(function() {

                    iziToast.success({
                        title: 'OK',
                        message: 'Usuário Ativado com Sucesso!',
                    });
                });
            },
            error: function() {

                jQuery('#ativar-modal').modal('hide'); //fechar o modal

                iziToast.error({
                    title: 'Erro Interno',
                    message: 'Operação Cancelada!',
                });
            },

        });
    });

    //Adicionar
    $(document).on('click', '.btnAdicionarUsuario', function() {

        $('.modal-footer .btn-action').removeClass('edit');
        $('.modal-footer .btn-action').addClass('add');
        $('.modal-body .senha').removeClass("hidden");
        $('.modal-title').text('Novo Usuário');
        $('.modal-sub').text('PREENCHA TODAS AS INFORMAÇÕES CORRETAMENTE');
        $('.callout').addClass("hidden");
        $('.callout').find("p").text("");

        $('#form')[0].reset();

        jQuery('#criar_editar-modal').modal('show');
    });


    //Evento ajax - ADICIONAR USUÁRIO
    $('.modal-footer').on('click', '.add', function() {
    var dados = new FormData($("#form")[0]); //pega os dados do form
        console.log(dados);
        $.ajax({
            type: 'post',
            url: "./usuarios/store",
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
                }
                else{

                    $('#table').DataTable().draw(false);

                    jQuery('#criar_editar-modal').modal('hide');

                    $(function() {
                        iziToast.success({
                            title: 'OK',
                            message: 'Usuário Adicionado com Sucesso!',
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
    });

    //Select de Estado e Cidade
        $(document).on('change','.selectEstado', function(){
            //recuperando id do select de estado
            var id = $("#estado option:selected").val();
            //variavel que adiciona as opções
            var option = '';
            $.getJSON('./usuarios/cidade/'+id, function(dados){
                //Atibuindo valores à variavel com os dados da consulta
                $.each(dados.cidades, function(i,cidade){
                    option += '<option value="'+cidade.id+'">'+cidade.nome+'</option>';
                });
                //passando para o select de cidades
                $('#cidade').html(option).show();
            });

        });

    $("#telefone").mask("(99) 99999-9999");


});
