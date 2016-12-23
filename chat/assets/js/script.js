function iniciarSuporte() {
    setTimeout(getChamado, 2000);
}

function getChamado() {
    $.ajax({
        //url:'chat/ajax/getchamado',
        url: 'ajax/getchamado',
        dataType: 'json',
        success: function (json) {
            resetChamados();
            if (json.chamados.length > 0) {
                for (var i in json.chamados) {
                    if (json.chamados[i].status == '1') {
                        $('#areadechamados').append("<tr class='chamado' data-id=" + json.chamados[i].id + "><td>" + json.chamados[i].data_inicio + "</td><td>" + json.chamados[i].nome + "</td><td> Em atendimento </td></tr>");
                    } else {
                        $('#areadechamados').append("<tr class='chamado' data-id=" + json.chamados[i].id + "><td>" + json.chamados[i].data_inicio + "</td><td>" + json.chamados[i].nome + "</td><td><button onclick='atenderChamado(this)'>Atender Chamado</button></td></tr>");
                    }
                }
            }
            setTimeout(getChamado, 2000);
        },
        error: function () {
            setTimeout(getChamado, 2000);
        }
    });
}

function resetChamados() {
    $('.chamado').remove();
}

function atenderChamado(obj) {
    var id = $(obj).closest('.chamado').attr('data-id');

    window.open("chat/chat?id=" + id, "chatWindow", "width=600,height=480");
}

function abrirChat() {
    window.open("chat/chat", "chatWindow", "width=600,height=480");
}

function enviarMsgChat(obj, event) {
    if (event.keyCode === 13 && obj.value !== "") {
        var msg = obj.value;
        var hora = getMsgTime();
        var nome = "Fulano";
        obj.value = '';
        $('.chatarea').append("<div class='msgitem'>[" + hora + "] <strong>" + nome + "</strong>: " + msg + "</div>");
    }
}

function getMsgTime() {
    var d = new Date();
    //converte as horas, minutos e segundos para string
    str_h = new String(d.getHours());
    str_m = new String(d.getMinutes());
    str_s = new String(d.getSeconds());

    //se tiver menos que 2 digitos, acrescenta um 0
    if (str_h.length < 2)
        str_h = 0 + str_h;
    if (str_m.length < 2)
        str_m = 0 + str_m;
    if (str_s.length < 2)
        str_s = 0 + str_s;
    
    return (str_h + ':' + str_m + ':' + str_s);
}






    