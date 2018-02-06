<?php
$data = $this->master->selectBy('usuario',array('usu_codigo',$_POST['id']));
$response = '
<div class="modales" id="modalcontactar">
  <div class="container--modales">
    <span class="closemodales" id="closeModal">&times;</span>
    <h1>contactar cliente</h1>
    <div class="container_item">
        <div class="item">
            Numero Contacto: '.$data['usu_celular'].'
        </div>
        <div class="item">
            Enviar Correo: '.$data['usu_correo'].'
        </div>
        <div class="form-group">
            <label class="label" for="asunt">Asunto:</label>
            <input type="text" class="dataContact input" id="asunt" required>
        </div>
        <div class="form-group">
            <label class="label" for="mensaje">mensaje</label>
            <textarea class="dataContact input" id="mensaje"></textarea>
        </div>
        <div class="item">
            <input type="button" value="Enviar correo" onclick="sendMail()" id="sendButton" class="btn">
        </div>
    </div>
  </div>
</div>
';
$_SESSION['sendMail_to'] = $data['usu_correo'];
echo json_encode($response);
?>
