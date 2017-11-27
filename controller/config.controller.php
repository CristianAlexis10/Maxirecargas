<?php
class ConfigController{
	  	private $master;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 	}

        function selectCity(){
            $result = $this->master->selectAll('ciudad');
            echo json_encode($result);
        }
        function selectRole(){
            $result = $this->master->selectAll('tipo_usuario');
            echo json_encode($result);
        }
        function selectTipDoc(){
            $result = $this->master->selectAll('tipo_documento');
            echo json_encode($result);
        }
        function selectMark(){
            $result = $this->master->selectAll('marca');
            echo json_encode($result);
        }
}
?>
