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
var total_mensajes = 0;
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
	//
	if(total_mensajes==0) {
		agregarMensaje("sistema","Conversación iniciada");
	}
	total_mensajes++;
  //enviar datos a php
  $.ajax({
    url:"enviar-mensaje",
    type:"post",
    dataType:"json",
    data:({msn:mymessage,token:token}),
    success:function(result){
			if (result==true) {
				agregarMensaje(user,mymessage);
				$("#finalizarChat").show();
			}else{
				agregarMensaje("sistema","Error al enviar mensaje");
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
$("#finalizarChat").click(function(){
	localStorage.removeItem("chat_token");
	//cambiar estado de conversacion
	conversacion = false;
	iniciarConversacion();
	//eliminar mensajes
	//ajax para enviar correo y eliminar session de chat
	$.ajax({
		url:"eliminar-chat",
		success:function(res){
			agregarMensaje("sistema","Conversación Finalizada");
			setTimeout(function(){
				$("#finalizarChat").hide();
				$('#message_box').empty();
				$("#cerrar_conversacion").click();
			},3000);
		}
	});
});
//agregar a la casa de mensajes
function agregarMensaje(user_name,msn){
	if (user_name=="sistema") {
		$('#message_box').append("<div><span class='system_msg'>"+user_name+"</span> : <span class='system_msg'>"+msn+"</span></div>");
	}else{
		$('#message_box').append("<div><span class='user_name'>"+user_name+"</span> : <span class='user_message'>"+msn+"</span></div>");
	}
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
		$("#finalizarChat").show();
		estadoConversacion = true;
		conversacion = true;
		token = localStorage.getItem('chat_token');
		llenarChat(token);
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
			$("#message_box").empty();
			if (result.length>0) {
				agregarMensaje("sistema","Conversación iniciada");
			}
			var item = result.length-1;
			for (var i = 0; i < result.length; i++) {
					agregarMensaje(result[i][0],result[i][1]);
			}
		},
		error:function(result){console.log(result);}
	});
	$("#message_box").animate({ scrollTop: $('#message_box')[0].scrollHeight}, 1000);
}
//actualizar mensajes cada 8 segundo
function actualizarChat(){
	if (conversacion==true) {
		$("#message_box").empty();
		llenarChat(token);
	}
	setTimeout(function(){actualizarChat();},8000);
}
actualizarChat();
