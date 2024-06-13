<?php
require "ResponseController.php";

$responseController = new ResponseController();
session_start();
$user_id = $_SESSION['user_id'];
$response = $responseController->getDataByID(intval($user_id));

echo json_encode($response);