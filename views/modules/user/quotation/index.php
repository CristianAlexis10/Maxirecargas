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
            <div class="form-group">
              <label for="dataprod" class="label">Referencia del producto</label>
              <input type="text" name="data[]" class="input" id="dataprod">
            </div>
            <div class="form-group">
              <label for="cantidad" class="label">Cantidad</label>
              <input type="number" name="data[]" class="input" id="cantidad" required>
            </div>
          <div class="form-group">
              <label for="solicitud" class="label">Tipo de Servicio</label>
              <select name="data[]" class="input" id="solicitud" required>

              </select>
            </div>

            <div class="form-group btn">
              <input type="button" id="before" value="Anterior">
                <input type="button" id="nextExis" value="Siguiente">
            </div>
            <div class="form-group btn">
              <input type="button" id="next" value="Otro Producto">
            </div>
            <div class="form-group btn">
              <input type="button"  value="Confirmar">
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
<div class="modal--quotation">
    <div class="quotation--left">
      <form>
        <div class="form-group">
          <label for="nameC" class="label">Nombre Completo</label>
          <input type="text" name="data[]" class="input" id="nameC" required>
        </div>
        <div class="form-group">
          <label for="Correoquo" class="label">Correo</label>
          <input type="text" name="data[]" class="input" id="Correoquo" required>
        </div>
        <div class="form-group">
          <label for="rf" class="label">Descripcion del proyecto</label>
          <textarea name="data[]" rows="2" cols="80" class="input"></textarea>
        </div>
        <div class="form-group">
          <input type="button" id="viewAll" value="Ver Productos a cotizar">
        </div>
        <div class="form-group btn">
          <input type="button" id="confirmQuotation" value="Realizar Cotización">
          <input type="button" id="cancelar" value="Cancelar">
        </div>
      </form>
    </div>
</div>

<!-- SEGUNDA modal -->
<div class="modal--detail">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
   Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
   Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
   Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="views/assets/js/copepr.js"></script>
    <script type="text/javascript" src="views/assets/js/auth.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>
    <script type="text/javascript" src="views/assets/js/quotation.js"></script>
