<?php 
header("Access-Control-Allow-Origin","*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");


include_once "../Models/requestModel.php";
include_once "../Models/responseModel.php";
include_once "../Models/UserModel/deleteUserModel.php";
include_once "../Service/deleteUserService.php";

$data = json_decode(file_get_contents("php://input"));

$deleteUser = new DeleteUserRequestModel();

$deleteUser->id = $data->id;
$deleteUser->token = $data->token;

$requestModel = new RequestModel();
$requestModel->model = $deleteUser;
$requestModel->requestCode = 200;
$requestModel->requestMessage = "Başarılı";

$responseModel = deleteUserResponse($requestModel);
echo json_encode($responseModel);
 ?>