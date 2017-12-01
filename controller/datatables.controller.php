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
        function dataTableTrademark(){
            require_once "views/modules/config/datatables/datatable-trademark.php";
        }
        function dataTableCategories(){
            require_once "views/modules/config/datatables/datatable-categories.php";
        }
        function dataTableUser(){
            require_once "views/modules/config/datatables/datatable-user.php";
        }
        function dataTableEmployee(){
            require_once "views/modules/config/datatables/datatable-employee.php";
        }
        function dataTableCliEmp(){
            require_once "views/modules/config/datatables/datatable-cliEmp.php";
        }
        function dataTableProduct(){
            require_once "views/modules/config/datatables/datatable-products.php";
        }


	}
?>
