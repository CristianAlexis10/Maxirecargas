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
		            <h3>Maxirecargas</h3>
		            <p>2557878 – 5774223</p>
		            <p>maxirecargas2009@hotmail.com</p>
		            <p>Calle 6C sur 83ª 45 INT 202</p>
								<p>Medellín – Antioquia.</p>
		          </div>
		          <div class="cliente">
		            <h3>nombre de la empresa</h3>
		            <p>cristian</p>
		            <p>1234456</p>
		            <p>yonosoybond@gmail.com</p>
		            <p>Medellín – Antioquia.</p>
		          </div>
		        </div>
		        <div class="rigth--container">
		          <p>Nº Cotizacion: 001242</p>
		          <p>Fecha Actual: 10/05/2018</p>
		          <p>Cotizacion Valida:10/11/2018</p>
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
			$this->dompdf->stream("Cotización-".$dataQuo[0]['usu_primer_nombre']." ".$dataQuo[0]['usu_primer_apellido']); // Enviar el PDF generado al navegador
			}
	}
?>
