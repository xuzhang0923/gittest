<?php
    if (isset($_POST["regId"]) && isset($_POST["message"])) {
        $regId = $_POST["regId"];
        $message = $_POST["message"];
        
        include_once './GCM.php';
        
        $gcm = new GCM();
        
        $registatoin_ids = array($regId);
        $detail = array('content-available' => '1','badge' => $message,'reconcile-mode' => '1');
        $message = array('aps' => $detail);
        
        $result = $gcm->send_notification($registatoin_ids, $message);
        
        echo $result;
    }
?>