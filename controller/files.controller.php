<?php
class FilesController{
    
    public function image($image){
        if (isset($image['file']) && $image['file']['error'] == 0) {
            $allowed = array('jpg'=>'image/jpg','png'=>'image/png','gif'=>'image/gif','jpeg'=>'image/jpeg');
            $filetype=$image['file']['type'];
            $filesize=$image['file']['size'];
            $extention = pathinfo($image['file']['name']);
            $extention=".".$extention['extension'];
            $rand = rand(10000,999999)*rand(10000,999999);
            $tmp_name=md5($rand.$image['file']['name']);
            $filename=$tmp_name.$extention;
            $extention=pathinfo($filename,PATHINFO_EXTENSION);
            if (!array_key_exists($extention,$allowed)) {
                die("Error: Seleccione un formato valido(jpg,png,gif) ");
            }
            $maxsize=2*1024*1024;
            if ($filesize>$maxsize) {
                die("Error: el tamaño del archivo debe ser menor o igual a 2 mb");
            }
            if (in_array($filetype,$allowed)) {
                if (file_exists("views/assets/image/gender/".$filename)) {
                    die("El archivo ya existe");
                }else{
                    $result = array(true,$filename);
                    return $result ;                }
            }else{
                die("Error: No se ha reconocido la imagen");
            }
        }else{
            die("Error: ".$image['file']['error']);
        }
        
       
    }
   
}
?>
