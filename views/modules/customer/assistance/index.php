<!DOCTYPE html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<div id="iniciar">
		<span>Inicia tu conversación</span>
	</div>
<?php
$_SESSION['userName'] = "Cristian";
$_SESSION['userCode'] = 1;
echo "<script>localStorage.setItem('userName', '".$_SESSION['userName']."');</script>";
?>
<div class="chat_wrapper">
	<span id="cerrar_conversacion">x</span>
	<div class="message_box" id="message_box"></div>
	<div class="panel">
			<input type="text" name="message" id="message" placeholder="Message" maxlength="80"
			onkeydown = "if (event.keyCode == 13)document.getElementById('send-btn').click()"  />
	</div>
	<button id="send-btn" class=button>Enviar</button>
	<button id="finalizar" class=button>Finalizar</button>
</div>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/chat.js"></script>
</body>
</html>
