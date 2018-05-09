   <div class="container--quotation">
      <div class="quotation--left">
        <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
          <h1 class="title--movil">crea tu cotización</h1>
            <div class="quotation--form">
              <form id="frmNewOrder">
                <p class="subtitle quo">Ingresa los datos de los Productos y/o Servicios que desea cotizar y espera nuestra respuesta. </p>
                <div class="form-groupuser3" id="error--quoRef">
                  <label for="producto" class="labelyellow error">Referencia del producto</label>
                <input type="text" id="producto" class="inputYellow" value="<?php
                  if(isset($_GET['data'])){
                      echo str_replace("_"," ",$_GET['data']);
                  }
                ?>" >
                </div>
                <a id="openSearch">¿No sabes cuál es tu referencia?</a>
                <div class="form-groupuserBtn">
                  <input type="button" id="searchPro" class="btnYellow" value="Buscar">
                </div>
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
                    <input type="number" id="cant" onkeypress="return eliminarLetras(event)" class="inputYellow">
                  </div>
                </div>
                <div class="form-groupuser3 hide--obs">
                  <label for="observ" class="labelyellow">observaciones</label>
                  <textarea name="name" rows="2" cols="100" id="observ" class="inputYellow"></textarea>
                </div>
              </form>
              <div class="container_orderbtn">
                <button type="button" id="back" class="btnYellow">Anterior</button>
                <button type="button" id="next" class="btnYellow">Siguiente</button>
                <button type="button" id="otroProducto" class="btnYellow">Otro producto</button>
                <button type="button" id="orderSiguiente" class="btnYellow">Terminar</button>
              </div>
        </div>
      </div>
      <div class="quotation--rigth">
        <h1 class="title--quo">crea</h1>
        <h1 class="title--quo">tu</h1>
        <h1 class="title--quo">cotización</h1>
      </div>

      <div class="modal" id="modal_dir">
        <div class="content_modal_dir">
          <span id="closemodal_dir">&times;</span>
          <img src="views/assets/image/logo.png" class="image_modal">
          <div class="modal_form">
            <div class="form-groupuser">
              <label for="ciudad" class="labelblue">Ciudad</label>
              <select class="inputblue" id="ciudad"></select>
            </div>
            <div class="form-groupuser">
              <label for="dirSent" class="labelblue">Dirección de envío</label>
              <input id="dirSent" class="inputblue">
            </div>
            <div class="quotationBtn">
                <input type="button" id="newDir" value="Cambiar">
            </div>
          </div>
        </div>
      </div>
</div>

<div class="modal" id="modalConfir">
  <div class="modal--container busqueda">
    <div class="detalle">
        <div id="detalles"></div>
    </div>
    <div class="quotation--form">
      <form id="sendQuotation">
      <p>¿Esta es la dirección donde se solicita el pedido? si no es asi darle click al boton otra direccion para actualizar este dato.</p>
      <h2 id="orderDir"><?php echo $_SESSION['CUSTOMER']['ADDRESS'];?></h2>
    <div class="quotationBtn">
      <input type="button" id="orderAtras" value="atras">
      <input type="button" id="confirmOrder" value="realizar cotizacion">
      <input type="button" id="btnOtraDir" value="otra direccion">
    </div>
  </form>
    </div>
  </div>
</div>

<!-- opciones de busqueda -->
<div class="modal" id="modalSearch">
  <div class="modal--container busqueda">
      <span id="close_modal_search" class="close--modal">&times;</span>
      <h2 class="title--modal">Opciones de Busqueda</h2>
      <p class="subtitle--modal">Puedes buscar por marca, palabras claves, tipo de producto,características, etc.</p>
      <form id="frmOptionSearch">
        <div class="frm-groupuser">
            <input type="text" id="optionSearch" class="inputblue" placeholder="buscar...">
            <input type="submit"  value="Buscar" id="searchCot">
        </div>
        <!-- resultado -->
      </form>
      <div class="result">
        <h2 id="message" class="title--modal"></h2>
        <table id="tabla" class="tables">
            <tr>
                <th>Referencia</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Descripción</th>
                <th>Palabras Clave</th>
                <th>Seleccionar</th>
            </tr>
        </table>
      </div>
  </div>
</div>
<?php require_once "views/include/customer/scope.footer.php";?>
