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
				function selectCityBy(){
            $result = $this->master->selectBy('ciudad',array('id_ciudad',$_POST['id']));
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
        function graficaTotalUser(){
            $naturales = $this->master->totalPersonasNaturales();
            $juridicas = $this->master->totalPersonasJuridicas();
            echo json_encode(array($naturales[0],$juridicas[0] ));
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
        function totalPedidos(){
            $result = $this->master->totalPedidos();
            echo json_encode($result);
        }
        function totalCotizaciones(){
            $result = $this->master->totalCotizaciones();
            echo json_encode($result);
        }
        function pedDay(){
            $result = $this->master->pedDay(date('Y-m-d'));
            echo json_encode($result);
        }
        function pedidosPendientes(){
            $result = $this->master->selectCount("pedido","ped_estado","En Bodega");
            echo json_encode($result);
        }
        function pedidosEnProceso(){
            $result = $this->master->selectCount("pedido","ped_estado","En Proceso");
            echo json_encode($result);
        }
        function pedidosTerminados(){
            $result = $this->master->selectCount("pedido","ped_estado","Terminado");
            echo json_encode($result);
        }
        function listaVisitas(){
			// $user = $_GET['data'];
						$user = 1;
            $result = $this->master->listaVisitas($user);
            echo json_encode($result);
        }
			 function directions(){
				 $result = $this->master->innerJoinDireccion();
				 echo json_encode($result);
			 }
			 function directionOrder(){
				 $result = $this->master->direccionDePedido($_SESSION['ped_detail_token']);
				 echo json_encode($result);
			 }
			 function directionQuotation(){
				 $result = $this->master->direccionDeCotizacion($_SESSION['cod_detail_id']);
				 echo json_encode($result);
			 }
			 function selectServices(){
				 $data=$_POST['data'];
				 $result = $this->master->selectBy('producto',array('pro_referencia',$data));
				 if ($result!=array()) {
					 $result = $this->master->servicioInner($result['pro_codigo']);
				 }else{
					 $result = "No existe Este producto";
				 }
				 echo json_encode($result);
			 }
			 function selectAllServices(){
				 $result = $this->master->selectAll('tipo_producto');
				 echo json_encode($result);
			 }
			 function selectServiceBy(){
				 $data = $_POST['data'];
				 	$result = $this->master->selectBy('tipo_servicio',array('Tip_ser_cod',$data));
					echo json_encode($result);
			 }
			 function contact(){
				 require_once "views/modules/config/contact/contact-info.php";
			 }
			 function mapRouteToday(){
				 $result = array();
				 foreach ($_SESSION['mapRouteToday'] as $row) {
					 $loca = $this->master->innerJoinLocalizacion($row['ped_ciudad']);
					 $result[] = array('localizacion'=>$loca['pai_nombre']." ".$loca['dep_nombre']." ".$loca['ciu_nombre'],'dir' => $row['ped_direccion']);
				 }
				 echo json_encode($result);
			 }
			 function dataContact(){
				 $result = $this->master->selectAll("gestion_web");
				 $result[0]['gw_vision']=utf8_encode($result[0]['gw_vision']);
				 $result[0]['gw_micro_des']=utf8_encode($result[0]['gw_micro_des']);
				 $result[0]['gw_mision']=utf8_encode($result[0]['gw_mision']);
				 $result[0]['gw_politicas']=utf8_encode($result[0]['gw_politicas']);
				 $data=array(array("desc"=>$result[0]['gw_micro_des'],"mision"=>$result[0]['gw_mision'],"vision"=>$result[0]['gw_vision'],"politicas"=>$result[0]['gw_politicas'],"gw_ct_telefono"=>$result[0]['gw_ct_telefono'],"gw_ct_telefono_2"=>$result[0]['gw_ct_telefono_2'],"gw_ct_whatsapp"=>$result[0]['gw_ct_whatsapp'],"gw_ct_correo"=>$result[0]['gw_ct_correo'],"gw_ct_direccion"=>$result[0]['gw_ct_direccion'],"gw_hora_inicio"=>$result[0]['gw_hora_inicio'],"gw_hora_fin"=>$result[0]['gw_hora_fin']));
					echo json_encode($data);
			 }
}
?>
