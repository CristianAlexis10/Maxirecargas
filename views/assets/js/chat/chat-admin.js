//saber si hay un chat abierto para actualizar
var chat_abierto = false;
//cerrar chat
$("#cerrar_conversacion").click(function(){
	chat_abierto = false;
	$("#iniciar").show();
	$(".chat_wrapper").hide();
});
//crear bucle infinito de chats actuales
actualizarChats();
function actualizarChats(){
  $.ajax({
    url:"saber-chats-actuales",
    dataType:"json",
    success:function(result){
			$('.wrap-chats').empty();
      console.log(result);
      //agregar a clientes a la lista de chats
      for (var i = 0; i < result.length; i++) {
        // if (document.getElementById(result[i].chat_token) == null) {
            //si no exite se crea el chat
            $('.wrap-chats').append('<div class="item" id="'+result[i].chat_token+'" onclick="abrirChat(this)"><span>'+result[i].nombre+'</span><span  class="deleteUser"onclick="eliminarUsu('+result[i].usu_codigo+')">X</span></div>');
          // }
        }
      }
  });
  // llamar function
  setTimeout(function(){
    actualizarChats();
  },8000);
}

function abrirChat(thi){
	//limpiar chat
	$("#message_box").empty();
	//cambiar el valor del chat
	$("#para").val(thi.id);
	chat_abierto = true;
	//llenar chat
	llenarChat($("#para").val());
	$(".chat_wrapper").show();
	$("#notify").hide();
}
//enviar mensaje
$('#send-btn').click(function(){
  var mymessage = $('#message').val();
  if (mymessage=="" || mymessage==" ") {
    alert("Ingresa tu mensaje");
    return;
  }
  //enviar datos a php
  $.ajax({
    url:"enviar-mensaje-admin",
    type:"post",
    dataType:"json",
    data:({msn:mymessage,token:$("#para").val()}),
    success:function(result){
      console.log(result);
			if (result==true) {
				agregarMensaje( localStorage.getItem('userName'),mymessage);
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

//agregar un  nuevo mensaje
function agregarMensaje(user_name,msn){
	$('#message_box').append("<div><span class='user_name'>"+user_name+"</span> : <span class='user_message'>"+msn+"</span></div>");
}
//finalizar conversacion
// function eliminarUsu(){
// 	localStorage.removeItem("chat_token");
// 	$('#cerrar_conversacion').click();
// 	//cambiar estado de conversacion
// 	conversacion = false;
// 	iniciarConversacion();
// 	//eliminar mensajes
// 	$('#message_box').empty();
// 	//ajax para enviar correo y eliminar session de chat
// 	$.ajax({
// 		url:"eliminar-chat",
// 		success:function(res){
// 			console.log(res);
// 		}
// 	});
// }
//llenar chat
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
// actualizar mensajes cada 8 segundo
function actualizarChat(){
	if (chat_abierto==true) {
		$("#message_box").empty();
		llenarChat($("#para").val());
		console.log($("#para").val());
	}
	setTimeout(function(){actualizarChat();},8000);
}
actualizarChat();




// window.onbeforeunload = function() {
//   return "¿Desea recargar la página web?";
// };

// $("#cerrar_conversacion").click(function(){
// 	$(".chat_wrapper").hide();
// 	$("#notify").show();
// });
// function  ocultar(){
// 	$(".chat_wrapper").hide();
// 	$("#notify").show();
// }
// function eliminarUsu(usu){
// 	var eliminar = usu.id;
// 	$("#"+eliminar).remove();
// 	$("."+eliminar).remove();
// 	setTimeout(function(){
// 		ocultar();
// 	},10);
// 	var msg = {
// 	message: "conversación finalizada. ",
// 	name: "system",
// 	color : '<?php echo $colours[$user_colour]; ?>',
// 	para : $("#para").val()
// 	};
// 	//convertir en json   y enviar al servidor
// 	websocket.send(JSON.stringify(msg));
// }
// 	//crear objeto  WebSocket
// 	//url con el puerto del demon
// 	var wsUri = "ws://localhost:20500/este/server.php";
// 	websocket = new WebSocket(wsUri);
// 	// websocket.onopen = function(ev) { // nueva conexion
// 	// 	$('.wrap-chats').append('<div class="item" id="carlos"><span>carlos</span></div>'); //notify user
// 	// 	setTimeout(function(){
// 	// 		$(".system_msg").remove();
// 	// 	},3000);
// 	// }
// 	$('#send-btn').click(function(){ //enviar mensaje
// 		var mymessage = $('#message').val(); //mensaje
// 		var myname = $('#name').val(); //nombre usuario
// 		if(myname == ""){
// 			alert("Ingresa tu nombre por favor!");
// 			return;
// 		}
// 		if(mymessage == ""){
// 			alert("Ingresa tu mensaje!");
// 			return;
// 		}
//     //ocultar nombre
// 		// document.getElementById("name").style.visibility = "hidden";
//     //scroll
// 		var objDiv = document.getElementById("message_box");
// 		objDiv.scrollTop = objDiv.scrollHeight;
// 		//creando array con el mensaje nombre y color
// 		var msg = {
// 		message: mymessage,
// 		name: myname,
// 		color : '<?php echo $colours[$user_colour]; ?>',
// 		para : $("#para").val()
// 		};
// 		//convertir en json   y enviar al servidor
// 		websocket.send(JSON.stringify(msg));
//
// 		$('#message').val(''); //reset text
// 	});
// function agregar(para,uname,ucolor,umsg){
// 	if (para==$("#name").val()) {
// 		$('#message_box').append("<div class='"+uname+"'><span class=\"user_name\" style=\"color:#"+ucolor+"\">"+uname+"</span> : <span class=\"user_message\">"+umsg+"</span></div>");
// 	}else if(uname==$("#name").val()){
// 		$('#message_box').append("<div class='"+uname+"'><span class=\"user_name\" style=\"color:#"+ucolor+"\">"+uname+"</span> : <span class=\"user_message\">"+umsg+"</span></div>");
// 	}else{
// 		$('#message_box').append("<div>no es para you</div>");
// 	}
// 	// saber si el mensaje es del chat actual
// 	if (actual==uname) {
// 		$("."+uname).show();
// 	}else{
// 		$("."+uname).hide();
// 	}
// 	$(".admin").show();
// }
// 	//recibir mensaje del servidor
// 	websocket.onmessage = function(ev) {
// 		var msg = JSON.parse(ev.data); //datos desde php
// 		var type = msg.type; //tipo de mensaje (system-usermsg)
// 		var umsg = msg.message; //mensaje
// 		var uname = msg.de; //user name
// 		var ucolor = msg.color; //color
//     //mensaje de usuario
// 		if(type == 'usermsg' && umsg !=null){
// 			if (document.getElementById(uname) != null) {
// 				//si existe el usu
// 				agregar(msg.para,uname,ucolor,umsg);
// 				}else{
// 				if (uname!=null) {
// 					//si no exite se crea el chat y envia el mensajeS
// 					if (uname!="admin") {
// 						$('.wrap-chats').append('<div class="item" id="'+uname+'" onclick="mirar(this)"><span>'+uname+'</span><span  class="deleteUser"onclick="eliminarUsu('+uname+')">X</span></div>');
// 					}
// 					agregar(msg.para,uname,ucolor,umsg);
// 				}
// 			}
// 		}
//     //mensaje del sistema
// 		if(type == 'system'){
// 			$('#message_box').append("<div class=\"system_msg\">"+umsg+"</div>");
// 		}
// 		var objDiv = document.getElementById("message_box");
// 		objDiv.scrollTop = objDiv.scrollHeight;
// 	};
// 	websocket.onerror	= function(ev){$('#message_box').append("<div class=\"system_error\">Error Occurred - "+ev.data+"</div>");};
// 	// websocket.onclose 	= function(ev){
// 	// 	$('#message_box').append("<div class=\"system_msg\">Connection Clossadasdasded</div>");
// 	// };
