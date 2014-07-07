<?php
    class GCM{
        function __construct(){
            
        }
        
        public function send_notification($registration_ids, $message){
            include_once './config.php';
            
            $url = 'https://android.googleapis.com/gcm/send';
            
            $fields = array(
                'registration_ids' => $registration_ids,
                'data' => $message,
                            );
                            
            echo(json_encode($fields));
            
            $headers = array(
                'Authorization: key=' . GOOGLE_API_KEY,
                'Content-Type: application/json'
            );
            
            $ch = curl_init();
            
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
            curl_setopt($ch,CURLOPT_PROXY,"10.27.7.110:8080");
            
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
            
            $result = curl_exec($ch);
            if($result === FALSE){
                die('Crul failed: ' . curl_error($ch));
            }
            
            curl_close($ch);
            echo $result;
        }
    }
?>