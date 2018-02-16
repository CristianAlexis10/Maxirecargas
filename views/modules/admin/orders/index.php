
<div class="modules orders">
	<div class="title">
		<p>PEDIDOS</p>
	</div>

<?php if ($crud[1]==true) {?>
	<div id="tabs">
		  <ul>
				<li><a href="#tabs-1">Pendientes</a></li>
		    <li><a href="#tabs-2">Asignados/En proceso</a></li>
		    <li><a href="#tabs-3">Aplazados</a></li>
		    <li><a href="#tabs-4">Terminados</a></li>
		    <li><a href="#tabs-5">Cancelados</a></li>
		  </ul>

			<div id="tabs-1">
				<?php require_once "views/modules/config/datatables/datatable-pending.php"; ?>
			</div>
		  <div id="tabs-2">
				<?php require_once "views/modules/config/datatables/datatable-assign.php"; ?>
		  </div>
		  <div id="tabs-3">
				<?php require_once "views/modules/config/datatables/datatable-postpone.php"; ?>
		  </div>
		  <div id="tabs-4">
				<?php require_once "views/modules/config/datatables/datatable-finished.php"; ?>
		  </div>
		  <div id="tabs-5">
				<?php require_once "views/modules/config/datatables/datatable-cancelled.php"; ?>

		  </div>

	</div>
</div>
<div id="modal-assign" class="modales">
	<div class="container--modales">
		<span id="clAssig" class="close_modal_pedido">&times;</span>
		<h1>Elige el encargado:</h1>
		<div class="infomodal">
			<select id="addOrder">
				<option value="null">Pendiente</option>
				<?php foreach ($this->master->selectAllBy('usuario',array('tip_usu_codigo',5)) as $row) {?>
					<option value="<?php echo $row['usu_codigo'] ?>"><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ?></option>
				<?php }?>
			</select>
			<input type="button" id="confirmAssign" value="Seleccionar">
		</div>
	</div>
</div>

<div class="modal-status modales">
	<div class="container--modales">
		<span class="closemodales" id="closeStatus">&times;</span>
		<h2 class="elegir">Verifica el estado de los pedidos</h2>
		<div class="infomodal">
			<select id="newStatus">
				<option value="1">En Recepción</option>
				<option value="2">En Proceso</option>
				<option value="3">Aplazado</option>
				<option value="4">Terminado</option>
				<option value="5">Cancelado</option>
			</select>
			<input type="button" id="saveStarus" value="Guardar">
		</div>
	</div>
</div>

<div id="modal-motive" >
	<div class="modalOn">
		<span>&times;</span>
		<h1 class="elegir">Motivo:</h1>
		<div class="infomodal">
			<textarea id="motive" rows="8" cols="80"></textarea>
		</div>
		<input type="submit" class="btn" value="enviar">
	</div>
</div>

<div id="modal-total">
	<h2 class="elegir">Total Pagado: </h2>
	<input type="text" id="total">
</div>
<?php }else{
	echo "No tienes permiso para este modulo";
}?>
