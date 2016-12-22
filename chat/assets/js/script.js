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
    window.open("chat/", "chatWindow", "width=600,height=480");
}

function enviarMsgChat(obj, event) {
    if (event.keyCode === 13 && obj.value !== "") {
        var msg = obj.value;
        var time = new Date();
        var nome = $('.inputarea').attr('data-nome');
        obj.value = '';
        $('.chatarea').append("<div class='msgitem'>[" + getMsgTime(time) + "] <strong>" + nome + "</strong>: " + msg + "</div>");
        $.ajax({
            url: '../ajax/enviarMsgToDb',
            type: 'POST',
            data:{'msg':msg, 'time':time}            
        });        
    }
}

function getMsgTime(d) {
    str_h = new String(d.getHours());
    str_m = new String(d.getMinutes());
    str_s = new String(d.getSeconds());
    // acrescenta um 0 se existir menos que 2 digitos
    if (str_h.length < 2)
        str_h = 0 + str_h;
    if (str_m.length < 2)
        str_m = 0 + str_m;
    if (str_s.length < 2)
        str_s = 0 + str_s;    
    return (str_h+':'+str_m+':'+str_s);
}

function updateChat() {
    $.ajax({
       url:'../ajax/updateMessages',
       type: 'GET',
       dataType: 'json',
       success:function(json) {
           if (json.mensagens.length > 0) {
               for(var i in json.mensagens) {
                   var time = json.mensagens[i].data_envio;
                   if (json.mensagens[i].origem === '0') {
                       var nome = 'Suporte';
                   } else {
                       var nome = $('.inputarea').attr('data-nome');
                   }                   
                   var msg = json.mensagens[i].mensagem;
                   $('.chatarea').append("<div class='msgitem'>[" + time + "] <strong>" + nome + "</strong>: " + msg + "</div>");
               }
           }
           setTimeout(updateChat, 1000);
       },
       error:function() {
           setTimeout(updateChat, 1000);
       }
    });
}




















    