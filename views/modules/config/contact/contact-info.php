<?php
$data = $this->master->selectBy('usuario',array('usu_codigo',$_POST['id']));
$response = '
<div class="modal--contact">
  <div class="info">
        <div class="item">
            Numero Contacto: '.$data['usu_telefono'].'
        </div>
        <div class="item">
            Enviar Correo: '.$data['usu_correo'].'
        </div>
        <div class="item">
            <input type="text" placeholder="Asunto" class="dataContact" required>
        </div>
        <div class="item">
            <textarea class="dataContact" required placeholder="Mensaje"></textarea>
        </div>
        <div class="item">
            <input type="button" value="Enviar correo" onclick="sendMail()" id="sendButton">
        </div>

  </div>
</div>
';
$_SESSION['sendMail_to'] = $data['usu_correo'];
echo json_encode($response);
?>
