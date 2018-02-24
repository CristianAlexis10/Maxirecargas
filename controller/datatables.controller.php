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
					$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
					$modulo = 'productos';
					$crud = permisos($modulo,$permit);
            require_once "views/modules/config/datatables/datatable-products.php";
        }
        function dataTableOrderPending(){
            require_once "views/modules/config/datatables/datatable-pending.php";
        }
        function dataTableOrderAssing(){
            require_once "views/modules/config/datatables/datatable-assign.php";
        }
        function dataTablePostpone(){
            require_once "views/modules/config/datatables/datatable-postpone.php";
        }
        function dataTableFinished(){
            require_once "views/modules/config/datatables/datatable-finished.php";
        }
        function dataTableCancelled(){
            require_once "views/modules/config/datatables/datatable-cancelled.php";
        }
        function dataTableQuotationPen(){
            require_once "views/modules/config/datatables/datatable-quotation-pen.php";
        }
        function dataTableQuotationEnd(){
            require_once "views/modules/config/datatables/datatable-quotation-end.php";
        }
        function dataTableOrdersUsers(){
            require_once "views/modules/config/datatables/datatable-orders-users.php";
        }
        function dataTableQuotation(){
            require_once "views/modules/config/datatables/datatable-quotation-users.php";
        }


	}
?>
