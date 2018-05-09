    <div class="order--fondo">
      <div id="order--formone">
        <div class="orderSuperior">
          <h1>Datos del producto</h1>
          <p>Ingresa el Producto y/o Servicio que deseas Solicitar.</p>
        </div>
        <div class="container--form">
          <form id="frmNewOrder">
            <div class="form-groupuser">
            <label for="producto" class="labelmagenta" id="labelProducto">Referencia</label>
            <input type="text" id="producto" class="inputmagenta"  value="<?php
              if(isset($_GET['data'])){
                  echo str_replace("_"," ",$_GET['data']);;
              }
            ?>">
            <a href="#" id="openSearch">¿No sabes cuál es tu referencia?</a>
            </div>
            <div class="form-groupuserBtn">
              <input type="button" id="searchPro" class="btnMagenta" value="Buscar">
            </div>
            <div class="form-groupuser hide--service ">
              <label for="servicio" class="labelmagenta">Servicio</label>
              <select class="inputmagenta" id="servicio">
                <option>cosa</option>
                <option>cosa2</option>
              </select>
            </div>
            <div class="juntos hide--cantidad">
              <div class="form-groupuser" id="form-groupuser-cantidad">
                <label for="cant" class="labelmagenta">Cantidad</label>
                <input id="cant" class="inputmagenta" onkeypress="return eliminarLetras(event)">
              </div>
              <div class="form-groupuser" id="form-groupuser-cantidadMobile">
                <label for="cantMobile" class="labelmagenta">Cantidad</label>
                <input id="cantMobile" class="inputmagenta" onkeypress="return eliminarLetras(event)">
              </div>
            </div>
            <div class="form-groupuser hide--obs">
              <label for="observ" class="labelmagenta">Observaciones</label>
              <textarea name="name" rows="2" cols="100" id="observ" class="inputmagenta"></textarea>
            </div>
          </form>
        </div>
        <!--  lpera te dejo aca el espacio para que ponga esos botones mas abajo estara el otro espacio-->
        <div class="form-groupuser-btnMagenta">
          <button type="button" id="back" class="btnMagenta">Anterior</button>
          <button type="button" id="next" class="btnMagenta">Siguiente</button>
          <button type="button" id="otroProducto" class="btnMagenta">Otro producto</button>
          <button type="button" id="orderSiguiente" class="btnMagenta">Terminar</button>
          <button type="button" id="orderSiguiente-mobile" class="btnMagenta">Terminar</button>
        </div>
      </div>
      <div id="order--formtwo">
        <div class="orderSuperior">
          <h1>Datos de entrega</h1>
          <p>¿Esta es la dirección donde se solicita el pedido?</p>
          <h2 id="orderDir"><?php echo $_SESSION['CUSTOMER']['ADDRESS'];?></h2>
          <div class="form-groupuser">
            <label for="fechaEntrega" class="labelblue order">Fecha de Entrega:</label>
            <input type="date" id="fechaEntrega" class="inputblue order" min="<?php
            $fecha = date('Y-m-d');
            $nuevafecha = strtotime ( '+0 day' , strtotime ( $fecha ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

            echo $nuevafecha;
             ?>">
         </div>
           <div class="form-groupuser">
             <label for="horaEntrega" class="labelblue order">Hora Aproximada de  Entrega:</label>
             <input type="time" id="horaEntrega" class="inputblue order" required>
           </div>

        </div>
        <div class="container--form">
          <form>
              <div class="form-groupuser2 " id="otraDir">
                <label for="Direc" class="labeluser2">Referencia</label>
                <input id="Direc" class="inputuser2">
              </div>
              <div class="form-groupuser-btnBlue">
                <button type="button" id="orderAtras" class="btnBlue">Atrás</button>
                <button type="button" id="orderAtrasMobile" class="btnBlue">Atrás</button>
                <button type="button" id="confirmOrder" class="btnBlue">Realizar Pedido</button>
                <button type="button" id="btnOtraDir" class="btnBlue">Otra dirección</button>
                <button type="button" id="viewOrder" class="btnBlue">Ver Pedido</button>
              </div>
          </form>
        </div>
        <!-- AQUIIIIIII -->
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
      <h2 class="modal_dirTitle">Cambia tu dirección</h2>
      <div class="form-groupuser">
        <label for="ciudad" class="labelblue">Ciudad</label>
        <select class="inputblue" id="ciudad" ></select>
      </div>
      <div class="form-groupuser">
        <label for="dirSent" class="labelblue">Dirección de envío</label>
        <input id="dirSent" class="inputblue">
      </div>
      <div class="form-groupuser">
          <input type="button" id="newDir" value="Cambiar" class="btnblue">
      </div>
    </div>
  </div>
</div>

    <div id="viewDetail"></div>



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
