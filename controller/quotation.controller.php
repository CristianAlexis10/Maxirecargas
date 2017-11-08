<?php
	class QuotationController{
		private $master;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['CLIENT'])) {
				// require_once "views/include/user/scope.header.php";
				require_once "views/modules/customer/quotation/index.php";
				// require_once "views/include/user/scope.footer.php";
			}elseif (isset($_SESSION['CUSTOMER']['ROL']) ) {
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/quotation/index.php";
				require_once "views/include/scope.footer.php";
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/quotation/index.php";
				require_once "views/include/user/scope.footer.php";
			}
		}
	}
?>
