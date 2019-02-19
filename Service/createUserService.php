<?php 

include_once "../Models/requestModel.php";
include_once "../Models/responseModel.php";
include_once "../Models/UserModel/createUserModel.php";
include_once "../Service/createUserService.php";
include_once "../Config/database.php";

function createUserResponse(RequestModel $requestModel){

	$database = new Database();
	$db = $database->getConnection();


	$query = "INSERT INTO kullanici SET ad=:ad,soyad=:soyad,sehirID=:sehirID,tel=:tel,mail=:mail,sifre=:sifre,derece=:derece,yetkiID=:yetkiID,dogumTarihi=:dogumTarihi,hobiler=:hobiler,amaclar=:amaclar,puanOrtalamasi=:puanOrtalamasi,biyografi=:biyografi";
	$stmt = $db->prepare($query);

	$stmt->bindParam(":ad",htmlspecialchars(strip_tags($requestModel->model->ad)));
	$stmt->bindParam(":soyad",htmlspecialchars(strip_tags($requestModel->model->soyad)));
	$stmt->bindParam(":sehirID",htmlspecialchars(strip_tags($requestModel->model->sehirID)));
	$stmt->bindParam(":tel",htmlspecialchars(strip_tags($requestModel->model->tel)));
	$stmt->bindParam(":mail",htmlspecialchars(strip_tags($requestModel->model->mail)));
	$stmt->bindParam(":sifre",htmlspecialchars(strip_tags($requestModel->model->sifre)));
	$stmt->bindParam(":derece",htmlspecialchars(strip_tags($requestModel->model->derece)));
	$stmt->bindParam(":yetkiID",htmlspecialchars(strip_tags($requestModel->model->yetkiID)));
	$stmt->bindParam(":dogumTarihi",htmlspecialchars(strip_tags($requestModel->model->dogumTarihi)));
	$stmt->bindParam(":hobiler",htmlspecialchars(strip_tags($requestModel->model->hobiler)));
	$stmt->bindParam(":amaclar",htmlspecialchars(strip_tags($requestModel->model->amaclar)));
	$stmt->bindParam(":puanOrtalamasi",htmlspecialchars(strip_tags($requestModel->model->puanOrtalamasi)));
	$stmt->bindParam(":biyografi",htmlspecialchars(strip_tags($requestModel->model->biyografi)));

	$stmt->execute();
	$responseModel = new ResponseModel();
	$responseModel->responseMessage = "Kullanıcı eklendi";
	$responseModel->responseCode = 200;
	print_r($responseModel);
	



	return $responseModel;

}

?>