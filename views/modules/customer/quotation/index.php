
         <div class="container--quotation">
      <div class="quotation--left">
        <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
          <h1 class="title--movil">crea tu cotizacion</h1>
            <div class="quotation--form">
              <form id="frmNewOrder">
                <p class="subtitle quo">Ingresa los datos de los Producto o Servicios que desea cotizar y espera nuetra respuesta. </p>
                <div class="form-groupuser3">
                  <label for="producto" class="labelyellow">Referencia del producto</label>
                <input type="text" id="producto" class="inputYellow" >
                </div>
                <input type="button" id="searchPro" class="inputuser3" value="Buscar">
                <div class="form-groupuser3 hide--service ">
                  <label for="servicio" class="labelyellow">servicio</label>
                  <select class="inputYellow " id="servicio">
                    <option>cosa</option>
                    <option>cosa2</option>
                  </select>
                </div>
                <div class="juntos hide--cantidad">
                  <div class="form-groupuser3">
                    <label for="cant" class="labelyellow">cantidad</label>
                    <input type="number" id="cant" class="inputYellow">
                  </div>
                </div>
                <div class="form-groupuser3 hide--obs">
                  <label for="observ" class="labelyellow">observaciones</label>
                  <textarea name="name" rows="2" cols="100" id="observ" class="inputYellow"></textarea>
                </div>
              </form>
              <button type="button" id="back">Anterior</button>
              <button type="button" id="next">siguiente</button>
              <button type="button" id="otroProducto">Otro producto</button>
              <button type="button" id="orderSiguiente">Terminar</button>
        </div>
      </div>
      <div class="quotation--rigth">
        <h1 class="title--quo">crea</h1>
        <h1 class="title--quo">tu</h1>
        <h1 class="title--quo">cotizacion</h1>
      </div>

      <div class="modal" id="modal_dir">
        <div class="content_modal_dir">
          <!-- <span id="closemodal_dir">&times;</span> -->
          <img src="views/assets/image/logo.png" class="image_modal">
          <div class="modal_form">
            <div class="form-groupuser3">
              <label for="ciudad" class="">Ciudad</label>
              <select class="" id="ciudad"></select>
            </div>
            <div class="form-groupuser3">
              <label for="dirSent" class="">Dirección de envio</label>
              <input id="dirSent" class="">
            </div>
            <div class="form-groupuser3">
                <input type="button" id="newDir" value="Cambiar">
            </div>
          </div>
        </div>
      </div>
</div>

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
      <h1>Datos de entrega</h1>
      <p>¿Esta es la direccion donde se solicita el pedido?</p>
      <h2 id="orderDir"><?php echo $_SESSION['CUSTOMER']['ADDRESS'];?></h2>
    <div class="form-groupuserbtn">
      <input type="button" id="confirmOrder" value="realizar cotizacion">
      <input type="button" id="orderAtras" value="atras">
      <input type="button" id="btnOtraDir" value="otra direccion">
    </div>
  </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="views/assets/js/quotation-customer.js"></script>
<script type="text/javascript" src="views/assets/js/menu.js"></script>


  </body>
</html>
