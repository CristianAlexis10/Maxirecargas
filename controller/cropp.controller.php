<?php
class CroppController{
        function image(){
            $img = $_POST['image'][0].";".$_POST['image'][1];
            //  die(json_encode($img));
             $data =$img;
            $folder = $_GET['folder'];
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $imageName = time().'.png';
            $_SESSION['new_cropp_image']=$imageName ;
            file_put_contents('views/assets/image/'.$folder.'/'.$imageName, $data);
            echo json_encode($imageName);
        }
}




?>
