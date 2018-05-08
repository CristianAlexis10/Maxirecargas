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
			$dataQuo = $this->master->datosCotizacion($_GET['data']);
			$dataEn= $this->master->selectBy("usuario",array("usu_codigo",$dataQuo[0]['cot_encargado']));
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
		            <h3>nombre de la empresa</h3>
		            <p>nombre de contacto</p>
		            <p>telefono</p>
		            <p>correo</p>
		            <p>cuidad</p>
		          </div>
		          <div class="cliente">
		            <h3>nombre de la empresa</h3>
		            <p>nombre de contacto</p>
		            <p>telefono</p>
		            <p>correo</p>
		            <p>cuidad</p>
		          </div>
		        </div>
		        <div class="rigth--container">
		          <p>Nº Cotizacion</p>
		          <p>Fecha Actual</p>
		          <p>Cotizacion Valida</p>
		        </div>
		      </div>
		      <div class="informacion">
		        <p>contizacion</p>
		      </div>';
			$content.= "<table>";
			$content.= "<tr>";
			$content.= "<th>N°</th>";
			$content.= "<th>Producto</th>";
			$content.= "<th>Cantidad</th>";
			$content.= "<th>Servicio</th>";
			$content.= "<th>Obs</th>";
			$content.= "<th>Total</th>";
			$content.= "</tr>";
			$n = 1;
			foreach ($dataQuo as $item) {
				$content.= "<tr>";
				$content.= "<td>".$n."</td>";
				$content.= "<td>".$item['pro_referencia']."</td>";
				$content.= "<td>".$item['proxcot_cantidad']."</td>";
				$content.= "<td>".$item['tip_ser_nombre']."</td>";
				$content.= "<td>".$item['proxcod_observacion']."</td>";
				$content.= "<td>".$item['proxcod_res']."</td>";
				$content.= "</tr>";
					$n++;
			}
			$content.= "</table>";
			$content.= "<div class=""><b>Condiciones de pago: </b>.$dataQuo[0]['cot_pago']</div>";
			$content .= "<div><b>Observaciones: </b>.$dataQuo[0]['cot_observacion']</div>";
			$content .= "<div><b>Iva: </b>.$dataQuo[0]['cot_iva']</div>";
			$content .= "<div><b>Plazo de entrega: </b>.$dataQuo[0]['cot_plazo']</div>";
			$content .= "<div><b>Entrega: </b>.$dataQuo[0]['cot_entrega'</div>"];
			$content .= "<div><b>Encargado: </b>.$dataEn['usu_primer_nombre'</div>"]." ".$dataEn['usu_primer_apellido'];
			$content .= "<b>Correo: </b>".$dataEn['usu_correo'];
			$content .= '</body></html>';
			//crear el pdf

			$this->dompdf->loadHtml($content);
			$this->dompdf->setPaper('A4', 'landscape'); // (Opcional) Configurar papel y orientación
			$this->dompdf->render(); // Generar el PDF desde contenido HTML
			$pdf = $this->dompdf->output(); // Obtener el PDF generado
			$this->dompdf->stream("Cotización-".$dataQuo[0]['usu_primer_nombre']." ".$dataQuo[0]['usu_primer_apellido']); // Enviar el PDF generado al navegador
			}
	}
?>
