$(function(){
    $('document').bind('onload', function(){
        console.log("Abriu a página em: "+Date());
        //$('#div_resposta').hide();
    });
    
    $('#helloButton').bind('click', function(){
        //$('#hello').fadeTo('slow',0.75);
        //$('#hello').fadeOut('slow');		
        //$('#hello').slideToggle('slow');
        //$('#hello').toggle('slow');
        var cor = jQuery.Color("rgb(20,40,150)");
        $('#hello').animate({backgroundColor:cor,opacity:'0.7',color:'white',width:'25%',height:'60px','line-height':'60px'}, 750);
        //$('#hello').animate({backgroundColor:'#206060',width:'50%',height:'60px'}, 1000);
        //$('#hello').toggleClass("newhello");
        $("#hello").animate({backgroundColor:'#672455'}).slideUp(1000).slideDown(1000);
        
    });

    //$('#helloButton').bind('dblclick', function(){
    //    $('#hello').html('<div class="hello" id="hello" > Hello Bar </div>');
    //});
    
    $('#cidade').bind('focus', function(){
        console.log("Focou no input da lista");
        $(this).animate({backgroundColor:'#0ec','border-color':'#7f0'},'slow');
    });
    
    $('#btnOutra').bind('click', function(){
        //$.get("outra.html", function(t){
        $.post("outra.html", function(t){
            $('#div_resposta').show();
            $('#div_resposta').html(t);
        });       
    });
    
    /*
    $('#formID').bind('submit', function(form){
        form.preventDefault();        
        var txt = $(this).serialize();
        console.log(txt);
        $('#div_resposta').show();
        $('#div_resposta').load("outra.html");
    }); 
     */    
    
    $('#formID').bind('submit', function(form){
        form.preventDefault();
        var txt = $(this).serialize();
        console.log(txt);
        $.ajax({
            type:'GET',
            url:'calc.php',
            data:txt,
            success:function(resultado){
                    $('#div_resposta').show();
                    $('#div_resposta').html("Retornou: "+resultado);
            },
            error:function(){
                    alert('Ocorreu um erro!');
            }
        });
    });
    
   $('#formUser').bind('submit', function(form){
        form.preventDefault();
        var txt = $(this).serialize();
        console.log(txt);
        $.ajax({
            type:'POST',
            url:'user.php',
            data:txt,
            dataType: 'json',
            success:function(resultado){
                    $('#div_respostaUser').show();
                    //$('#div_resposta').html("Nome: "+resultado.nome+", Senha: "+resultado.senha);
                    $('#div_respostaUser').html("Resultado: "+resultado['status']);
            },
            error:function(){
                    alert('Ocorreu um erro!');
            }
        });
    });


});

// FUNÇÕES JAVASCRIPT
function trocarDiv() {
	var element = document.getElementById('area1');
	var texto = prompt("Qual é o seu nome?");	
	element.innerHTML = "O seu nome é "+texto+".";
}
function addItem() {
	var item = document.getElementById("novoItem").value;
	var lista = document.getElementById("lista").innerHTML;
	lista = lista + "<li>"+item+"</li>";
	document.getElementById("lista").innerHTML = lista;
}
function clicouBotaoDireito() {
	console.log("Clicou com botão direito do mouse");	
	return false;
}
function teclaPressionada(event) {
	console.log("Pressionada a tecla: "+event.keyCode);
}
function mudouOpcao(obj) {
	console.log("Mudou para "+obj.value);
}
function enviouSubmit() {
	console.log("Clicou no botão submit");
}
function focoEmInput() {
	console.log("Focou no campo input");
}
function desfocoDeInput() {
	console.log("Saiu no campo input");
}