
         <div class="container--quotation">
      <div class="quotation--left">
        <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
          <h1 class="title--movil">crea tu cotizacion</h1>
            <div class="quotation--form">
            <form  id="quotationUser">
            <p class="subtitle quo">Ingresa los datos de los Producto o Servicios que desea cotizar y espera nuetra respuesta. </p>
            <div class="form-groupuser">
              <label for="dataprod" class="labelyellow">Referencia del producto</label>
              <input type="text" name="data[]" class="inputYellow" id="dataprod">
            </div>
            <div class="containerFormg">
              <div class="form-groupuser cantidad--hide">
                <label for="cantidad" class="labelyellow">Cantidad</label>
                <input type="number" name="data[]" class="inputYellow" id="cantidad" required>
              </div>
              <div class="form-groupuser tip_ser--hide">
                <label for="solicitud" class="labelyellow">Tipo de Servicio</label>
                <select name="data[]" class="inputYellow" id="solicitud" required>
                </select>
              </div>
            </div>


            <div class="form-groupuser">
              <label for="solicitud" class="labelyellow">Detalla la solicitud</label>
              <textarea name="data[]" rows="1" cols="50" class="inputYellow"></textarea>
            </div>
            <div class="container_orderbtn">
              <div class=orderbtn>
                <input type="button" id="before" value="Anterior">
                <input type="button" id="nextExis" value="Siguiente">
              </div>
              <div class="orderbtn">
                <input type="button" id="next" value="Otro Producto">
              </div>
              <div class="orderbtn">
              <input type="button" id="openModal" value="Enviar">
            </div>
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
      <h2>detalles de la cotizacion</h2>
        <div id="detalles">
        </div>
    </div>
    <div class="quotation--form">
      <span id="closeConfir">&times;</span>
      <form id="sendQuotation">
      <h2>ingresa tus datos</h2>
    <div class="form-groupuser">
      <label for="nameC" class="labelblue">Nombre Completo</label>
      <input type="text" name="data_user" class="inputblue" id="nameC" required>
    </div>
    <div class="form-groupuser">
      <label for="Correoquo" class="labelblue">Correo</label>
      <input type="email" name="data_user" class="inputblue" id="Correoquo" required>
    </div>
    <div class="form-groupuser">
      <label for="tel" class="labelblue">Telefono</label>
      <input type="number" name="data_user" class="inputblue" id="tel" required>
    </div>
    <div class="form-groupuser">
      <label for="dir" class="labelblue">Dirección</label>
      <input type="text" name="data_user" class="inputblue" id="dir" required>
    </div>
    <!-- <div class="form-groupuser">
      <label for="rf" class="labelblue">Observaciones</label>
      <textarea id="obser" rows="2" cols="80" class="inputblue"></textarea>
    </div> -->
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
<script type="text/javascript" src="views/assets/js/main-user.js"></script>
<script type="text/javascript" src="views/assets/js/auth.js"></script>
<script type="text/javascript" src="views/assets/js/menu.js"></script>
<script type="text/javascript" src="views/assets/js/quotation.js"></script>
</html>
