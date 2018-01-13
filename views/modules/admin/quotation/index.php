<div class="modules customers">
	<div class="title">
		<p>COTIZACIONES</p>
	</div>
	<div id="tabs">
		  <ul>
		    <li><a href="#tabs-2">Pendientes</a></li>
		    <li><a href="#tabs-3">Terminados</a></li>
		  </ul>
		  <div id="tabs-2">
		    	<?php require_once "views/modules/config/datatables/datatable-quotation-pen.php"; ?>
		  </div>
		  <div id="tabs-3">
				<?php require_once "views/modules/config/datatables/datatable-quotation-end.php"; ?>
		  </div>
	</div>
</div>
