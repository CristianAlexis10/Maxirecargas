    <div class="order--fondo">
      <div id="order--formone">
        <div class="orderSuperior">
          <h1>datos del producto</h1>
          <p>Ingresa el Producto y/o Servicio que deseas Solicitar.</p>
        </div>
        <div class="container--form">
          <form id="frmNewOrder">
            <div class="form-groupuser">
              <label for="producto" class="labelmagenta">Referencia</label>
            <input type="text" id="producto" class="inputmagenta">
            </div>
            <input type="button" id="searchPro" class="labelmagenta" value="Buscar">
            <a href="#" id="openSearch">¿No sabes cuál es tu referencia?</a>
            <div class="form-groupuser3 hide--service ">
              <label for="servicio" class="labelmagenta">servicio</label>
              <select class="inputmagenta" id="servicio">
                <option>cosa</option>
                <option>cosa2</option>
              </select>
            </div>
            <div class="juntos hide--cantidad">
              <div class="form-groupuser">
                <label for="cant" class="labelmagenta">cantidad</label>
                <input id="cant" class="inputmagenta" onkeypress="return eliminarLetras(event)">
              </div>
            </div>
            <div class="form-groupuser hide--obs">
              <label for="observ" class="labelmagenta">observaciones</label>
              <textarea name="name" rows="2" cols="100" id="observ" class="inputmagenta"></textarea>
            </div>
          </form>
        </div>
        <!--  lpera te dejo aca el espacio para que ponga esos botones mas abajo estara el otro espacio-->
        <button type="button" id="back">Anterior</button>
        <button type="button" id="next">Siguiente</button>
        <button type="button" id="otroProducto">Otro producto</button>
        <button type="button" id="orderSiguiente">Terminar</button>
      </div>
      <div id="order--formtwo">
        <div class="orderSuperior">
          <h1>Datos de entrega</h1>
          <p>¿Esta es la Dirección donde se solicita el pedido?</p>
          <h2 id="orderDir"><?php echo $_SESSION['CUSTOMER']['ADDRESS'];?></h2>
          <label for="fechaEntrega" class="labelmagenta">Fecha de Entrega:</label>
          <input type="date" id="fechaEntrega" class="inputmagenta" min="<?php
          $fecha = date('Y-m-d');
          $nuevafecha = strtotime ( '+0 day' , strtotime ( $fecha ) ) ;
          $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

          echo $nuevafecha;
           ?>">

           <div>
             <label for="horaEntrega" class="labelmagenta">Hora Aproximada de  Entrega:</label>
             <input type="time" id="horaEntrega" class="inputmagenta" required>
           </div>

        </div>
        <div class="container--form">
          <form>
              <div class="form-groupuser2 " id="otraDir">
                <label for="Direc" class="labeluser2">referencia</label>
                <input id="Direc" class="inputuser2">
              </div>
              <div class="Orderbtn2">
                <button type="button" id="confirmOrder">Realizar Pedido</button>
                <button type="button" id="btnOtraDir">otra dirección</button>
                <button type="button" id="viewOrder">Ver Pedido</button>
              </div>
          </form>
        </div>
        <!-- AQUIIIIIII -->
        <button type="button" id="orderAtras">atrás</button>
      </div>
    </div>
    <div id="order--container">
      <div class="order--contenido">
        <div class="order--left">
          <div class="left--superior">
            <h1>haz</h1>
            <h1>tu</h1>
            <h1>pedido</h1>
          </div>
        </div>
        <div class="order--rigth">
          <div class="right--superior">
            <h1>haz</h1>
            <h1>tu</h1>
            <h1>pedido</h1>
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
        <label for="dirSent" class="">Dirección de envío</label>
        <input id="dirSent" class="">
      </div>
      <div class="form-groupuser3">
          <input type="button" id="newDir" value="Cambiar">
      </div>
    </div>
  </div>
</div>

<div id="viewDetail"></div>


<!-- opciones de busqueda -->
<div class="modal" id="modalSearch">
  <div class="modal--container" >
      <span id="close_modal_search">&times;</span>
      <form id="frmOptionSearch">
        <h2>Opciones de Búsqueda</h2>
        <p>Puedes buscar por marca, palabras claves, tipo de producto,características, etc.</p>
        <div class="frm-group">
            <input type="text" id="optionSearch" >
            <input type="submit"  value="Buscar">
        </div>
        <!-- resultado -->
        <div class="result">
          <h1 id="message"></h1>
          <table id="tabla" border=1>
              <tr>
                  <td>Referencia</td>
                  <td>Categoría</td>
                  <td>Marca</td>
                  <td>Descripción</td>
                  <td>Palabras Clave</td>
                  <td>Si</td>
              </tr>
          </table>
        </div>
      </form>
  </div>
</div>
