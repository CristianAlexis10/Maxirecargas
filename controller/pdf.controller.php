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
			//contenido del pdf
			$content = '<html>';
			$content .= '<head>';
			$content .= '<link type="text/css" rel="stylesheet" href="views/assets/css/pdf.css"/>';
			$content .= '</head><body>';
			$content.= "<table>";
			$content.= "<tr>";
			$content.= "<td>N°</td>";
			$content.= "<td>Producto</td>";
			$content.= "<td>Cantidad</td>";
			$content.= "<td>Servicio</td>";
			$content.= "<td>Obs</td>";
			$content.= "<td>Total</td>";
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
			$content .= "<b>Observaciones: </b>".$dataQuo[0]['cot_observacion'];
			$content .= '</body></html>';
			//crear el pdf

			$this->dompdf->loadHtml($content);
			$this->dompdf->setPaper('A4', 'landscape'); // (Opcional) Configurar papel y orientación
			$this->dompdf->render(); // Generar el PDF desde contenido HTML
			$pdf = $this->dompdf->output(); // Obtener el PDF generado
			$this->dompdf->stream(); // Enviar el PDF generado al navegador
			}
	}
?>
