<div class="modules customers">
	<div class="title">
		<p>Rutas</p>
	</div>
	<div id="tabs">
		  <ul>
		    <li><a href="#tabs-2">Del Día</a></li>
		    <li><a href="#tabs-3">Todas</a></li>
		  </ul>
		  <div id="tabs-2">
		    	<?php require_once "views/modules/config/datatables/datatable-route-today.php"; ?>
		  </div>
		  <div id="tabs-3">
				<?php require_once "views/modules/config/datatables/datatable-route-all.php"; ?>
		  </div>
	</div>
</div>
