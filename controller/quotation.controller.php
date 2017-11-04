<?php
	class QuotationController{
		private $master;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 	}
		function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/quotation/index.php";
			require_once "views/include/scope.footer.php";
		}
	}
?>