<?php
require_once "controller/doizer.controller.php";
class MsnController{
  private $master;
  private $doizer;
  function __CONSTRUCT(){
    $this->master =  new MasterModel();
    $this->doizer = new DoizerController();
  }
  //administrador
  function admin(){
    // require_once "views/include/scope.header.php";
    require_once "views/modules/admin/assistance/index.php";
    // require_once "views/include/scope.footer.php";
  }
  function newMessage(){
      unset($_SESSION['user_chat']);
    $msn = $_POST["msn"];
    $user = $_SESSION['CUSTOMER']['ID'];
    if (!isset($_SESSION['user_chat'])) {
      // si no existe la estadoConversacion
      $token = $_POST["token"];
      $result = $this->master->insert("chats",array($token,$user,date("Y-m-d"),date('G:i:s'),"proceso"),array("chat_asistente","fecha_fin","hora_fin"));
      if ($result==true) {
        $_SESSION['user_chat']=$token;
        $result = true;
      }else{
        $result=$this->doizer->knowError($result);
      }
    }
    // si  existe la Conversacion guuardar mensaje
    $result = $this->master->insert("mensajexchat",array($_SESSION['user_chat'],$msn),array("chat_asistente"));
    if (!$result==true) {
        $result = $this->doizer->knowError($result);
    }
    echo json_encode($result);
  }
  function readByToken(){
    $token = $_POST['token'];
    $result = $this->master->leerConversacion(array($token));
    $chat = [];
    foreach ($result as $row) {
      if ($row['chat_asistente']!="") {
        $chat[]=array($row['chat_asistente'],$row['mensaje'],"admin");
      }else{
        $chat[]=array($row['usu_primer_nombre']." ".$row['usu_primer_apellido'],$row['mensaje'],"user");
      }
    }
    echo json_encode($chat);
  }
//eliminar chat
  function deleteChat(){
    $result = $this->master->insert("mensajexchat",array($_SESSION['user_chat'],"sistema","Conversación Finalizada"));
    $result=$this->master->finalizarChat(array(date("Y-m-d"),date('G:i:s'),$_SESSION['user_chat'],"finalizado"));
    if ($result==true) {
      unset($_SESSION['user_chat']);
      echo json_encode("Eliminado");
    }else{
      echo json_encode($this->doizer->knowError($result));
    }
  }
  function deleteChatAdmin(){
    $result = $this->master->insert("mensajexchat",array($_POST['token'],"sistema","Conversación Finalizada"));
    $result=$this->master->finalizarChat(array(date("Y-m-d"),date('G:i:s'),$_POST['token'],"finalizado"));
    if ($result==true) {
      unset($_SESSION['user_chat']);
      echo json_encode("Eliminado");
    }else{
      echo json_encode($this->doizer->knowError($result));
    }
  }
  function AllchatsNow(){
      $result = $this->master->chats_actuales();
      echo json_encode($result);
  }
  function newMessageAdmin(){
    $msn = $_POST["msn"];
    $token = $_POST["token"];
    $admin = $_SESSION['CUSTOMER']['NAME']." ".$_SESSION['CUSTOMER']['LAST_NAME'];
    $result = $this->master->insert("mensajexchat",array($token,$admin,$msn));
    if (!$result==true) {
        $result = $this->doizer->knowError($result);
    }
    echo json_encode($result);
  }

  function other(){
    require_once "modules/dos.php";
  }
}
?>
