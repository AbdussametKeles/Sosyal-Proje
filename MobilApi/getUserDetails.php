<?php 

header("Access-Control-Allow-Origin","*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");


include_once "../Models/responseModel.php";
include_once "../Models/requestModel.php";
include_once "../Models/UserModel/getUserDetailModel.php";
include_once "../Service/getUserDetailsService.php";


$data = json_decode(file_get_contents("php://input"));

$getUserDetailRequestModel = new GetUserDetailRequestModel();
$getUserDetailRequestModel->userID = $data->userID;
$getUserDetailRequestModel->token = $data->token;

$requestModel = new RequestModel();
$requestModel->model = $getUserDetailRequestModel;
$requestModel->requestMessage = "Başarılı";
$requestModel->requestCode = 200;

$responseModel = getUserDetailResponse($requestModel);
echo json_encode($responseModel);
 ?>