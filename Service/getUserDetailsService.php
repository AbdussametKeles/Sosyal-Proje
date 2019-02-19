<?php 

include_once "../Models/UserModel/getUserDetailModel.php";
include_once "../Config/database.php";
include_once "../Models/requestModel.php";
include_once "../Models/responseModel.php";


function getUserDetailResponse(RequestModel $requestModel){

	$database = new Database();
	$db = $database->getConnection();

	$query = "Select * from kullanici where id = ? LIMIT 0,1";

	$stmt = $db->prepare($query);
	$stmt->bindParam(1,$requestModel->model->userID);
	$stmt->execute();

	$num = $stmt->rowCount();
	if($num>0){
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)){

			extract($row);
		
			$getUserDetailResponseModel = new GetUserDetailResponseModel();
			$getUserDetailResponseModel->ad = $ad;//bu şekilde verilere ulaşmamızı extract() sağlıyor.

		}			
	}

	$responseModel = new ResponseModel();
	$responseModel->model = $getUserDetailResponseModel;
	$responseModel->responseCode = 200;
	$responseModel->responseMessage = "Başarılı";

	return $responseModel;

}


?>