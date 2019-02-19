<?php 

header("Access-Control-Allow-Origin","*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");


include_once "../Models/requestModel.php";
include_once "../Models/responseModel.php";
include_once "../Models/UserModel/createUserModel.php";
include_once "../Service/createUserService.php";

$data = json_decode(file_get_contents("php://input"));
$createUserRequestModel = new CreateUserRequestModel();
$createUserRequestModel->ad = $data->ad;
$createUserRequestModel->soyad = $data->soyad;
$createUserRequestModel->sehirID = $data->sehirID;
$createUserRequestModel->tel = $data->tel;
$createUserRequestModel->mail=$data->mail;
$createUserRequestModel->sifre=$data->sifre;
$createUserRequestModel->derece = $data->derece;
$createUserRequestModel->yetkiID = $data->yetkiID;
$createUserRequestModel->dogumTarihi = $data->dogumTarihi;
$createUserRequestModel->hobiler = $data->hobiler;
$createUserRequestModel->amaclar = $data->amaclar;
$createUserRequestModel->puanOrtalamasi = $data->puanOrtalamasi;
$createUserRequestModel->biyografi = $data->biyografi;

$requestModel = new RequestModel();
$requestModel->model = $createUserRequestModel;
$requestModel->requestCode = 200;
$requestModel->requestMessage = "başarılı";

$responseModel = createUserResponse($requestModel);

echo json_encode($responseModel);

 ?>