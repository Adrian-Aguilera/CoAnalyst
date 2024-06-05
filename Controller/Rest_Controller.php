<?php
require_once '../vendor/autoload.php';

//echo realpath(__DIR__ . '/../../CoAnalyst/');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../CoAnalyst/');
$dotenv->load();

class Rest_Controller{
    public function run_code($script, $language){

        $url =  $_ENV['URL'];
        $data = array(
            'clientId' => $_ENV["clientId"],
            'clientSecret' => $_ENV["clientSecret"],
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
