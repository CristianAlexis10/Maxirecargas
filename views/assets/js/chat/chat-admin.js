$("#finalizarChat").show();
//saber si hay un chat abierto para actualizar
var chat_abierto = false;
//cerrar chat
$("#cerrar_conversacion").click(function(){
	chat_abierto = false;
	$("#message").attr("disabled",false);
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
      // console.log(result);
      //agregar a clientes a la lista de chats
      for (var i = 0; i < result.length; i++) {
        // if (document.getElementById(result[i].chat_token) == null) {
            //si no exite se crea el chat
            $('.wrap-chats').append('<div class="item" id="'+result[i].chat_token+'" onclick="abrirChat(this)"><span>'+result[i].usu_primer_nombre+" "+result[i].usu_primer_apellido+'</span><span  class="deleteUser"onclick="eliminarUsu('+result[i].usu_codigo+')">X</span></div>');
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
	//nombre
	$("#name_chat").empty();
	$($(thi).children()[0]).clone().appendTo("#name_chat");

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
function agregarMensaje(user_name,msn,type){
	if (user_name=="sistema") {
		$('#message_box').append("<div><span class='system_msg'>"+user_name+"</span> : <span class='system_msg'>"+msn+"</span></div>");
	}else{
		if (type=="user_message") {
			$('#message_box').append("<div class='admin_user_message'><span class='user_name'>"+user_name+"</span> : <span class='user_message'>"+msn+"</span></div>");
		}else{
			$('#message_box').append("<div class='admin_admin_message'><span class='user_name'>"+user_name+"</span> : <span class='user_message'>"+msn+"</span></div>");
		}
	}
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
			// console.log(result);
			//tipo de mensaje
			var type;
			var item = result.length-1;
			for (var i = 0; i < result.length; i++) {
				console.log();
				if (result[i][1]=="Conversación Finalizada") {
					$("#message").attr("disabled",true);
				}else{
					if (result[i][2]=="user") {
							type = "user_message";
					}else{
						type = "admin_message";
					}
					agregarMensaje(result[i][0],result[i][1],type);
				}
			}
			$("#message_box").animate({ scrollTop: $('#message_box')[0].scrollHeight}, 10);
		},
		error:function(result){console.log(result);}
	});
}
// actualizar mensajes cada 8 segundo
function actualizarChat(){
	if (chat_abierto==true) {
		$("#message_box").empty();
		llenarChat($("#para").val());
		// console.log($("#para").val());
	}
	setTimeout(function(){actualizarChat();},8000);
}
actualizarChat();
//eliminar chat
$("#finalizarChat").click(function(){
	//cambiar estado de conversacion
	chat_abierto = false;
	//ajax para enviar correo y eliminar session de chat
	$.ajax({
		url:"eliminar-chat-admin",
		type:"post",
		dataType:"json",
		data:({token:$("#para").val()}),
		success:function(res){
			$("#notify").show();
			agregarMensaje("sistema","Conversación Finalizada");
			$('#message_box').empty();
			$(".chat_wrapper").hide();
			actualizarChatsDelete();
		},
		error:function(res){
			console.log(res);
		}
	});
});
//acrtualizar chat cada que se elimine uno pero sin crear un blucle mas
function actualizarChatsDelete(){
  $.ajax({
    url:"saber-chats-actuales",
    dataType:"json",
    success:function(result){
			$('.wrap-chats').empty();
      //agregar a clientes a la lista de chats
      for (var i = 0; i < result.length; i++) {
            $('.wrap-chats').append('<div class="item" id="'+result[i].chat_token+'" onclick="abrirChat(this)"><span>'+result[i].usu_primer_nombre+" "+result[i].usu_primer_apellido+'</span><span  class="deleteUser"onclick="eliminarUsu('+result[i].usu_codigo+')">X</span></div>');
        }
      }
  });
}
//elimiar sin abrir el chat
function eliminarUsu(){
	$("#finalizarChat").click();
}
//MENSAJES PREDETERMINADOS
$("#modal-messaje_default").hide();
$("#new-message-default").click(function(){
		$("#modal-messaje_default").show();
});
$("#closeNewMes").click(function(){
		$("#modal-messaje_default").hide();
});
// guardar mensajes predefinidos
$("#saveMsn").submit(function(e){
	e.preventDefault();
	if ($("#msnDefault").val()=="") {
		alert("Ingresar mensaje");
		return ;
	}
	$.ajax({
		url:"nuevo-mensaje-predefinido",
		type:"post",
		dataType:"json",
		data:({data:$("#msnDefault").val()}),
		success:function(result){
			console.log(result);
			if (result==true) {
					$("#msnDefault").val("");
				$("#wrap-messages-default").empty();
				$.ajax({
					url:"consulta-mensaje-predefinido",
					dataType:"json",
					success:function(result){
							for (var i = 0; i < result.length; i++) {
								$("#wrap-messages-default").append('<div class="item-default"><p>'+result[i].mensaje+'</p><i class="fa fa-paper-plane-o" id="'+result[i].id_mensaje+'" onclick="enviarMensajeDefault(this)"></i>  <i class="fa fa-trash" onclick="eliminarMensajeDefault('+result[i].id_mensaje+')"></i></div>');
									}
							$("#modal-messaje_default").hide();
					}
				});
			}
		},
		error:function(result){console.log(result);}
	});
});
//enviar mensaje predeterminado
function enviarMensajeDefault(e){
	if (chat_abierto==true) {
		let msn = $($($("#"+e.id).parents()[0]).children()[0]).text();
		$("#message").val(msn);
		$('#send-btn').click();
	}else{
		alert("no hay conversación abierta");
	}
}
function eliminarMensajeDefault(id){
	if (confirm("¿Eliminar mensaje?")) {
		$.ajax({
			url:"eliminar-mensaje-predefinido",
			type:"post",
			dataType:"json",
			data:({data:id}),
			success:function(result){
				if (result==true) {
					//recargar mensajes_personalizados
					$("#wrap-messages-default").empty();
					$.ajax({
						url:"consulta-mensaje-predefinido",
						dataType:"json",
						success:function(result){
								for (var i = 0; i < result.length; i++) {
									$("#wrap-messages-default").append('<div class="item-default"><p>'+result[i].mensaje+'</p><i class="fa fa-paper-plane-o" id="'+result[i].id_mensaje+'" onclick="enviarMensajeDefault(this)"></i>  <i class="fa fa-trash" onclick="eliminarMensajeDefault('+result[i].id_mensaje+')"></i></div>');
								}
								$("#modal-messaje_default").hide();

						}
					});
				}else{
					alert(result);
				}
			},
			error:function(result){console.log(result);}
		});
	}
}
