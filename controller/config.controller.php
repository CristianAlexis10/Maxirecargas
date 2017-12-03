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
            $result = $this->master->selectAllBy('tipo_usuario',array('tip_usu_maxi','true'));
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
        function selectCategory(){
            $result = $this->master->selectAll('tipo_producto');
            echo json_encode($result);
        }
}
?>
