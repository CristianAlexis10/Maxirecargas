<?php
	class BusinessController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->tableName="empresa";
	 		$this->insertException=array('');
	 		$this->updateException = array('');
	 	}
		function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/business/index.php";
			require_once "views/include/scope.footer.php";
		}
		function profile(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/profile/business/index.php";
			require_once "views/include/scope.footer.php";
		}
	}
?>
