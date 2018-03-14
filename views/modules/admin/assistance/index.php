<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="views/assets/image/icn-maxi.png">
  <link type="text/css" rel="stylesheet" href="views/assets/css/croppie.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="views/assets/css/main.css">
  <link rel="stylesheet" href="views/assets/css/resposivedash.css">
  <link rel="stylesheet" href="views/assets/css/chat.css">
</head>
<style media="screen">
	.chat_wrapper{
		display: none;
	}
	#cerrar_conversacion{
		color: white;
	}
	.deleteUser{
		padding-left: 50px;
		color: white;
		font-size: 10px !important;
	}
</style>
<body>
  <section class="container">
      <header id="navigator" class="main--nav <?php echo $_SESSION['CUSTOMER']['STYLE']['est_usu_menu'] ?>">
      <?php
          require_once("views/include/scope.profile.php");
          require_once("views/include/scope.navigator.php");
      ?>
      </header>
      <div class="wrap--content">
          <?php require_once("views/include/scope.menutop.php"); ?>
          <article>
            <div id="fondOscuro"></div>
            <?php
            echo "<script>localStorage.setItem('userName', '".$_SESSION['CUSTOMER']['NAME']."');</script>";
            ?>
            <p id="notify">selecciona una conversación</p>
            <div class="wrap-chats"></div>
            <div class="chat_wrapper" id="containerChats">
            		<span id="cerrar_conversacion">x</span>
            	<div class="message_box" id="message_box"></div>
            	<div class="panel">
            			<input type="text" name="name" id="name" value="<?php echo $_SESSION['CUSTOMER']['NAME'] ?>" disabled />
            			<input type="text" name="para" id="para" disabled />
            			<input type="text" name="message" id="message" placeholder="Message" maxlength="80"
            			onkeydown = "if (event.keyCode == 13)document.getElementById('send-btn').click()"  />
            	</div>
            	<button id="send-btn" class=button>Send</button>
            </div>
          </article>
      </div>
  </section>
<script src="views/assets/js/chat/jquery-3.1.1.js"></script>
<script src="views/assets/js/chat/chat-admin.js"></script>
</body>
</html>
