<?php
  // $modulo = "usuarios";
function permisos($modulo,$permit){
		$create_user=false;
		$read_user=false;
		$delete_user=false;
		$update_user=false;
 		foreach($permit AS $row){
		 	if ($row['per_crear']== 1 && $row['mod_nombre']==$modulo) {
		   		$create_user = true;
		 	}
		   	if ($row['per_buscar']== 1 && $row['mod_nombre']==$modulo) {
	  			$read_user = true;
		   	}
   			if ($row['per_eliminar']== 1 && $row['mod_nombre']==$modulo) {
		 		$delete_user = true;
		   	}
   			if ($row['per_modificar']== 1 && $row['mod_nombre']==$modulo) {
		 		$update_user = true;
	  		}
		   }
		  $permits=array($create_user,$read_user,$update_user,$delete_user);
		 return $permits;
}
		
		

?>