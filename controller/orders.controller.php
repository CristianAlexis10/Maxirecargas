<?php
	class OrdersController{
		private $master;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='pedidos') {
						$access = true;
					}
				}
				if (isset($access)) {
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/orders/index.php";
					require_once "views/include/scope.footer.php";
				}else{
					require_once "views/include/user/scope.header.php";
					require_once "views/include/user/scope.hamburger.php";
					require_once "views/modules/customer/orders/orders.php";
					require_once "views/include/user/scope.footer.php";

				}
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/orders/index.php";
				require_once "views/include/user/scope.footer.php";
			}
		}
		function viewDetail(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/orders/detail.php";
			require_once "views/include/scope.footer.php";
		}
		function newRegister(){
			$order = $_POST['data'];
			$ciudad = $_POST['ciudad'];
			$dir = $_POST['dir'];
			$token = $this->randAlphanum(5)."-".$this->randAlphanum(5);
			//registrar en pedido
			if ($dir=="default") {
				$result = $this->master->selectBy("usuario",array('usu_codigo',$_SESSION['CUSTOMER']['ID']));
				$result = $this->master->insert('pedido',array($result['id_ciudad'],$result['usu_direccion'],'En Bodega',$token,date('Y-m-d')),array('ped_codigo','ped_encargado'));
			}else{
				$result = $this->master->insert('pedido',array($ciudad,$dir,'En Bodega',$token,date('Y-m-d')),array('ped_codigo','ped_encargado'));
			}
			//guardar en pedidoxproducto
			if ($result==true) {
				foreach ($order as $row) {
					$data_pro = $this->master->selectBy('producto',array('pro_referencia',$row['producto']));
					$this->master->insert('pedidoxproducto',array($data_order['ped_codigo'],$data_pro['pro_codigo'],$row['cantidad'],$row['obs']));
				}
			}
			if ($result==true) {
				$data_order = $this->master->selectBy('pedido',array('ped_token',$token));
				//guardar en usuarioxpedido
				$result =  $this->master->insert('usuarioxpedido',array($_SESSION['CUSTOMER']['ID'],$data_order['ped_codigo']),array('usuxped_total'));
			}
			if ($result==true) {
					echo json_encode(true);
			}else{
				echo json_encode('Se ha generado un error');
			}
		}

		function randAlphanum($length){
		  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		  $charactersLength = strlen($characters);
		  $randomAlpha = '';
		  for ($i = 0; $i < $length; $i++) {
		       $randomAlpha .= $characters[rand(0, $charactersLength - 1)];
		  }
		  return $randomAlpha;
		}
	}
?>
