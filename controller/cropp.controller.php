<?php
class CroppController{
        function image(){
            $data = $_POST['image'];
            $folder = $_GET['folder'];
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $imageName = time().'.png';
            $_SESSION['new_cropp_image']=$imageName ;
            file_put_contents('views/assets/image/'.$folder.'/'.$imageName, $data);
            echo $imageName;
        }
}




?>
