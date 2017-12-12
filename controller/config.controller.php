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
        function clientesRegistrados(){
            $result = $this->master->clientesRegistrados();
            echo json_encode($result);
        }
        function promedioComprasMesUsuario(){
            $result = $this->master->porcentajeMensual(date('m'));
            echo json_encode($result);
        }
        function productosMasSolicitados(){
            $result = $this->master->productosMasSolicitados(date('m'),(date('m')-1),(date('m')-2));
            echo json_encode($result);
        }
        function clientesEstrellas(){
            $result = $this->master->clientesEstrellas();
            echo json_encode($result);
        }
        function ventaDiaria(){
            $result = $this->master->ventaDiaria(date('Y-m-d'));
            echo json_encode($result);
        }
        function ventaMensual(){
            $result = $this->master->ventaMensual(date('m'));
            echo json_encode($result);
        }
        function productosAgotarse(){
            $result = $this->master->productosAgotarse();
            echo json_encode($result);
        }
        function listaVisitas(){
			// $user = $_GET['data'];
						$user = 1;
            $result = $this->master->listaVisitas($user);
            echo json_encode($result);
        }
			 function directions(){
				 $result = $this->master->selectAllBy('usuario',array('tip_usu_codigo',1));
				 echo json_encode($result);
			 }
			 function selectServices(){
				 $data=$_POST['data'];
				 $result = $this->master->selectBy('producto',array('pro_referencia',$data));
				 if ($result!=array()) {
					 $result = $this->master->selectAllBy('servicioxproducto',array('pro_codigo',$data));
				 }else{
					 $result = "No existe Este producto";
				 }
			 }
			 function selectAllServices(){
				 	$result = $this->master->selectAll('tipo_servicio');
					echo json_encode($result);
			 }
}
?>
