   <div class="container--quotation">
      <div class="quotation--left">
        <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
          <h1 class="title--movil">crea tu cotizacion</h1>
            <div class="quotation--form">
              <form id="frmNewOrder">
                <p class="subtitle quo">Ingresa los datos de los Productos o Servicios que desea cotizar y espera nuestra respuesta. </p>
                <div class="form-groupuser3">
                  <label for="producto" class="labelyellow">Referencia del producto</label>
                <input type="text" id="producto" class="inputYellow" value="<?php
                  if(isset($_GET['data'])){
                      echo $_GET['data'];
                  }
                ?>">
                </div>
                <input type="button" id="searchPro" class="inputuser3" value="Buscar">
                <a href="#" id="openSearch">¿No sabes cual es tu referencia?</a>
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
              <button type="button" id="back">Anterior</button>
              <button type="button" id="next">Siguiente</button>
              <button type="button" id="otroProducto">Otro producto</button>
              <button type="button" id="orderSiguiente">Terminar</button>
        </div>
      </div>
      <div class="quotation--rigth">
        <h1 class="title--quo">crea</h1>
        <h1 class="title--quo">tu</h1>
        <h1 class="title--quo">cotización</h1>
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
              <label for="dirSent" class="">Dirección de envío</label>
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
      <h2 class="title--modal">detalles de la cotización</h2>
        <div id="detalles">
        </div>
    </div>
    <div class="quotation--form">
      <form id="sendQuotation">
        <h2 class="title--modal">ingresa tus datos</h2>
      <div class="form-groupuser">
        <label for="nameC" class="labelblue">Nombre Completo</label>
        <input type="text" name="data_user" class="inputblue" id="nameC" required>
      </div>
      <div class="form-groupuser">
        <label for="Correoquo" class="labelblue">Correo</label>
        <input type="email" name="data_user" class="inputblue" id="Correoquo" required>
      </div>
      <div class="form-groupuser">
        <label for="tel" class="labelblue">Teléfono</label>
        <input type="number" name="data_user" class="inputblue" onkeypress="return eliminarLetras(event)" id="tel" required>
      </div>
      <div class="form-groupuser">
        <label for="dir" class="labelblue">Dirección</label>
        <input type="text" name="data_user" class="inputblue" id="dir" required>
      </div>
      <div class="form-groupuserbtn">
        <input type="submit" id="confirmQuotation" value="realizar cotizacion">
        <input type="button" id="orderAtras" value="atras">
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
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="views/assets/js/copepr.js"></script>
<script type="text/javascript" src="views/assets/js/main-user.js"></script>
<script type="text/javascript" src="views/assets/js/auth.js"></script>
<script type="text/javascript" src="views/assets/js/menu.js"></script>
<script type="text/javascript" src="views/assets/js/quotation.js"></script>
</html>
