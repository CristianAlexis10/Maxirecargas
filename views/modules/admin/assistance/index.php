<!DOCTYPE html>
<html>
<head>
  <title>Asistente Virtual</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="views/assets/image/icn-maxi.png">
  <link type="text/css" rel="stylesheet" href="views/assets/css/croppie.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="views/assets/css/main.css">
  <link rel="stylesheet" href="views/assets/css/resposivedash.css">
  <link rel="stylesheet" href="views/assets/css/chat.css">
</head>
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
            echo "<script>localStorage.setItem('userName', '".$_SESSION['CUSTOMER']['NAME']." ".$_SESSION['CUSTOMER']['LAST_NAME']."');</script>";
            ?>
            <div class="title">
              <p>ASISTENTE VIRTUAL</p>
            </div>
            <div class="container--asistente">
              <div class="asistente--left">
                <!-- registrar un nuevo mesaje predefinido -->
                <div id="new-message-default">
                  Agregra mensaje predefinido <i class="fa fa-plus"></i>
                </div>
                <!-- lista de mesajes predefinidos -->
                <div id="wrap-messages-default">
                  <?php ?>
                  <?php
                  foreach ($this->master->selectAllBy("mensajes_personalizados",array("usu_codigo",$_SESSION['CUSTOMER']['ID'])) as $row) {?>
                    <div class="item-default">
                      <p><?php echo $row['mensaje']?></p>
                      <i class="fa fa-paper-plane-o" id="<?php echo $row['id_mensaje'] ?>" onclick="enviarMensajeDefault(this)"></i>
                      <i class="fa fa-trash" onclick="eliminarMensajeDefault(<?php echo $row['id_mensaje'] ?>)"></i>
                    </div>
                  <?php   } ?>
                </div>
              </div>
              <div class="asistente--right">
                <p id="notify">selecciona una conversación</p>
                <!-- contenedor de chats actuales -->
                <div class="wrap-chats"></div>

              </div>
            </div>

            <!-- chat -->
            <div class="chat_wrapper" id="containerChats">
              <div class="chat-header">
                <span id="name_chat"></span>
                <span id="cerrar_conversacion">x</span>
              </div>
            	<div class="message_box" id="message_box"></div>
            	<div class="panel">
            			<input type="hidden" name="para" id="para" disabled />
            			<input type="text" name="message" id="message" placeholder="Message" maxlength="80"
            			onkeydown = "if (event.keyCode == 13)document.getElementById('send-btn').click()"  />
            	</div>
            	<button id="send-btn" class=button>Responder</button>
              <button id="finalizarChat" class="button">finalizar</button>
            </div>

            <!-- modal nuevo mensaje -->
            <div id="modal-messaje_default" class="modales">
            	<div class="container--modales">
            		<span id="closeNewMes" class="closemodales">&times;</span>
            		<h1>Nuevo mensaje</h1>
                <form  id="saveMsn">
                  <div class="frm-group">
                    Mensaje:
                    <textarea id="msnDefault" rows="8" cols="50"></textarea>
                  </div>
                  <div class="frm-group">
                    <input type="submit" value="Guardar">
                  </div>
                </form>
            	</div>
            </div>
          </article>
      </div>
  </section>
<script src="views/assets/js/chat/jquery-3.1.1.js"></script>
<script src="views/assets/js/chat/chat-admin.js"></script>
</body>
</html>
