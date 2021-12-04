<?php

class Utility
{
    

    public function sendMailSMTP($data)
    {
        $config ['protocol'] = "smtp";
        $config ['smtp_host'] = SMTP_HOST;
        $config ['smtp_port'] = SMTP_PORT;
        $config ['smtp_user'] = SMTP_USER;
        $config ['smtp_pass'] = SMTP_PASS;
        $config ['smtp_timeout'] = 20;
        $config ['priority'] = 1;
        
        $config ['charset'] = 'utf-8';
        $config ['wordwrap'] = TRUE;
        $config ['crlf'] = "\r\n";
        $config ['newline'] = "\r\n";
        $config ['mailtype'] = "html";
        
        $CI = & get_instance();
        $message = $data ["message"];
        $CI->load->library('email', $config);
        $CI->email->initialize($config);
        $CI->email->clear();
        $CI->email->from($config ['smtp_user'], 'Grocery');
        $CI->email->to($data ["to"]);
        if (isset($data ["bcc"])) {
            $CI->email->bcc($data ["bcc"]);
        }
        $CI->email->reply_to($config ['smtp_user'], '<noreply@stagegator.com>');
        $CI->email->subject($data ["subject"]);
        $CI->email->message($message);
        $response = $CI->email->send();
        
        return true;
    }
    
    function sendNotification($deviceToken,$pacakgeId,$message){
       
        $message = array(
            'message' => "new package added",
            'package_id' => $pacakgeId,
        );
        for($i=0; $i<count($deviceToken); $i++){
            if($deviceToken[$i]['type'] == '0'){
                $this->notificationForIOS($deviceToken[$i]['device_id'], $message);
            }else if($deviceToken[$i]['type'] == '1'){
                $this->notificationForAndroid($deviceToken[$i]['device_id'],$message);
            }
        }
        return TRUE;
    }
    
    function notificationForIOS($deviceId,$msg){

            $passphrase = '1234';
            $ctx = stream_context_create();
            stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-dev.pem');
            stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

            $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 30, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

            if (!$fp)
                exit("Failed to connect: $err $errstr" . PHP_EOL);

            
            $message = $msg;

            // Create the payload body
            $body ['aps'] = array(
                'alert' => $message['message'],
                'package_id' => $message['package_id'],
                'badge' => 1,
                'sound' => 'default',
                'type' => 'Package'
            );

            // Encode the payload as JSON
            $payload = json_encode($body);

            // Build the binary notification
            $msg = chr(0) . pack('n', 32) . pack('H*', $deviceId) . pack('n', strlen($payload)) . $payload;

            // Send it to the server
            $result = fwrite($fp, $msg, strlen($msg));
//            var_dump($result); die;
            fclose($fp);
            
    }
    
    function notificationForAndroid($deviceId,$msg) {
           
           
            $message = $msg;
            
            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array(
                'to' => $deviceId,
                'notification' => array(
                    "body" => $message['message'],
                    "title" => "Touristo",
                    "click_action" => "ACTION_PACKAGE",
                ),
                "data" => array(
                    "body" => $message['message'],
                    "title" => "Touristo",
                    "package_id" => (int)$message['package_id'],
                    "notify" => "notification",
                    'type' => 'Package',
                    "click_action" => "ACTION_PACKAGE",
                )
            );
            
            $fields_json = json_encode($fields);
            
            $headers = array(
                'Authorization: key=' . API_KEY_NOTIFICATION,
                'Content-Type: application/json'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_json);
            $result = curl_exec($ch);
            curl_close($ch);
        }
}

?>