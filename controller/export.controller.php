<?php
require_once "controller/doizer.controller.php";
	class ExportController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
		function main(){
			$nombre_tabla = "cotizacion";
			//trater todas las columnas
			$columnas = $this->master->columnsOfTableExport($nombre_tabla);
			$cantidad = explode(";",$columnas);
			//cambiar el nombre de la tabla
	      $nombre_archivo = "xml/$nombre_tabla.txt";
	      if (file_exists($nombre_archivo)) {
	        $mensaje = "El archivo $nombre_archivo se ha modificado";
	      }else {
	        $mensaje = "el archivo $nombre_archivo se ha creado";
	      }
	      if ($archivo = fopen($nombre_archivo, "a")) {
					//cambiar los campos de  tabla
					fwrite($archivo,$columnas." \r\n");
					//cambiar el nombre de la tabla
					foreach ($this->master->selectAll($nombre_tabla) as $row) {
						//poner la cantidad de row[]
						if (fwrite($archivo, $row[0].";".$row[1].";".$row[2].";".$row[3].";".$row[4].";".$row[5].";".$row[6].";".$row[7].";"."\r\n")) {
						}else {
							die("ha habido un problema al crear el archivo");
						}
					}
	        fclose($archivo);
	      }
				echo "ejecutado";
		}
	}
?>
