<?php
	class RecordController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->tableName="";
	 		$this->insertException=array('');
	 		$this->updateException = array('');
	 	}
		function main(){
			require_once "views/include/customer/scope.header.php"; 
			require_once "views/modules/customer/profile/record.php";
			// require_once "views/include/scope.footer.php";
		}
	}
?>
