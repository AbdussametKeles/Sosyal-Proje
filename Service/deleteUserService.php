<?php 
include_once "../Models/requestModel.php";
include_once "../Service/deleteUserService.php";
include_once "../Models/UserModel/deleteUserModel.php";
include_once "../Config/Database.php";

function deleteUserResponse(RequestModel $requestModel){

$database = new Database();
$db = $database->getConnection();

$query = "DELETE FROM kullanici where id =?";

$stmt = $db->prepare($query);
$stmt->bindParam(1,$requestModel->model->id);
$stmt->execute();


$deleteUser = new DeleteUserResponseModel();
$deleteUser->id = $requestModel->model->id;


$responseModel = new ResponseModel();
$responseModel->model = $deleteUser;
$responseModel->responseCode = 200;
$responseModel->responseMessage = $deleteUser->id." idli kullanici silindi";

return $responseModel;


}

 ?>