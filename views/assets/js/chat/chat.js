var conversacion = false;
var token;
//mostar/ocultar caja de mensajes
$("#iniciar").click(function(){
	$(this).hide();
	$(".chat_wrapper").show();
});
$("#cerrar_conversacion").click(function(){
	$("#iniciar").show();
	$(".chat_wrapper").hide();
});
// estado inicial de conversacion
iniciarConversacion();
//obtener usuario
var user = localStorage.getItem('userName');
//click en enviar
$('#send-btn').click(function(){
  var mymessage = $('#message').val();
  //mesaje vacio
  if (mymessage=="" || mymessage==" ") {
    alert("Ingresa tu mensaje");
    return;
  }
	//inicializar conversacion
	if (conversacion==false) {
		iniciarConversacion();
	}
	conversacion = true;

  //enviar datos a php
  $.ajax({
    url:"enviar-mensaje",
    type:"post",
    dataType:"json",
    data:({msn:mymessage,token:token}),
    success:function(result){
      console.log(result);
			if (result==true) {
				agregarMensaje(user,mymessage);
			}else{
				agregarMensaje("system","Error al enviar mensaje");
			}
    },
    error:function(result){
      console.log(result);
    }
  });
   //reiniciar input
   $('#message').val("");
});
//finalizar conversacion
$("#finalizar").click(function(){
	localStorage.removeItem("chat_token");
	$('#cerrar_conversacion').click();
	//cambiar estado de conversacion
	conversacion = false;
	iniciarConversacion();
	//eliminar mensajes
	$('#message_box').empty();
	//ajax para enviar correo y eliminar session de chat
	$.ajax({
		url:"eliminar-chat",
		success:function(res){
			console.log(res);
		}
	});
});
//agregar a la casa de mensajes
function agregarMensaje(user_name,msn){
	$('#message_box').append("<div><span class='user_name'>"+user_name+"</span> : <span class='user_message'>"+msn+"</span></div>");
}
//crear token de cerrar_conversacion
function crearToken(longitud) {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  for (var i = 0; i < longitud; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  return text;
}
//saber si la conversacion ya esta inicida
function iniciarConversacion(){
	//saber si existe el token de conversacion
	if (localStorage.getItem('chat_token')!=null) {
		estadoConversacion = true;
		token = localStorage.getItem('chat_token');
		llenarChat(token);
		console.log(token);
	}else{
	 	token = crearToken(15);
		localStorage.setItem('chat_token',token);
	}
}
//si la pagina se recarga no perder el chat
function llenarChat(token){
	$.ajax({
		url:"llenar-chat",
		type:"post",
		dataType:"json",
		data:({token:token}),
		success:function(result){
			console.log(result);
			var item = result.length-1;
			for (var i = 0; i < result.length; i++) {
					agregarMensaje(result[i][0],result[i][1]);
			}
		},
		error:function(result){console.log(result);}
	});
}
//actualizar mensajes cada 8 segundo
function actualizarChat(){
	if (conversacion==true) {
		$("#message_box").empty();
		llenarChat(token);
		console.log(token);
	}
	setTimeout(function(){actualizarChat();},8000);
}
actualizarChat();
