<?php
$data = $this->master->selectBy('usuario',array('usu_codigo',$_POST['id']));
$response = '
<div class="modales" id="modalcontactar">
  <div class="container--modales modal--container contactar">
    <span class="closemodales modalContacto close--modal "  onclick="cerrarModalContacto()">&times;</span>
    <h1 class="title--modal">contactar cliente</h1>
    <div class="container_item subtitle--modal">
        <div class="item">
            Numero Contacto: '.$data['usu_celular'].'
        </div>
        <div class="item subtitle--modal">
            Enviar Correo: '.$data['usu_correo'].'
        </div>
        <div class="form-groupContact">
            <label for="asunt">Asunto:</label>
            <input type="text" class="dataContact" id="asunt" required>
        </div>
        <div class="form-groupContact">
            <label for="mensaje">mensaje</label>
            <textarea class="dataContact" id="mensaje"></textarea>
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
