<?php
require_once "controller/doizer.controller.php";
require_once 'views/assets/lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
	class PdfController{
		private $master;
		private $doizer;
		private $dompdf;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
			$this->dompdf = new Dompdf();
	 	}
		function main(){
			if ( ! isset($_GET['pdf']) ) {
				echo '<a href="index.php?pdf=1">Generar documento PDF</a>';
				exit;
			}
			$dataEmpresa  = $this->master->selectAll("gestion_web");
			$dataQuo = $this->master->datosCotizacion($_GET['data']);
			$dataEn= $this->master->selectBy("usuario",array("usu_codigo",$dataQuo[0]['cot_encargado']));
			$dataUsuario  = $this->master->selectBy("usuario",array('usu_codigo',$dataQuo[0]['usu_codigo']));
			if ($dataUsuario['tip_usu_codigo']==3) {
				$cliEmp = $this->master->selectBy("cliente_empresarial",array("usu_codigo",$dataQuo[0]['usu_codigo']));
				$sede = $this->master->selectBy("sede",array('sed_codigo',$cliEmp['sed_codigo']));
				$empresa = $this->selectBy('empresa',array('emp_codigo',$sede['emp_codigo']));
			}
			//contenido del pdf
			$content = '<html>';
			$content .= '<head>';
			$content .= '<link type="text/css" rel="stylesheet" href="views/assets/css/pdf.css"/>';
			$content .= '</head><body>';
			$content .= '<div class="cabecera">
		      <div class="logo"><img src="views/assets/image/icn-maxi.png"></div>
					<div class="title"><h3>MAXIRECARGAS S.A.S</h3>
		      <p>Toner y Cartuchos</p></div>
		    </div>
		    <div class="informacion">
		      <p>informacion</p>
		    </div>
		      <div class="informacion--container">
		        <div class="left--container">
		          <div class="empresa">
		            <h3>Maxirecargas</h3>
		            <p>'.$dataEmpresa[0]['gw_ct_telefono'].' – '.$dataEmpresa[0]['gw_ct_telefono_2'].'</p>
		            <p>'.$dataEmpresa[0]['gw_ct_correo'].'</p>
		            <p>'.$dataEmpresa[0]['gw_ct_direccion'].'</p>
		          </div>
		          <div class="cliente">';
		            if (isset($empresa)) {
		            	$content .= '<h3>'.$empresa['emp_nombre'].'</h3>';
		            }else{
									$content .= '<h3>Cliente</h3>';
								}
		            $content.= '<p>'.$dataUsuario['usu_primer_nombre'].' '.$dataUsuario['usu_primer_apellido'].'</p>
		            <p>'.$dataUsuario['usu_celular'].'</p>
		            <p>'.$dataUsuario['usu_correo'].'</p>
		            <p>'.$dataUsuario['usu_direccion'].'</p>
		          </div>
		        </div>
		        <div class="rigth--container">
		          <p>Nº Cotizacion: '.$dataQuo[0]['cot_token'].'</p>
		          <p>Fecha Realización: '.$dataQuo[0]['cot_fecha'].'</p>
		        </div>
		      </div>
		      <div class="informacion">
		        <p>contizacion</p>
		      </div>';
			$content.= "<table>";
			$content.= "<tr>";
			$content.= "<th>N°</th>";
			$content.= "<th>Producto</th>";
			$content.= "<th>Cant</th>";
			$content.= "<th>Servicio</th>";
			$content.= "<th>Total</th>";
			$content.= "</tr>";
			$n = 1;
			foreach ($dataQuo as $item) {
				$content.= "<tr>";
				$content.= "<td>".$n."</td>";
				$content.= "<td>".$item['pro_referencia']."</td>";
				$content.= "<td>".$item['proxcot_cantidad']."</td>";
				$content.= "<td>".$item['tip_ser_nombre']."</td>";
				$content.= "<td>".$item['proxcod_res']."</td>";
				$content.= "</tr>";
					$n++;
			}
			$content.= "</table>";
			$content .= '<div class="informacion">
										<p>codiciones de pago</p>
									</div>';
			$content.= '<div class="observation"><b>Condiciones de pago: </b>'." ".$dataQuo[0]["cot_pago"].'</div>';
			$content .= '<div class="observation"><b>Iva: </b>'." ".$dataQuo[0]["cot_iva"].'%'.'</div>';
			$content .= '<div class="observation"><b>Plazo de entrega: </b>'." ".$dataQuo[0]['cot_plazo'].'</div>';
			$content .= '<div class="observation"><b>Entrega:</b>'." ".$dataQuo[0]['cot_entrega'].'</div>';
			$content .= '<div class="observation"><b>Observaciones: </b>'." ".$dataQuo[0]["cot_observacion"].'</div>';
			$content .= '</body></html>';
			//crear el pdf

			$this->dompdf->loadHtml($content);
			$this->dompdf->setPaper('A4', 'portrait'); // (Opcional) Configurar papel y orientación
			$this->dompdf->render(); // Generar el PDF desde contenido HTML
			$pdf = $this->dompdf->output(); // Obtener el PDF generado
			$this->dompdf->stream("Cotización-".$dataQuo[0]['cot_token']); // Enviar el PDF generado al navegador
			}
	}
?>
