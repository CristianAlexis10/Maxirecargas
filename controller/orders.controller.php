<?php
	require_once "controller/doizer.controller.php";
	class OrdersController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='pedidos') {
						$access = true;
					}
				}
				if (isset($access)) {
					$modulo = 'Pedidos';
					$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
					$crud = permisos($modulo,$permit);
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/orders/index.php";
					require_once "views/include/scope.footer.php";
				}else{
					require_once "views/include/customer/scope.header.php";
					// require_once "views/include/user/scope.hamburger.php";
					require_once "views/modules/customer/orders/orders.php";
					require_once "views/include/customer/scope.footer.php";

				}
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/orders/index.php";
				require_once "views/include/user/scope.footer.php";
			}
		}
		function viewDetail(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='pedidos') {
						$access = true;
					}
				}
				if (isset($access)) {
					$modulo = 'Pedidos';
					$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
					$crud = permisos($modulo,$permit);
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/orders/detail.php";
					require_once "views/include/scope.footer.php";
				}else{
					require_once "views/include/user/scope.header.php";
					require_once "views/modules/user/orders/index.php";
					require_once "views/include/user/scope.footer.php";
				}
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/orders/index.php";
				require_once "views/include/user/scope.footer.php";
			}
		}
		function newRegister(){
			$dataMaxi = $this->master->selectAll('gestion_web');
			$order = $_POST['data'];
			$ciudad = $_POST['ciudad'];
			$dir = $_POST['dir'];
			$token = $this->randAlphanum(5)."-".$this->randAlphanum(5);
			//validar fecha de entrega
			if ($this->doizer->validateDate($_POST['dia'],"past")==true) {
				echo json_encode("Selecciona una fecha valida");
				return ;
			}else{
				if ($_POST['dia']==date("Y-m-d")) {
					$hoy = true;
				}
			}
			if ($_POST['hora']=="") {
				echo json_encode("Hora no valida");
				return ;
			}else{
				//si es para hoy
				if (isset($hoy)) {
					$hora = explode(":",$_POST['hora']);
					$horaActual = date('G');
					$horaPedido = $horaActual+4;
					if ($hora[0]<$horaPedido) {
						echo json_encode("Debes realizar tu  pedido con 4 Horas de anticipación");
						return;
					}else{
						$nada = $hora[0];
						if (!$hora[0]>19) {
							$hora[0]=$horaPedido;
						}
						//horario de atencion
						$horaInicioMaxi = explode(":",$dataMaxi[0]['gw_hora_inicio']);
						$horaFinMaxi = explode(":",$dataMaxi[0]['gw_hora_fin']);
						$horaInicio = date("g:i a",strtotime($dataMaxi[0]['gw_hora_inicio']));
						$horaFin = date("g:i a",strtotime($dataMaxi[0]['gw_hora_fin']));
						if ($hora[0]>$horaFinMaxi[0] || ($hora[0]>=$horaFinMaxi[0] && $hora[1]>$horaFinMaxi[1]) || ($hora[0]<=$horaInicioMaxi[0] && $hora[1]<$horaInicioMaxi[1])) {
							echo json_encode("El horario de  atención de Maxirecargas Es de ".$horaInicio." hasta las ".$horaFin." Agenda Tu Pedido para mañana." );
							return ;
						}
					}
				}else{
					//horario de atencion
					$hora = explode(":",$_POST['hora']);
					$horaInicioMaxi = explode(":",$dataMaxi[0]['gw_hora_inicio']);
					$horaFinMaxi = explode(":",$dataMaxi[0]['gw_hora_fin']);
					$horaInicio = date("g:i a",strtotime($dataMaxi[0]['gw_hora_inicio']));
					$horaFin = date("g:i a",strtotime($dataMaxi[0]['gw_hora_fin']));
					if (($hora[0]<=$horaInicioMaxi[0] && $hora[1]<$horaInicioMaxi[1]) || $hora[0]>$horaFinMaxi[0] || ($hora[0]>=$horaFinMaxi[0] && $hora[1]>$horaFinMaxi[1])) {
						echo json_encode("El horario de  atención de Maxirecargas Es de ".$horaInicio." hasta las ".$horaFin );
						return ;
					}
				}
			}
			//validar cantidades
			foreach ($order as $row) {
				if ($row['cantidad']<1) {
					echo json_encode("Ingresa una cantidad valida");
					return;
				}
			}
			//registrar en pedido
			if ($dir=="default") {
				$result = $this->master->selectBy("usuario",array('usu_codigo',$_SESSION['CUSTOMER']['ID']));
				$result = $this->master->insert('pedido',array($result['id_ciudad'],$result['usu_direccion'],'En Bodega',$token,date('Y-m-d'),$_POST['dia'],$_POST['hora']),array('ped_codigo','ped_encargado'));
			}else{
				$result = $this->master->insert('pedido',array($ciudad,$dir,'recepcion',$token,date('Y-m-d'),$_POST['dia'],$_POST['hora']),array('ped_codigo','ped_encargado'));
			}
			if ($result==true) {
				$data_order = $this->master->selectBy('pedido',array('ped_token',$token));
				//guardar en usuarioxpedido
				$result =  $this->master->insert('usuarioxpedido',array($_SESSION['CUSTOMER']['ID'],$data_order['ped_codigo']),array('usuxped_total'));
			}
			//guardar en pedidoxproducto
			if ($result==true) {
				foreach ($order as $row) {
					$data_pro = $this->master->selectBy('producto',array('pro_referencia',$row['producto']));
					$this->master->insert('pedidoxproducto',array($data_order['ped_codigo'],$data_pro['pro_codigo'],$row['servicio'],$row['cantidad'],$row['obs']));
				}
			}
			if ($result==true) {
					$_SESSION['user_new_order']=$token;
					echo json_encode(true);
			}else{
				echo json_encode('Se ha generado un error');
			}
		}
		function 	assign(){
			$estado = "En Proceso";
				if ($_POST['emplo']=="null") {
					$_POST['emplo'] = null;
					$estado = "En Bodega";
				}
			$result = $this->master->assign(array($_POST['order'],$_POST['emplo'],$estado));
			if ($result==true) {
				echo json_encode(true);
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
		function viewOrder(){
			if ($_SESSION['CUSTOMER']['ROL']==5) {
				$order = base64_decode($_GET['data']);
				$crud=array(1,1,1,1);
				$data_order = $this->master->verPedido($order);
				require_once "views/include/scope.header.php";
				if ($data_order[0]['ped_encargado']==$_SESSION['CUSTOMER']['ID']) {
					require_once "views/modules/employe/orders/detail.php";
				}else{
					echo "No Tienes Acceso a este pedido";
				}
				return ;
			}
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='pedidos') {
						$access = true;
					}
				}
				if (isset($access)) {
					$modulo = 'Pedidos';
					$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
					$crud = permisos($modulo,$permit);
					$order = base64_decode($_GET['data']);
					$data_order = $this->master->verPedido($order);
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/orders/detail.php";
				}else{
					require_once "views/include/user/scope.header.php";
					require_once "views/modules/user/orders/index.php";
					require_once "views/include/user/scope.footer.php";
				}
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/orders/index.php";
				require_once "views/include/user/scope.footer.php";
			}

		}
		function viewOrderBy(){
			if (isset($_SESSION['CUSTOMER']['ID'])) {
					$order = base64_decode($_GET['data']);
					$data_order = $this->master->verPedido($order);
					require_once "views/include/user/scope.header.php";
					require_once "views/modules/customer/orders/detail.php";
			}else{
				header("Location: maxirecargas");
			}
		}
		function changeStatus(){
			$data= $_POST['data'];
			$order= $_POST['order'];
			switch ($data) {
				case '1':
							$estado = "En Bodega";
					break;

				case '2':
							$estado = "En Proceso";
					break;
				case '3':
							$estado = "Aplazado";
							$report = true;
							$obs = $_POST['obs'];
					break;
				case '4':
							$estado = "Terminado";
							$total = $_POST['total'];
					break;
				case '5':
							$estado = "Cancelado";
							$report = true;
							$obs = $_POST['obs'];
					break;
				default:
						$estado = "En Bodega";
						break;
			}
			if (isset($report)) {
				$result = $this->master->crearReporte($order,$estado,$obs);

			}else if(isset($total)){
					$result = $this->master->cambiarEstadoPagado($order,$estado,$total,date("Y-m-d"));
			}else{
				$result = $this->master->cambiarEstado($order,$estado);
			}
			if ($result==true) {
				echo json_encode(true);
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
		function preview(){
			$content = "";
			$content .= "<span class='close--modal' id='closeModalOrder'>&times;</span><div class='verPedido'><h1 class='title--modal'>mira tu pedido</h1>";
			$content .= "<table class='tables'><thead><th>Producto:</th><th>Servicio:</th><th>Cantidad:</th><th> Observación :</th></thead><tbody>";
			foreach ($_POST['data'] as $row) {
				$data = $this->master->selectBy('tipo_servicio',array("Tip_ser_cod",$row['servicio']));
				 $content.="<tr><td>".$row['producto']."</td><td>".$data['tip_ser_nombre']."</td><td>".$row['cantidad']."</td><td> ".$row['obs']."</td></tr>";
			}
			$content .= "</tbody></table></div>";
			echo json_encode("<div id='wrap-detail'>".$content."</div>");
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
