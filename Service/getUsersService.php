<?php 

include_once "../Models/getUsersModel.php";
include_once "../Config/database.php";
include_once "../Models/responseModel.php";
include_once "../Models/UserModel/getUserDetailModel.php";
function getUserResponse(RequestModel $requestModel){


	//hata kodları kontrolü yapılacak
	$database = new Database();
	$db = $database->getConnection();

	$getUsersResponseModel = new GetUsersResponseModel();

	$query = "SELECT * from kullanici";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$num = $stmt->rowCount();
	if($num>0){

		$getUsersResponseModel->usersList = array();

		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);//dizi içindeki elemanlara index ile erişmeyi sağlıyor $ad gibi.

			$userDetailModel = new GetUserDetailResponseModel();
			$userDetailModel->ad =$ad;

			$getUsersResponseModel->usersList[] = $userDetailModel;

		}

	}


	$responseModel = new ResponseModel();
	$responseModel->model = $getUsersResponseModel;
	$responseModel->responseCode = 200;
	$responseModel->responseMessage = "Ekleme başarılı";
	return $responseModel;
}
?>