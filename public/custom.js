//Atributos:
//tipo: sucesso (msg não obrigatória), erro (msg não obrigatória), tipo (msg obrigatória), atencao (msg obrigatória)
//msg: Mensagem do alerta
function alerta(tipo, msg) {
    if(tipo == "sucesso") {
        if(msg == null) {
            msg = "Operação realizada com sucesso";
        }
        Notiflix.Notify.Success(msg);
    }

    if(tipo == "erro") {
        if(msg == null) {
            msg = "Ocorreu um erro. Tente novamente mais tarde.";
        }
        Notiflix.Notify.Failure(msg);
    }

    if(tipo == "info") {
        if(msg != null) {
            Notiflix.Notify.Info(msg);
        }
    }

    if(tipo == "atencao") {
        if(msg != null) {
            Notiflix.Notify.Warning(msg);
        }
    }

}

function formata_cpf(valor) {
    return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
}

function DatatablePortugues() {
    a = { "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
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
    },
    "select": {
        "rows": {
            "_": "Selecionado %d linhas",
            "0": "Nenhuma linha selecionada",
            "1": "Selecionado 1 linha"
        }
    }
    }

    return a;
}


/*
############## Argumentos obrigatorios: ##################
envia - Objeto com as informações a ser capturadas na rota
url - A url para o POST
pos - funcao ou acao que será executado após o segundo modal, após o clique no botão de OK

############## Argumentos não obrigatorios: ##################
titulo - Titulo do box de confirmação
texto - Texto do box de confirmação
botao_confirmacao - Texto do botão de confirmacao
*/

function ConfirmacaoAjax(envia, url, pos, titulo, texto, botao_confirmacao) {
    //https://issue.life/questions/50041257
    var xtitulo = "Você tem certeza?";
    var xtexto = "Você não poderá reverter esta ação";
    var xbotao_confirmacao = "Sim, prosseguir";

    if(titulo) {
        xtitulo = titulo;
    }

    if(texto) {
        xtexto = texto;
    }

    if(botao_confirmacao) {
        xbotao_confirmacao = botao_confirmacao;
    }

    Swal.fire({
        title: xtitulo,
        text: xtexto,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00a65a',
        //cancelButtonColor: '#d33',
        confirmButtonText: xbotao_confirmacao,
        cancelButtonText: "Cancelar",
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
            return fetch(url, {
                method: "POST",
                body: JSON.stringify(envia),
                credentials: "same-origin",
                headers: new Headers({
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
                })
            })
            .then(response => {
                if (!response.ok) {
                throw new Error(response.statusText)
                }
                return response.json()
            })
            .catch(error => {
                Swal.showValidationMessage(
                'Erro na solicitação: {' + error + '}'
                )
                console.log(error);
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
        if (result.value) {
            console.log(result.value); // Descomentar essa linha para mostrar o retorno da função do PHP
            if(result.value.status == "sucesso") {
                Swal.fire({
                title: 'Sucesso!',
                text: result.value.mensagem,
                type: 'success',
                showCancelButton: false,
                confirmButtonText: 'Ok'
                }).then((a) => {
                if (a.value) {
                    pos();
                }})
            }

            if(result.value.status == "erro") {
                Swal.fire(
                'Erro!',
                result.value.mensagem,
                'error'
                )
            }
        }
        })
}


function dataFormatada(data){
   /* var data = new Date(data),
        dia  = data.getDate().toString().padStart(2, '0'),
        mes  = (data.getMonth()+1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
        ano  = data.getFullYear();
    return dia+"/"+mes+"/"+ano;*/
    return moment(new Date(data)).format("DD/MM/YYYY")
}

function dataHoraFormatada(data){
   /* var data = new Date(data),
        dia  = data.getDate().toString().padStart(2, '0'),
        mes  = (data.getMonth()+1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
        ano  = data.getFullYear();
    return dia+"/"+mes+"/"+ano;*/
    return moment(new Date(data)).format("DD/MM/YYYY HH:mm:ss")
}
