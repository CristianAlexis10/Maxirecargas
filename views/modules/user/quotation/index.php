    <title> Maxirecargas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="views/assets/image/logo.png">
     <link rel="stylesheet" href="views/assets/css/copepr.css">
         <div class="container--quotation">
      <div class="quotation--left">
          <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i></span>
            <div class="quotation--form">
          <form  id="quotationUser">
            <p class="subtitle quo">Ingresa los datos de los Producto o Servicios que desea cotizar y espera nuetra respuesta. </p>
            <div class="form-groupuser">
              <label for="dataprod" class="labelyellow">Referencia del producto</label>
              <input type="text" name="data[]" class="inputYellow" id="dataprod">
            </div>
            <div class="form-groupuser cantidad--hide">
              <label for="cantidad" class="labelyellow">Cantidad</label>
              <input type="number" name="data[]" class="inputYellow" id="cantidad" required>
            </div>
            <div class="form-groupuser tip_ser--hide">
              <label for="solicitud" class="labelyellow">Tipo de Servicio</label>
              <select name="data[]" class="inputYellow" id="solicitud" required>
              </select>
            </div>
            <div class="form-groupuser">
              <label for="solicitud" class="labelyellow">Detalla la solicitud</label>
              <textarea name="data[]" rows="1" cols="50" class="inputYellow"></textarea>

            </div>


            <div class="form-groupuser btn">
              <input type="button" id="before" value="Anterior">
                <input type="button" id="nextExis" value="Siguiente">
            </div>
            <div class="form-groupuser btn">
              <input type="button" id="next" value="Otro Producto">
            </div>
            <div class="form-groupuser btn">
              <input type="button" id="openModal" value="ENVIAR">
            </div>
          </form>
        </div>
      </div>
      <div class="quotation--rigth">
        <h1 class="title--quo">crea</h1>
        <h1 class="title--quo">tu</h1>
        <h1 class="title--quo">cotizacion</h1>
      </div>
</div>

<!-- ACA ESTA EL MODAL QUE TE TOCA -->
<div class="modal" id="modalConfir">
  <div class="modal--container">
    <div class="detalle">
        <div id="detalles">

        </div>
    </div>
    <div class="quotation--form">
      <span id="closeConfir">&times;</span>
      <form id="sendQuotation">
      <h2>ingresa tus datos</h2>
    <div class="form-groupuser2">
      <label for="nameC" class="labeluser2">Nombre Completo</label>
      <input type="text" name="data_user" class="inputuser2" id="nameC" required>
    </div>
    <div class="form-groupuser2">
      <label for="Correoquo" class="labeluser2">Correo</label>
      <input type="email" name="data_user" class="inputuser2" id="Correoquo" required>
    </div>
    <div class="form-groupuser2">
      <label for="tel" class="labeluser2">Telefono</label>
      <input type="number" name="data_user" class="inputuser2" id="tel" required>
    </div>
    <div class="form-groupuser2">
      <label for="dir" class="labeluser2">Dirección</label>
      <input type="text" name="data_user" class="inputuser2" id="dir" required>
    </div>
    <div class="form-groupuser2">
      <label for="rf" class="labeluser2">Observaciones</label>
      <textarea id="obser" rows="2" cols="80" class="inputuser2"></textarea>
    </div>
    <div class="form-groupuserbtn">
      <input type="submit" id="confirmQuotation" value="realizar cotizacion">
      <input type="button" id="cancelar" value="cancelar">
    </div>
  </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="views/assets/js/copepr.js"></script>
    <script type="text/javascript" src="views/assets/js/auth.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>
    <script type="text/javascript" src="views/assets/js/quotation.js"></script>
