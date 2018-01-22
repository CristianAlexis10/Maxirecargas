    <div class="order--fondo">
      <div id="order--formone">
        <div class="orderSuperior">
          <h1>datos del producto</h1>
          <p>Ingresa el Producto y Servicio que deseas Cotizar.</p>
        </div>
        <div class="container--form">
          <form id="frmNewOrder">
            <div class="form-groupuser3">
              <label for="producto" class="labelselect3">referencia</label>
            <input type="text" id="producto" class="inputuser3" >
            </div>
            <input type="button" id="searchPro" class="inputuser3" value="Buscar">
            <div class="form-groupuser3 hide--service ">
              <label for="servicio" class="labelselect3">servicio</label>
              <select class="selectuser3 " id="servicio">
                <option>cosa</option>
                <option>cosa2</option>
              </select>
            </div>
            <div class="juntos hide--cantidad">
              <div class="form-groupuser3">
                <label for="cant" class="labeluser3">cantidad</label>
                <input id="cant" class="inputuser3">
              </div>
            </div>
            <div class="form-groupuser3 hide--obs">
              <label for="observ" class="labeluser3">observaciones</label>
              <textarea name="name" rows="2" cols="100" id="observ" class="inputuser3"></textarea>
            </div>
          </form>
        </div>
        <!--  lpera te dejo aca el espacio para que ponga esos botones mas abajo estara el otro espacio-->
        <button type="button" id="back">Anterior</button>
        <button type="button" id="next">siguiente</button>
        <button type="button" id="otroProducto">Otro producto</button>
        <button type="button" id="orderSiguiente">Terminar</button>
      </div>
      <div id="order--formtwo">
        <div class="orderSuperior">
          <h1>Datos de entrega</h1>
          <p>¿Esta es la direccion donde se solicita el pedido?</p>
          <h2 id="orderDir"><?php echo $_SESSION['CUSTOMER']['ADDRESS'];?></h2>
        </div>
        <div class="container--form">
          <form>
              <div class="form-groupuser2 " id="otraDir">
                <label for="Direc" class="labeluser2">referencia</label>
                <input id="Direc" class="inputuser2">
              </div>
              <div class="Orderbtn2">
                <button type="button" id="confirmOrder">Realizar Cotizacion</button>
                <button type="button" id="btnOtraDir">otra direccion</button>
                <button type="button" id="viewOrder">Ver Cotizacion</button>
              </div>
          </form>
        </div>
        <!-- AQUIIIIIII -->
        <button type="button" id="orderAtras">atras</button>
      </div>
    </div>
    <div id="order--container">
      <div class="order--contenido">
        <div class="order--left">
          <div class="left--superior">
            <h1>haz</h1>
            <h1>tu</h1>
            <h1>COTIZACION</h1>
          </div>
        </div>
        <div class="order--rigth">
          <div class="right--superior">
            <h1>haz</h1>
            <h1>tu</h1>
            <h1>COTIZACION</h1>
          </div>
        </div>
      </div>
    </div>
<span class="menuorder"><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>

<div class="modal--dir" id="modal_dir">
  <div class="content_modal_dir">
    <span id="closemodal_dir">&times;</span>
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

<div id="viewDetail"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="views/assets/js/copepr.js"></script>
<script type="text/javascript" src="views/assets/js/quotation-customer.js"></script>
<script type="text/javascript" src="views/assets/js/menu.js"></script>


  </body>
</html>
