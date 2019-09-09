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