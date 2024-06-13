<?php
require "ResponseController.php";

$responseController = new ResponseController();

$response = $responseController->getAll_datos();

echo json_encode($response);