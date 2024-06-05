<?php
class Rest_Controller{
    public function run_code($script, $language){
        $url = 'https://api.jdoodle.com/v1/execute';
        $data = array(
            'clientId' => '9ed9c63c4e3e2344bbeafd933e588f8',
            'clientSecret' => 'eaab3944f7dda118a58a16e8a4884286312ca1aaa7b713b4aeeaad627140143d',
            'script' => $script,
            'language' => $language,
            'versionIndex' => '0'
        );
        
        $data_string = json_encode($data);
        
        $requests = curl_init($url);
        
        curl_setopt($requests, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($requests, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($requests, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($requests, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
        
        $result = curl_exec($requests);
        
        curl_close($requests);
        return $result;
    }
}
