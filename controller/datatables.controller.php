<?php

require_once "controller/doizer.controller.php";
	class DatatablesController{
	  	private $master;
	  	private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
        function dataTableServices(){
            require_once "views/modules/config/datatables/datatable-services.php";
        }


	}
?>
